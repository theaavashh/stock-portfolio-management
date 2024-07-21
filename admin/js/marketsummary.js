function validation(){
       let a1=document.getElementById('labela1').value;
       let a=document.getElementById('label1').value;
       let b=document.getElementById('label2').value;
       let c=document.getElementById('label3').value;
       let d=document.getElementById('label4').value;
       let e=document.getElementById('label5').value;

       if(a1==""){
              document.getElementById("errordate").innerHTML="**This field is empty";
              document.getElementById("labela1").style.border="2px solid red";
              return false;
       }
       else{
              document.getElementById("errordate").innerHTML="";
              document.getElementById("labela1").style.border="none";  
       }

       if(a==""){
              document.getElementById("errorturnover").innerHTML="**This field is empty";
              document.getElementById("label1").style.border="2px solid red";
              return false;
       }
       else if(isNaN(a)){
              document.getElementById("errorturnover").innerHTML="**This field must be numeric";
              document.getElementById("label1").style.border="2px solid red";
              return false;

       }
       else{
              document.getElementById("errorturnover").innerHTML="";
              document.getElementById("label1").style.border="none";
              
       }

       if(b==""){
              document.getElementById("errortradeshare").innerHTML="**This field is empty";
              document.getElementById("label2").style.border="2px solid red";
              return false;
       }
       else if(isNaN(b)){
              document.getElementById("errortradeshare").innerHTML="**This field must be numeric";
              document.getElementById("label2").style.border="2px solid red";
              return false;

       }
       else{
              document.getElementById("errortradeshare").innerHTML="";
              document.getElementById("label2").style.border="none";
              
       }
       
       if(c==""){
              document.getElementById("errortransaction").innerHTML="**This field is empty";
              document.getElementById("label3").style.border="2px solid red";
              return false;
       }
       else if(isNaN(c)){
              document.getElementById("errortransaction").innerHTML="**This field must be numeric";
              document.getElementById("label3").style.border="2px solid red";
              return false;

       }
       else{
              document.getElementById("errortransaction").innerHTML="";
              document.getElementById("label3").style.border="none";
              
       }
       if(d==""){
              document.getElementById("errorscrips").innerHTML="**This field is empty";
              document.getElementById("label4").style.border="2px solid red";
              return false;
       }
       else if(isNaN(d)){
              document.getElementById("errorscrips").innerHTML="**This field must be numeric";
              document.getElementById("label4").style.border="2px solid red";
              return false;

       }
       else{
              document.getElementById("errorscrips").innerHTML="";
              document.getElementById("label4").style.border="none";
              
       }
       if(e==""){
              document.getElementById("errormarket").innerHTML="**This field is empty";
              document.getElementById("label5").style.border="2px solid red";
              return false;
       }
       else if(isNaN(e)){
              document.getElementById("errormarket").innerHTML="**This field must be numeric";
              document.getElementById("label5").style.border="2px solid red";
              return false;

       }
       else{
              document.getElementById("errormarket").innerHTML="";
              document.getElementById("label5").style.border="none";
              
       }





}