
function validation() {
      let a=document.getElementById("symbols").value;
      let b=document.getElementById("com_name").value;
      let c=document.getElementById("iss_manager").value;
      let d=document.getElementById("share_types").value;
      let e=document.getElementById("prices").value;
      let f=document.getElementById("unit").value;
      let g=document.getElementById("issue_date").value;
      let h=document.getElementById("close_date").value;

     
      if(a==""){
           document.getElementById('symbol_error').innerHTML="**This field is empty";
           return false;
      }

      else if(!isNaN(a)){
            document.getElementById('symbol_error').innerHTML="**This field must be alphabet";
            return false;
      }
      else{
            document.getElementById('symbol_error').innerHTML="";
        
      }
     
      if(b==""){
            document.getElementById('com_error').innerHTML="**Field is empty";
            return false;
       }
       else if(!isNaN(b)){
            document.getElementById('com_error').innerHTML="**Field must be alphabet";
            return false;
      }
      else if(b.length<5 || b.length>26){
            document.getElementById('com_error').innerHTML="**Recheck company field ";
           return false;

      }
       else{
            document.getElementById('com_error').innerHTML="";
      }


      if(c==""){
            document.getElementById('iss_error').innerHTML="**Field is empty";
            return false;
       }
       else if(!isNaN(c)){
            document.getElementById('iss_error').innerHTML="**Field must be alphabet";
            return false;
      }
      else if(c.length<3 || c.length>30){
            document.getElementById('iss_error').innerHTML="**Recheck issue manager field";
           return false;

      }
       else{
            document.getElementById('iss_error').innerHTML="";
      }

      if(d==""){
            document.getElementById('sharetype_error').innerHTML="**Field is empty";
            return false;
       }
       else if(!isNaN(d)){
            document.getElementById('sharetype_error').innerHTML="**Field must be alphabet";
            return false;
      }
      else if(d.length<1 || d.length>100){
            document.getElementById('sharetype_error').innerHTML="**Recheck field";
           return false;

      }
       else{
            document.getElementById('sharetype_error').innerHTML="";
      }

      if(e==""){
            document.getElementById('price_error').innerHTML="**Field is empty";
            return false;
       }
       else if(isNaN(e)){
            document.getElementById('price_error').innerHTML="**Field must be numerical";
            return false;
      }
      else if(e.length<1 || e.length>10){
            document.getElementById('price_error').innerHTML="**Incorrect price amount";
           return false;

      }
       else{
            document.getElementById('price_error').innerHTML="";
      }

      if(f==""){
            document.getElementById('units_error').innerHTML="**Field is empty";
            return false;
       }
       else if(isNaN(f)){
            document.getElementById('units_error').innerHTML="**Field must be numerical";
            return false;
      }
      else if(f.length<1 || a.length>10){
            document.getElementById('units_error').innerHTML="**Incorrect units value amount";
           return false;

      }
       else{
            document.getElementById('units_error').innerHTML="";
      }

      if(g==""){
            document.getElementById('issue_error').innerHTML="**Field is empty";
            return false;
       }
       else{
            document.getElementById('issue_error').innerHTML="";
      }

      if(h==""){
            document.getElementById('close_error').innerHTML="**Field is empty";
            return false;
       }
       else if(g>h){
            document.getElementById('close_error').innerHTML="**Closing date format incorrect";
            return false;
             
       }
       else{
            document.getElementById('close_error').innerHTML="";
            return true;
      }

    
     
}