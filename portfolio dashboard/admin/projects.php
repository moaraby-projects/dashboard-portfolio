<?php
include '../components/connection.php';

// select projects
$count_projects = 0;
$select_projects = $conn->prepare('select * from `api`');
$select_projects->execute();
if ($select_projects->rowCount() > 0) {
    $count_projects =$select_projects->rowCount();
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
    <link rel="stylesheet" href="../css/style.css">
    <title>Projects</title>
</head>

<body>
    <?php include 'Sidebar.php' ?>

    <div class="projects">
        <div class="content">
            <div class="container">
                <h2 class="heading">Add <span>Project</span> </h2>
                </h2>
                <!-- php code -->
                <?php
                if(isset($_POST['add'])){
                $URL = $_POST['url'];
                $TITLE = $_POST['title'];
                $CATEGORY = $_POST['category'];

                // IMAGE
                $IMAGE_NAME =$_FILES['image']['name'];
                $IMAGE_TMP =$_FILES['image']['tmp_name'];

                if(empty($URL) || empty($TITLE) || empty($CATEGORY)){
                echo '<div style="text-align: center;font-size: 25px;" class="msg_info"  role="alert">Fill In All Fields</div>';
                }else{
                $post_image = rand(0,1000)."_".$IMAGE_NAME;
                move_uploaded_file($IMAGE_TMP,"../asset/imgs/{$post_image}");

                $insert_product = $conn->prepare("insert into `api`(url,title,category,image) values('$URL','$TITLE','$CATEGORY','$post_image')");
                $insert_product->execute();
                if($insert_product){
                echo '<div style=" text-align: center;font-size: 25px;" class="msg_success"  role="alert">The Project Has Been Added</div>';
                ?>
                <script>
                setTimeout(() => {
                    window.location.href = 'projects.php';
                }, 2000);
                </script>
                <?php
                }else{
                echo '<div style="text-align: center;font-size: 25px;" class="msg_error">Something went wrong</div>';
                }
                }
                }
                ?>
                <!-- php code -->
                <form method="post" enctype="multipart/form-data">
                    <div class="input-box">
                        <div class="input-field"><input type="text" name="url" placeholder="Url" required=""></div>
                        <div class="input-field"><input type="text" name="title" placeholder="Title" required=""></div>
                    </div>
                    <div class="input-box">
                        <div class="input-field"><input type="text" name="category" placeholder="Category" required="">
                        </div>
                        <div class="input-field"><input type="file" name="image" required=""></div>
                    </div>
                    <div class="btn-box btns"><button class="btn" type="submit" name="add">Submit</button></div>
                </form>

                <div class="projects-slice">
                    <h2 class="heading">All <span>Projects (<?php echo $count_projects; ?>)</span></h2>
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

                    <script>
                    setTimeout(() => {
                        window.location.href = 'projects.php';
                    }, 2000);
                    </script>

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
                                $select_api = $conn->prepare('select * from `api` order by id desc');
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