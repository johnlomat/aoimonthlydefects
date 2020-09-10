<?php
    if(!isset($_SESSION['email'])){
        header('Location:'. HOST_URL . '/signin');
    }else {
        $user = new user($_SESSION['email']);
    }
?>