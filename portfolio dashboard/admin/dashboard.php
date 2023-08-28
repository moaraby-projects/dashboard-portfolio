<?php
include "../components/connection.php";

// select projects
$count_projects = 0;
$select_projects = $conn->prepare('select * from `api`');
$select_projects->execute();
if ($select_projects->rowCount() > 0) {
    $count_projects =$select_projects->rowCount();
}
// select messages
$count_messages = 0;
$select_messages = $conn->prepare('select * from `messages`');
$select_messages->execute();
if ($select_messages->rowCount() > 0) {
    $count_messages =$select_messages->rowCount();
}

?>

<!-- css -->
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
    <title>Dashboard</title>
</head>

<body>
    <?php include 'Sidebar.php' ?>

    <div class="dashboard">
        <div class="content">
            <div class="container">
                <div class="boxs">
                    <div class="box">
                        <p><?php echo $count_projects; ?></p>
                        <h3>Projects</h3>
                    </div>
                    <div class="box">
                        <p><?php echo $count_messages; ?></p>
                        <h3>Messages</h3>
                    </div>
                    <div class="box">
                        <p>10k</p>
                        <h3>Views</h3>
                    </div>
                </div>
                <div class="projects">
                    <h2 class="heading">Latest <span>Projects</span></h2>
                    <!-- php code -->
                    <?php
                    if (isset($_POST['delete_item'])) {
                        $project_id = $_POST['project_id'];
                        $select_project = $conn->prepare('select * from `api` where id=?');
                        $select_project->execute([$project_id]);

                        if($select_project->rowCount() > 0){
                        $delete_item = $conn->prepare('DELETE FROM api WHERE `api`.`id` =?');
                        $delete_item->execute([$project_id]);
                        echo '<h4 class="msg_error">Deleted!</h4>';

                        ?>

                    <!-- code js -->
                    <script>
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                    </script>
                    <!-- code js -->


                    <?php

                        }
                    }
                    ?>
                    <!-- php code -->
                    <div class="table-container">
                        <Table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Url</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- start code php -->
                                <?php
                                $id_gen = 0;
                                $select_api = $conn->prepare('select * from `api` order by id desc limit 5');
                                $select_api->execute();

                                if ($select_api->rowCount() > 0) {
                                while($fetch_api = $select_api->fetch(PDO::FETCH_ASSOC)){
                                $id_gen++;
                                ?>
                                <tr>
                                    <td><?php echo $id_gen;?></td>
                                    <td><a target="_blank"
                                            href="<?php echo $fetch_api['url'];?>"><?php echo $fetch_api['url'];?></a>
                                    </td>
                                    <td><?php echo $fetch_api['title'];?></td>
                                    <td><?php echo $fetch_api['category'];?></td>
                                    <td><img style="width:100px;" src="../asset/imgs/<?php echo $fetch_api['image']; ?>"
                                            alt=""></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="project_id"
                                                value="<?php echo $fetch_api['id'];?>">
                                            <button type="submit" name="delete_item" class="btn delete"
                                                onclick="return confirm('delete this item')">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                <?php
                                }
                                }

                                ?>
                                <!-- end code php -->

                            </tbody>
                        </Table>
                    </div>
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