<?php
$page_title = "4.1";include("includes/header.php");
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
});
 ?>
<h1>Guestbook</h1>
<form id="messageform" action="includes/add.php" method="post">
    <label for="name" id="name_l">Name: </label><input type="text" id="name" name="name" required><br>
    <label for="msg" id="msg_l">Message: </label><textarea id="msg" name="message" required></textarea><br>
    <input id="send" type="submit" value="Post">
</form>
<h3>Messages: </h3>
<?php

$gb = new Guestbook("", "");
// read all posts from file
$posts = $gb->read("../../../writeable/DT100G/L4_1/guests.data");

// loop through posts and display them with delete buttons
foreach ($posts as $index => $post) {
    ?>
    <div id="entries" >
        <a href="includes/delete.php?index=<?php echo urlencode($index); ?>
            " class="delete-link" onclick="return confirmDelete();"></a>
        <p>Name: <?php echo htmlspecialchars($post->getName()); ?></p>
        <p>Message: <?php echo htmlspecialchars($post->getMessage()); ?></p>
        <p>Date/Time: <?php echo htmlspecialchars($post->getDatetime()); ?></p>

    </div>
    <?php
}
include("includes/footer.php");
?>

