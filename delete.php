<?php
require "config.php";

$id = $_GET['id_review'];

mysqli_query($conn, "START TRANSACTION");

$get_img = "SELECT * FROM gambar WHERE id_review = $id";
$delete_img = "DELETE FROM gambar WHERE id_review = $id;";
$delete_review = "DELETE FROM review WHERE id_review = $id;";

$result_get_img = mysqli_query($conn , $get_img);
$images = [];
while($row = mysqli_fetch_assoc($result_get_img)){
    $images[] = $row;
}

$result_img = mysqli_query($conn,$delete_img);
$result_review = mysqli_query($conn, $delete_review);

if($result_img and $result_review and $result_get_img) {
    mysqli_query($conn, "COMMIT");
    foreach($images as $img){
        unlink("sepatu/".$img['gambar_sepatu']);
    }
    echo "
    <script> 
        alert ('Succes to Delete Review');
        document.location.href = 'admin.php';
    </script>";
}else {
    mysqli_query($conn, "ROLLBACK");
    echo "
    <script> 
        alert ('GAGAL to Delete Review');
        document.location.href = 'admin.php';
    </script>";
}

?>