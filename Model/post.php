<?php

require_once 'config.php';


// return all post (returns mysqli_query object)
function getAllPost(){
    $sql = "SELECT * FROM ".Model\TABLE;

    $conn = mysqli_connect(Model\HOSTNAME, Model\USERNAME, Model\PASSWORD, Model\DATABASE);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if($result = mysqli_query($conn, $sql)){
        $out = array();
        while($row = mysqli_fetch_assoc($result)){
            $out[] = $row;
        }
        return $out;
    }else{
        echo 'Cannot execute query';
    }
    mysqli_close($conn);
}

// return a specific post
function getPost($id){

    $sql = "SELECT * FROM ".Model\TABLE ." WHERE `id`=$id";

    $conn = mysqli_connect(Model\HOSTNAME, Model\USERNAME, Model\PASSWORD, Model\DATABASE);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if($result = mysqli_query($conn, $sql)){
        return $result;
    }else{
        echo 'Cannot execute query';
    }
    mysqli_close($conn);

}

// create a new post
function createPost($content){

    if(!empty($content)){

        $sql = "INSERT INTO ".Model\TABLE." (content, likes, dislikes, date)
        VALUES ('$content', '0', '0' , now())
        ";

        $conn = mysqli_connect(Model\HOSTNAME, Model\USERNAME, Model\PASSWORD, Model\DATABASE);


        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (mysqli_query($conn, $sql)) {
            echo "New Post is created";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);

    }else{
        echo 'Content should not be empty!';
    }

    

}

// print_r(getPost(1));
// createPost('Hello its okay its okay');


?>