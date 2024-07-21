function validation() {
      let a = document.getElementById('uname').value;
      let b = document.getElementById('fname').value;
      let c = document.getElementById('lname').value;
      let d = document.getElementById('email').value;
      let e = document.getElementById('password').value;
      let f = document.getElementById('cpassword').value;


      if (a == "") {
            document.getElementById('erroruname').innerHTML = "*This field is empty";
            return false;
      }
      if (!isNaN(a)) {
            document.getElementById('erroruname').innerHTML = "*This field is empty";
            return false;

      }
      else {
            document.getElementById('erroruname').innerHTML = "";

      }
      if (b == "") {
            document.getElementById('errorfname').innerHTML = "*This field is empty";
            return false;
      }
      else {
            document.getElementById('errorfname').innerHTML = "";

      }
      if (c == "") {
            document.getElementById('errorlname').innerHTML = "*This field is empty";
            return false;
      }
      else {
            document.getElementById('errorlname').innerHTML = "";

      }
      if (d == "") {
            document.getElementById('erroremail').innerHTML = "*This field is empty";
            return false;
      }
      else {
            document.getElementById('erroremail').innerHTML = "";

      }
      if (e == "") {
            document.getElementById('errorpass').innerHTML = "*This field is empty";
            return false;
      }
      else {
            document.getElementById('errorpass').innerHTML = "";

      }
      if (f == "") {
            document.getElementById('errorcpass').innerHTML = "*This field is empty";
            return false;
      }
      else if(f!=e){
            document.getElementById('errorcpass').innerHTML = "*Password & Confirm Password Doesnot match";
            return false;
      }
      else {
            document.getElementById('errorcpass').innerHTML = "";

      }
}