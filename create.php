<?php
    require_once  "db_connect.php"; 
    require_once  "fileUpload.php"; 

    $layout = "";
        

    if (isset($_POST['create'])) {

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
        $picture = fileUpload($_FILES['picture']);

        $sql = "INSERT INTO `media`(`title`, `image`, `ISBN_code`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status`) VALUES 
        ('$title','$picture[0]','$isbn','$short_description','$type','$author_first_name','$author_last_name','$publisher_name','$publisher_address','$publish_date','$status')" ;


        if (mysqli_query($connect, $sql)) {

            $layout = "<div class='alert alert-success' role='alert'>
            New Media has been created! , {$picture[1]}
            </div>";
            header("refresh : 3 , url = index.php");

        } else {
            $layout = "<div class='alert alert-danger' role='alert'>
            New Media has NOT been created! , {$picture[1]}
            </div>";
        }




    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Create new Media</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"  crossorigin="anonymous">
</head>
<body>
    <?php
        include  "navbar.html"; 
    ?>
    <?= $layout ?>
    <div class="container mt-5">
        <h2 class="text-primary">Create a new MEDIA</h2>
        <form method="POST" enctype= "multipart/form-data">
            <div class="mb-3 mt-3 w-50">
                <label for="title" class= "form-label">Title</label>
                <input  type="text" class="form-control  border-primary" id="title" aria-describedby="title" name="title" required>
            </div>
            <div class="mb-3 w-50">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text"  class="form-control  border-primary"  id="isbn"  aria-describedby="isbn"  name="isbn" required>
            </div>
            <div class="mb-3 mt-3 w-50">
                <label for="description" class= "form-label">Description</label>
                <textarea class="form-control  border-primary" id="description" aria-describedby="description" name="description"
                 style="height: 150px" placeholder="write description here!" maxlength="1000" required></textarea>
            </div>
            <div class="mb-3 w-50">
                <label for="media_type" class="form-label">Media Type</label>
                <select class="form-select  border-primary" id="media_type" aria-describedby="media_type" name="media_type">
                    <option value="book" selected>book</option>
                    <option value="CD">CD</option>
                    <option value="DVD">DVD</option>
                </select>
            </div>
            <div class="mb-3 mt-3 w-50">
                <label for="author_first_name" class= "form-label">Author Firstname</label>
                <input  type="text" class="form-control  border-primary" id="author_first_name" aria-describedby="author_first_name" name="author_first_name" required>
            </div>
            <div class="mb-3 mt-3 w-50">
                <label for="author_last_name" class= "form-label">Author Lastname</label>
                <input  type="text" class="form-control  border-primary" id="author_last_name" aria-describedby="author_last_name" name="author_last_name" required>
            </div>
            <div class="mb-3 mt-3 w-50">
                <label for="publisher_name" class= "form-label">Publisher Name</label>
                <input  type="text" class="form-control  border-primary" id="publisher_name" aria-describedby="publisher_name" name="publisher_name" required>
            </div>
            <div class="mb-3 mt-3 w-50">
                <label for="publisher_address" class= "form-label">Publisher Address</label>
                <textarea class="form-control  border-primary" id="publisher_address" aria-describedby="publisher_address" name="publisher_address"
                style="height: 100px" placeholder="write publisher address here!" maxlength="400" required></textarea>
            </div>
            <div class="mb-3 mt-3 w-50">
                <label for="publish_date" class= "form-label">Publish Date</label>
                <input  type="text" class="form-control  border-primary" id="publish_date" aria-describedby="publish_date" name="publish_date"
                placeholder="YYYY-MM-DD" required>
            </div>
            <div class="mb-3 w-50">
                <label for="status" class="form-label">Media Type</label>
                <select class="form-select  border-primary" id="media_type" aria-describedby="status" name="status">
                    <option value="available" selected>available</option>
                    <option value="reserved">reserved</option>
                    <option value="suspend">suspend</option>
                </select>
            </div>
            <div class="mb-3 w-50">
                <label for="picture" class="form-label">picture</label>
                <input type = "file" class="form-control  border-primary" id="picture" aria-describedby="picture"   name="picture">
            </div>
            <button name="create" type="submit" class="btn btn-primary">Create Media</button>
            <a href="index.php" class="btn btn-warning">Back to home page</a>
        </form>
    </div>
    <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
<?php
mysqli_close($connect);
?>