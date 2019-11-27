<?php 
include("config/setup.php");
session_start();
if(!isset($_SESSION['success']))
{
  header("location: sign.php");
}
else if (isset($_GET['action']) == 'delete')
{
    if (isset($_GET['id']))
    {
        $postid = $_GET['id'];
        $user = $_SESSION['username'];
        $query = $db->prepare("SELECT * FROM images WHERE id = $postid");
        $query->execute();

        $results = $query->fetch(PDO::FETCH_ASSOC);
        $poster_id = $results['username'];

        if($user == $poster_id)
        {
            $query = $db->query("DELETE FROM images WHERE id=$postid");
            if ($query->execute())
            {
                header("Location: gallery.php");
                echo "post deleted";
            }
            else{
                echo "Error: Unable to delete the post";
            }
        }
        else
        {
            echo "you dont have permission to delete this post";
        }
       
    }
}







?>