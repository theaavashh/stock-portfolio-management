function validation(){
      let admin=document.getElementById("mail").value;
      let password=document.getElementById("pass").value;
  
  
     
  
      if(admin==''){
          document.getElementById("mail_error").innerHTML="**Email is empty";
          document.getElementById("mail").style.border="2px solid red";
          return false;
      }
      else if(admin.indexOf('@')<0){
          document.getElementById("mail_error").innerHTML="**Email format doesnot match";
          document.getElementById("mail").style.border="2px solid red";
          return false;
      }
      else if(admin.endsWith('@')){
          document.getElementById("mail_error").innerHTML="Email format doesnot match";
          document.getElementById("mail").style.border="2px solid red";
          return false;
      }
      else{
          document.getElementById("mail_error").innerHTML=""; 
          document.getElementById("mail").style.border="none"; 
      }
  
     if(password==''){
          document.getElementById("pass_error").innerHTML="**Password field is empty";
          document.getElementById("pass").style.border="2px solid red";
          return false;
      }
  
      else{
          document.getElementById("pass_error").innerHTML="";
          document.getElementById("pass").style.border="none";
          return true;
      }
  }
  
  
  
  