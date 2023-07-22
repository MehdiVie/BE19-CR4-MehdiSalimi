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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"  crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        include  "navbar.html"; 
    ?>
    <?= $layout ?>
    <div class="container mt-3">
    <div class="wrapper">

    <div class="box">

        <h2 class="text-primary">Detail Media</h2>

        <form method="POST" enctype= "multipart/form-data" id="update_form">
        <div class="mb-3 mt-3 w-50">
                <label for="title" class= "form-label">Title</label>:<br>
                <?=$title?>
            </div>
            <div class="mb-3 w-50">
                <label for="isbn" class="form-label">ISBN</label>:<br>
                <?=$isbn?>
            </div>
            <div class="mb-3 mt-3 ">
                <label for="description" class= "form-label">Description</label>:<br>
                <?php echo $short_description; ?>
            </div>
            <div class="mb-3 ">
                <label for="media_type" class="form-label">Media Type</label>:<br>
                <?=$type?>
            </div>
            <div class="mb-3 mt-3 ">
                <label for="author_first_name" class= "form-label">Author Firstname</label>:<br>
                <?=$author_first_name ?>
            </div>
            <div class="mb-3 mt-3 ">
                <label for="author_last_name" class= "form-label">Author Lastname</label>:<br>
                <?=$author_last_name ?>
            </div>
            <div class="mb-3 mt-3 ">
                <label for="publisher_name" class= "form-label">Publisher Name</label>:<br>
                <?=$publisher_name?>
            </div>
            <div class="mb-3 mt-3 ">
                <label for="publisher_address" class= "form-label">Publisher Address</label>:<br>
                <?php echo $publisher_address; ?>
            </div>
            <div class="mb-3 mt-3 ">
                <label for="publish_date" class= "form-label">Publish Date</label>:<br>
                <?=$publish_date ?>
            </div>
            <div class="mb-3 ">
                <label for="status" class="form-label">Status</label>:<br>
                <?=$status ?>
                </select>
            </div>
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