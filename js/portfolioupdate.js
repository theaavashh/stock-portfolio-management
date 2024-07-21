function checkvalidation() {

      let a = document.getElementById("companyname").value;
      if (a == "") {
            document.getElementById("errorcompanyname").innerHTML = "Should be filledddddd out";
            return false;
      }
      else if(!isNaN(a)){
            document.getElementById("errorcompanyname").innerHTML = "Should  be character only";
            return false;
      }
      else if(a.length<5){
            document.getElementById("errorcompanyname").innerHTML = "Should be greater than 5 character";
            return false;
      }
      else{
            document.getElementById("errorcompanyname").innerHTML = "";
            
      }

      // if (b == "") {
      //       document.getElementById("errorunits").innerHTML = "Should be filled out";
      //       return false;
      // }
      
      
}