<?php

// print_r($_POST);
    if (!empty($_POST["name"]) && !empty($_POST["surname"])){
        if ($_POST["name"] == "a"){
            echo "succesdfds";
        } else
        echo "success";

    } else {
        echo "shit happend";
    }

?>