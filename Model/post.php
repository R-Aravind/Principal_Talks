<?php

require_once 'config.php';


// return all post (returns mysqli_query object)
function getAllPost(){
    $sql = "SELECT * FROM ".Model\TABLE. " ORDER BY date DESC, id DESC LIMIT 10";

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


        // echo $content;

        $sql = "INSERT INTO posts (`content`, `likes`, `dislikes`, `date`) VALUES ('". $content ."', '0', '0', NOW())";

        $conn = mysqli_connect(Model\HOSTNAME, Model\USERNAME, Model\PASSWORD, Model\DATABASE);


        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (mysqli_query($conn, $sql)) {
            // echo "New Post is created";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

    }else{
        echo 'Content should not be empty!';
    }



}

// get last two days posts
function getHighLights(){
    $sql = "SELECT * FROM ".Model\TABLE. " WHERE date BETWEEN (CURDATE()-1) AND CURDATE() ORDER BY date DESC, id DESC";

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


// get last 10 posts not in highlights
function getHistory(){
    $sql = "SELECT * FROM ".Model\TABLE. " WHERE date <= (CURDATE()-2) ORDER BY date DESC, id DESC LIMIT 5";

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

function deletePost($id, $redirect){
    $sql = "DELETE FROM ".Model\TABLE. " WHERE `id`=$id";

    $conn = mysqli_connect(Model\HOSTNAME, Model\USERNAME, Model\PASSWORD, Model\DATABASE);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(mysqli_query($conn, $sql)){
        echo 'deleted sucessfully';
        header('Location: '. $redirect);
    }else{
        echo 'Error';
    }
    
    mysqli_close($conn);
}


// like post
function likePost($id){
    $sql = "UPDATE ". Model\TABLE. " SET `likes` = `likes` + 1 WHERE `id` = $id";
    $conn = mysqli_connect(Model\HOSTNAME, Model\USERNAME, Model\PASSWORD, Model\DATABASE);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(mysqli_query($conn, $sql)){
        echo 'sucess';
    }else{
        echo 'error';
    }
    
    mysqli_close($conn);
}


?>
