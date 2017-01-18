<?php
include 'db.php';
// Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

if(!isset($_FILES['file'])){
    echo "nofile";
}else{
    if(isset($FILES['file'])){

        $file = $_FILES['file'];
        $id = $_POST['id'];

        $name = $file['name'];
        $tmp_name =  $file['tmp_name'];

        $extension = explode['.', $name];
        $extension = strtolower(end($extension));

        //temp details
        $key = md5(uniqid());
        $file_name = "{$key}.{$extension}";
        $file_path = "uploads/{$file_name}";

        //move the file
        move_uploaded_file($tmp_name, $file_path);

        $url = "http://192.168.1.162/note/".$file_path;
        $sql = "UPDATE note SET imgurl='$url" WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
    }
}



?>