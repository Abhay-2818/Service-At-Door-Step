<?php
$target_dir = "../assets/img/admin_profile/";
$target_file = $target_dir . basename(trim($_FILES["fileToUpload"]["name"]));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["save"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    //echo "File is not an image.";
    echo "<script type='text/javascript'> 
            alert('File is not an image.');       
            </script>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  //echo "Sorry, file already exists.";
  $uploadOk = 1;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  //echo "Sorry, your file is too large.";
  echo "<script type='text/javascript'> 
            alert('Sorry, your file was not uploaded Because your file is too large.');
             
            </script>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
echo "<script type='text/javascript'> 
            alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
             
            </script>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file(trim($_FILES["fileToUpload"]["tmp_name"]),$target_file)) {
   // echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    //echo "Sorry, there was an error uploading your file.";
    echo "<script type='text/javascript'> 
            alert('Sorry, there was an error uploading your file.');
             
            </script>";
  }
}
?>