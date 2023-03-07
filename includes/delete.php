<?php
spl_autoload_register(function ($class) {
    include '../classes/' . $class . '.class.php';
});

// get index of post to be deleted
$index = $_GET["index"];

// create new guestbook object
$gb = new Guestbook("", "");

// delete post from file
$gb->delete($index, "../../../../writeable/DT100G/L4_1/guests.data");

// redirect to index page
header("Location: ../index.php");
exit();