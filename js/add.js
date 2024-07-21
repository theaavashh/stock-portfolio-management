function checkvalidation() {

      let a = document.getElementById("companyname").value;
      let b = document.getElementById("units").value;
      // let d = document.getElementById("buyingprice").value;
      // let e = document.getElementById("date").value;

      if (a == "") {
            document.getElementById("errorcompanyname").innerHTML = "Should be filled out";
            return false;
      }
      else if(!isNaN(a)){
            document.getElementById("errorcompanyname").innerHTML = "Should be alphabet character";
            return false;
      }
      else if(a.length<5){
            document.getElementById("errorcompanyname").innerHTML = "Should be greater than 5";
            return false;
      }
      else{
            document.getElementById("errorcompanyname").innerHTML = "";
            
      }

      // if (b == "") {
      //       document.getElementById("errorstocktype").innerHTML = "Stock Type is empty";
      //       return false;
      // }
      // else if(!isNaN(b)){
      //       document.getElementById("errorstocktype").innerHTML = "Stock Type must be alpha character";
      //       return false;
      // }
      // else if(b.length<3){
      //       document.getElementById("errorstocktype").innerHTML = "Stock Typemust be greater than 3";
      //       return false;
      // }
      // else{
      //       document.getElementById("errorstocktype").innerHTML = "";
           
      // }

      if (c == "") {
            document.getElementById("errorunits").innerHTML = "Units is empty";
            return false;
      }
      else if(isNaN(c)){
            document.getElementById("errorunits").innerHTML = "Units must be numerical character";
            return false;
      }
      else{
            document.getElementById("errorunits").innerHTML = "";
      }


      // if (d == "") {
      //       document.getElementById("errorbuyingprice").innerHTML = "Buying Price is empty";
      //       return false;
      // }
      // else if(isNaN(d)){
      //       document.getElementById("errorbuyingprice").innerHTML = "Buying Price must be numerical character";
      //       return false;
      // }
      // else{
      //       document.getElementById("errorunits").innerHTML = ""; 
      // }



      // if (e== "") {
      //       document.getElementById("errordate").innerHTML = "Date is empty";
      //       return false;
      // }
      // else{
      //       return true;
      // }
}

      






