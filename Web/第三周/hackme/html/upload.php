<?php
session_start();
if($_SESSION['admin']!==1){
    header("Location: ./index.php");
    exit();
}
?>
<!-- <!DOCTYPE html>-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>头像更换</title>
</head>

<body>
    <h2>头像更换</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">文件名：</label>
        <input type="file" name="Files" id="file"><br>
        <input type="submit" name="upload" value="提交">
    </form>
</body>

</html>
<?php
 if(isset($_FILES)){
     $tmp_file = $_FILES['Files']['name'];
     $tmp_path = $_FILES['Files']['tmp_name'];
     if(($extension = pathinfo($tmp_file)['extension']) != ""){
         $allows = array('gif','jpeg','jpg','png');
         if(in_array($extension,$allows,true) and in_array($_FILES['Files']['type'],array_map(function($ext){return 'image/'.$ext;},$allows),true)){
                 move_uploaded_file($tmp_path,"./template/static/img/person.jpg");
                 echo "<script>alert('Update image -> ./template/static/img/person.jpg') </script>";
         } else {
             echo "<script>alert('Update illegal! Only allows like \'gif\', \'jpeg\', \'jpg\', \'png\' ') </script>";
         }
     }
 }
?>
