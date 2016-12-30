<?php
session_start();
    if(isset($_POST['username']) && isset($_POST['password']))
    {   
        $username = $_POST['username'];
        $password = $_POST['password'];
        $xml = simplexml_load_file('xmlovi/admin.xml');
        $bioUser = false;
        foreach($xml->children() as $value)
        {
            if($value->Username == $username && $value->Password == $password){
                if($value->Role == "admin") $_SESSION['user'] = "admin";
                else $_SESSION['user'] = "guest";
                $bioUser = true;
                break;
            }
        }
        if($bioUser) header('Location: homepage.php');
        if(!$bioUser){
            header('Location: sign_in.php');
            $_SESSION['user'] = "unknown";   
        }
    }
?>