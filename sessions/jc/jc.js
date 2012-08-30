function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}


var sesh = getQueryVariable("sesh_id");

switch (sesh) {  
   case "wed1":  
      var fDay = "Wednesday, May 30th";
      var fTime =  "10:45-12:00";
      break;  
      case "wed2":  
      var fDay = "Wednesday, May 30th";
      var fTime =  "1:30-2:45";
      break; 
      case "wed3":  
      var fDay = "Wednesday, May 30th";
      var fTime =  "3:00-4:15";
      break; 

      case "thu1":  
      var fDay = "Thursday, May 31st";
      var fTime =  "9:00-10:30";
      break; 
      case "thu2":  
      var fDay = "Thursday, May 31st";
      var fTime =  "10:45-12:00";
      break;  
      case "thu3":  
      var fDay = "Thursday, May 31st";
      var fTime =  "1:45-3:15";
      break;
      case "thu4":  
      var fDay = "Thursday, May 31st";
      var fTime =  "3:30-5:00";
      break;   

      case "fri1":  
      var fDay = "Friday, June 1st";
      var fTime =  "9:00-10:15";
      break;        
   
}  
