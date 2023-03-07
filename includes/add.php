<?php
spl_autoload_register(function ($class) {
    include '../classes/' . $class . '.class.php';
});
// get form data
$name = $_POST["name"];
$message = $_POST["message"];

// create new guestbook object with form data
$gb = new Guestbook($name, $message);

// add post to file
$gb->add("../../../../writeable/DT100G/L4_1/guests.data");

// redirect to index page
header("Location: ../index.php");
exit();
