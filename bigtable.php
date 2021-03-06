<!DOCTYPE html>
<!--
  Copyright 2011 Google Inc. All Rights Reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      http://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
-->
<html>
  <head>
    <meta charset="UTF-8">

    <title>Fusion Tables API Example: Google Chart Tools</title>

    <link href="/apis/fusiontables/docs/samples/style/default.css"
        rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <style type="text/css">
      table {
        width: 30%;
      }

      th {
        width: 30%;
        text-align: left;
      }
    </style>

    <script type="text/javascript">
      google.load('visualization', '1');

      function drawTable() {
        // Construct query
        var query = "SELECT 'Scoring Team' as Scoring, " +
            "'Receiving Team' as Receiving, 'Minute of goal' as Minute " +
            'FROM 1VlPiBCkYt_Vio-JT3UwM-U__APurJvPb6ZEJPg';
        var team = document.getElementById('team').value;
        if (team) {
          query += " WHERE 'Scoring Team' = '" + team + "'";
        }
        var queryText = encodeURIComponent(query);
        var gvizQuery = new google.visualization.Query(
            'http://www.google.com/fusiontables/gvizdata?tq='  + queryText);

        // Send query and draw table with data in response
        gvizQuery.send(function(response) {
          var numRows = response.getDataTable().getNumberOfRows();
          var numCols = response.getDataTable().getNumberOfColumns();

          var ftdata = ['<table><thead><tr>'];
          for (var i = 0; i < numCols; i++) {
            var columnTitle = response.getDataTable().getColumnLabel(i);
            ftdata.push('<th>' + columnTitle + '</th>');
          }
          ftdata.push('</tr></thead><tbody>');

          for (var i = 0; i < numRows; i++) {
            ftdata.push('<tr>');
            for(var j = 0; j < numCols; j++) {
              var rowValue = response.getDataTable().getValue(i, j);
              ftdata.push('<td>' + rowValue + '</td>');
            }
            ftdata.push('</tr>');
          }
          ftdata.push('</tbody></table>');
          document.getElementById('ft-data').innerHTML = ftdata.join('');
        });
      }

      google.setOnLoadCallback(drawTable);
    </script>
  </head>
  <body>
    <div>
      <label>Scoring Team:</label>
      <select id="team" onchange="drawTable();">
        <option value="" selected="selected">All</option>
        <option value="Germany">Germany</option>
        <option value="New Zealand">New Zealand</option>
        <option value="Uruguay">Uruguay</option>
      </select>
    </div>
    <div id="ft-data"></div>
  </body>
</html>