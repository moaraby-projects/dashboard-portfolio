<?php
include 'connection.php';

if (isset($_POST['send'])) {
    $NAME = $_POST['name'];
    $NAME = filter_var($NAME , FILTER_SANITIZE_STRING);
    $EMAIL = $_POST['email'];
    $EMAIL =filter_var($EMAIL , FILTER_SANITIZE_STRING) ;
    $NUMBER = $_POST['number'];
    $NUMBER = filter_var($NUMBER , FILTER_SANITIZE_STRING);
    $SUBJECT = $_POST['subject'];
    $SUBJECT = filter_var($SUBJECT , FILTER_SANITIZE_STRING);
    $MESSAGE = $_POST['message'];
    $MESSAGE = filter_var($MESSAGE , FILTER_SANITIZE_STRING);

    $inset_message = $conn->prepare('insert into `messages`(name,email,number,subject,message) values(?,?,?,?,?)');
    $inset_message->execute([$NAME,$EMAIL,$NUMBER,$SUBJECT,$MESSAGE]);

    if ($inset_message) {
        header('location:https://moarabyportfolio.surge.sh/#home');
    }
}

?>