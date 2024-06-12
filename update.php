<?php
include 'connect.php';
$id = $_POST['id']; // Assuming you have an input field named 'id' to identify the row to update
$picture = $_POST['pphoto'];
$title = $_POST['title'];
$about = $_POST['about'];
$content = $_POST['content'];
$category = $_POST['category'];
$date = date('d.m.Y.');
if (isset($_POST['archive'])) {
    $archive = 1;
} else {
    $archive = 0;
}
$target_dir = 'Slike/' . $picture;
move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
$query = "UPDATE news SET pphoto='$picture', title='$title', about='$about', content='$content', category='$category', datum='$date', archive='$archive' WHERE id='$id'";
$result = mysqli_query($dbc, $query) or die('Error querying database.');
header("Location: administracija.php");
mysqli_close($dbc);
