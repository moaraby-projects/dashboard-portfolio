<?php
include '../components/connection.php';

// select messages
$count_messages = 0;
$select_messages = $conn->prepare('select * from `messages`');
$select_messages->execute();
if ($select_messages->rowCount() > 0) {
    $count_messages =$select_messages->rowCount();
}

?>
<style>
<?php include '../css/style.css'?>
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fontawsome css -->
    <link rel="stylesheet" href="../css/all.min.css">
    <title>Messages</title>
</head>

<body>
    <?php include 'Sidebar.php' ?>

    <div class="messages">
        <div class="content">
            <div class="container">
                <h2 class="heading">All <span>Messages (<?php echo $count_messages; ?>)</span> </h2>

                <div class="boxs">

                    <!-- code php -->
                    <?php

                    if (isset($_POST['delete'])) {
                    $message_id = $_POST['message_id'];
                    $select_message = $conn->prepare('select * from `messages` where id=?');
                    $select_message->execute([$message_id]);

                    if($select_message->rowCount() > 0){
                    $delete_item = $conn->prepare('DELETE FROM messages WHERE `messages`.`id` =?');
                    $delete_item->execute([$message_id]);
                    echo '<h4 class="msg_error">Deleted!</h4>';

                    ?>

                    <script>
                    setTimeout(() => {
                        window.location.href = 'messages.php';
                    }, 2000);
                    </script>

                    <?php

                    }
                    }

                ?>
                    <!-- code php -->

                    <!-- code php -->
                    <?php
                      $select_messages = $conn->prepare('select * from `messages` order by id desc');
                      $select_messages->execute();

                      if ($select_messages->rowCount() > 0) {
                        while ($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)) {

                            ?>
                    <div class="box">
                        <div class="buttons">
                            <div class="date"><i class="fas fa-clock"></i>
                                <span><?php echo $fetch_messages['message_date']; ?></span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="message_id" value="<?php echo $fetch_messages['id']; ?>">
                                <button type="submit" name="delete" style="margin-left:auto;" class="btn delete"
                                    onclick="return confirm('delete message?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>

                        <p class="name">Name: <span><?php echo $fetch_messages['name']; ?></span></p>
                        <p class="email">Email: <span><?php echo $fetch_messages['email']; ?></span></p>
                        <p class="number">Number: <span><?php echo $fetch_messages['number']; ?></span></p>
                        <p class="subject">Subject: <span><?php echo $fetch_messages['subject']; ?></span></p>
                        <p class="messages">Message: <span><?php echo $fetch_messages['message']; ?></span>
                        </p>
                        <form style="margin:auto;" action="mailto:<?php echo $fetch_messages['email']; ?>"
                            method="post"> <button style="margin: auto;" class="btn" type="submit">Reply</button>
                        </form>
                    </div>

                    <?php
                        }
                      }
                    ?>
                    <!-- code php -->
                </div>
            </div>
        </div>
    </div>

    <!-- js  -->
    <script>
    <?php include '../js/main.js' ?>
    </script>
</body>

</html>