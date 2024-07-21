<?php
include("database.php");
include("main.php");

if(isset($_POST['upload'])){
     $file_name=$_FILES['file']['name'];
     $file_types=$_FILES['file']['type'];
     $file_tmpname=$_FILES['file']['tmp_name'];
     $file_size=$_FILES['file']['size'];
     $file_destination="upload/".$file_name;


     $file_ext=explode('.',$file_name);
     $file_ext_check=strtolower(end($file_ext));

     $valid_file_ext=array('jpg','png','jpeg','svg');

     if(in_array($file_ext_check,$valid_file_ext)){

     if(move_uploaded_file($file_tmpname,$file_destination)){
      $sq="INSERT INTO `shareinfo`(`name`) VALUES ('$file_name')";
      $result=mysqli_query($conn,$sq);

      if($result){
           ?>
           <script>
                 alert("File Upload Successfully");
            </script>
      <?php
      }
      else{
            echo "Failed";
      }
   }
   else{
         echo "Failing";
   }

}
else{
      ?>
      <script>
      alert("Wrong File extension");
      </script>
<?php
}
//      }

}






?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="css/share.css" rel="stylesheet">
</head>
<body>
<div id="mainer">
      <h1>Upload Your Info</h1>
      <h3>PNG, JPG, JPEG and SVG are only allowed</h3>

      <div id="input-field">
            <form action="share.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="file" onchange="showpreview(event)"><br>
      <button id="upload_button" name="upload">Upload Here</button>
            </form><br>
       <div class="preview">
       <img id="its-preview" height="150" width="150">
      </div>
      </div>





</div>





</div>



<script>
function showpreview(event){
      if(event.target.files.length>0){
            var src=URL.createObjectURL(event.target.files[0]);
            var preview=document.getElementById("its-preview");
            preview.src=src;
            preview.style.display="block";
      }
}



</script>
      
</body>
</html>