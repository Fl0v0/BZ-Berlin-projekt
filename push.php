<?php
include 'connect.php';
$picture = $_POST['pphoto'];
$title=$_POST['title'];
$about=$_POST['about'];
$content=$_POST['content'];
$category=$_POST['category'];
$date=date('d.m.Y.');
if(isset($_POST['archive'])){
$archive=1;
}else{
$archive=0;
}
$target_dir = 'Slike/'.$picture;
move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
$query = "INSERT INTO news (pphoto, title, about, content,category,datum, archive ) VALUES ('$picture', '$title', '$about', '$content','$category','$date', '$archive')";
$result = mysqli_query($dbc, $query) or die('Error querying databese.');
header("Location: administracija.php");
mysqli_close($dbc);
