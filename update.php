<?php
    require_once  "db_connect.php"; 
    require_once  "fileUpload.php"; 

    $layout = "";
    $id=0;

    if (isset($_GET['detail'])) {

        $id = $_GET['detail'];

    } 
    
    $sql = "select * from media where id =".$id;
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);

    $title = $row['title'];
    $isbn = $row['ISBN_code'];
    $type = $row['type'];
    $short_description = $row['short_description'];
    $author_first_name = $row['author_first_name'];
    $author_last_name = $row['author_last_name'];
    $publisher_name = $row['publisher_name'];
    $publisher_address = $row['publisher_address'];
    $publish_date = $row['publish_date'];
    $status = $row['status'];
    $picture = $row['image'];
    $id = $row['id'];

    if (isset($_POST['update'])) {

        foreach($_POST as $key => $value) {
            //$_POST[$key] = str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $_POST[$key]);
            $_POST[$key] = mysqli_real_escape_string($connect, $_POST[$key]);
            $_POST[$key] = trim($_POST[$key]);
        }



        $title = $_POST['title'];
        $isbn = $_POST['isbn'];
        $type = $_POST['media_type'];
        $short_description = $_POST['description'];
        $author_first_name = $_POST['author_first_name'];
        $author_last_name = $_POST['author_last_name'];
        $publisher_name = $_POST['publisher_name'];
        $publisher_address = $_POST['publisher_address'];
        $publish_date = $_POST['publish_date'];
        $status = $_POST['status'];
        $picture_new = fileUpload($_FILES['picture']);


        if ($_FILES["picture"]["error"] == 0 ) {

            if($picture != "default.jpg") {
                unlink("photos/{$picture}");
            }
            
            $sql = "UPDATE `media` SET `title`='$title',`image`='$picture_new[0]',`ISBN_code`='$isbn',
            `short_description`='$short_description',
            `type`='$type',`author_first_name`='$author_first_name',`author_last_name`='$author_last_name',`publisher_name`='$publisher_name',`publisher_address`='$publisher_address',`publish_date`='$publish_date',`status`='$status' WHERE `id`= $id " ;
            $picture = $picture_new[0];

        } else {
            $sql = "UPDATE `media` SET `title`='$title',`ISBN_code`='$isbn',`short_description`='$short_description',
            `type`='$type',`author_first_name`='$author_first_name',`author_last_name`='$author_last_name',`publisher_name`='$publisher_name',`publisher_address`='$publisher_address',`publish_date`='$publish_date',`status`='$status' WHERE `id`= $id " ;
        }

        if (mysqli_query($connect, $sql)) {

            $layout = "<div class='alert alert-success' role='alert'>
            Dish has been updated! , {$picture_new[1]}
            </div>";
            
            header("refresh : 3 , url = index.php");

        } else {
            

            $layout = "<div class='alert alert-danger' role='alert'>
            Dish has NOT been updated! , {$picture_new[1]}
            </div>";
        }



    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"  crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        include  "navbar.html"; 
    ?>
    <?= $layout ?>
    <div class="container mt-5">
    <div class="wrapper">
    <div class="box">

        <h2 class="text-primary">Library - Update Media</h2>

        <form method="POST" enctype= "multipart/form-data" id="update_form">
        <div class="mb-3 mt-3 w-90">
                <label for="title" class= "form-label">Title</label>
                <input  type="text" class="form-control border-primary" id="title" aria-describedby="title" name="title" value="<?=$title?>" required>
            </div>
            <div class="mb-3 w-90">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text"  class="form-control  border-primary"  id="isbn"  aria-describedby="isbn"  name="isbn" value="<?=$isbn?>" required>
            </div>
            <div class="mb-3 mt-3 w-90">
                <label for="description" class= "form-label">Description</label>
                <textarea class="form-control border-primary" type="text" id="description" form="update_form" aria-describedby="description" name="description"
                 style="height: 150px" placeholder="write description here!" maxlength="1000"  required><?php echo $short_description; ?></textarea>
            </div>
            <div class="mb-3 w-90">
                <label for="media_type" class="form-label">Media Type</label>
                <select class="form-select  border-primary" id="media_type" aria-describedby="media_type" name="media_type">
                    <option value="book" <?php if ($type == "book" ) { echo "selected";}?>>book</option>
                    <option value="CD"   <?php if ($type == "CD" ) { echo "selected";}?>>CD</option>
                    <option value="DVD"  <?php if ($type == "DVD" ) { echo "selected";}?>>DVD</option>
                </select>
            </div>
            <div class="mb-3 mt-3 w-90">
                <label for="author_first_name" class= "form-label">Author Firstname</label>
                <input  type="text" class="form-control  border-primary" id="author_first_name" aria-describedby="author_first_name" name="author_first_name" value="<?=$author_first_name?>" required>
            </div>
            <div class="mb-3 mt-3 w-90">
                <label for="author_last_name" class= "form-label">Author Lastname</label>
                <input  type="text" class="form-control  border-primary" id="author_last_name" aria-describedby="author_last_name" name="author_last_name" value="<?=$author_last_name?>" required>
            </div>
            <div class="mb-3 mt-3 w-90">
                <label for="publisher_name" class= "form-label">Publisher Name</label>
                <input  type="text" class="form-control  border-primary" id="publisher_name" aria-describedby="publisher_name" name="publisher_name" 
                value="<?=$publisher_name?>" required>
            </div>
            <div class="mb-3 mt-3 w-90">
                <label for="publisher_address" class= "form-label">Publisher Address</label>
                <textarea class="form-control  border-primary" id="publisher_address" aria-describedby="publisher_address" name="publisher_address"
                 style="height: 100px" placeholder="write publisher address here!" maxlength="400" required><?php echo $publisher_address; ?></textarea>
            </div>
            <div class="mb-3 mt-3 w-90">
                <label for="publish_date" class= "form-label">Publish Date</label>
                <input  type="text" class="form-control  border-primary" id="publish_date" aria-describedby="publish_date" name="publish_date"
                value="<?=$publish_date ?>" placeholder="YYYY-MM-DD" required>
            </div>
            <div class="mb-3 w-90">
                <label for="status" class="form-label">Status</label>
                <select class="form-select  border-primary" id="media_type" aria-describedby="status" name="status">
                    <option value="available" <?php if ($status == "available" ) { echo "selected";}?>>available</option>
                    <option value="reserved"  <?php if ($status == "reserved" ) { echo "selected";}?>>reserved</option>
                    <option value="suspend"   <?php if ($status == "suspend" ) { echo "selected";}?>>suspend</option>
                </select>
            </div>
            <div class="mb-3 w-90">
                <label for="status" class="form-label">Upload new Photo</label>
                <input type = "file" class="form-control  border-primary" id="picture" aria-describedby="picture"   name="picture">
            </div>
            <button name="update" type="submit" class="btn btn-primary">Update Media</button>
            <a href="index.php" class="btn btn-warning">Back to home page</a>
        </form>
    </div>

    <div class="box img_box">
        <img src="photos/<?=$picture?>" alt="">
    </div>

    </div>
    </div>
    <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
<?php
mysqli_close($connect);
?>