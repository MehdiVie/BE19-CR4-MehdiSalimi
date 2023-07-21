<?php
    require_once  "db_connect.php"; 
    require_once  "fileUpload.php"; 

    $layout = "";
        

    if (isset($_POST['create'])) {

        $name = $_POST['name'];
        $price = number_format($_POST['price'],2);
        $ingridients = $_POST['ingridients'];
        $picture = fileUpload($_FILES['picture']);

        $sql = "insert into dishes (name,price,image,ingridients) values ('$name',$price,'$picture[0]','$ingridients')" ;


        if (mysqli_query($connect, $sql)) {

            $layout = "<div class='alert alert-success' role='alert'>
            New Dish has been created! , {$picture[1]}
            </div>";
            header("refresh : 3 , url = index.php");

        } else {
            $layout = "<div class='alert alert-danger' role='alert'>
            New Dish has NOT been created! , {$picture[1]}
            </div>";
        }




    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Dish</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"  crossorigin="anonymous">
</head>
<body>
    <?php
        include  "navbar.html"; 
    ?>
    <?= $layout ?>
    <div class="container mt-5">
        <h2>Create a new Dish</h2>
        <form method="POST" enctype= "multipart/form-data">
            <div class="mb-3 mt-3 w-50">
                <label for="title" class= "form-label">Title</label>
                <input  type="text" class="form-control" id="title" aria-describedby="title" name="title" required>
            </div>
            <div class="mb-3 w-50">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="number"  class="form-control"  id="isbn"  aria-describedby="isbn"  name="isbn" required>
            </div>
            <div class="mb-3 mt-3 w-50">
                <label for="description" class= "form-label">Description</label>
                <textarea class="form-control" id="description" aria-describedby="description" name="description"
                style="height: 100px" placeholder="write description here!" required>
            </div>
            <div class="mb-3 w-50">
                <label for="media_type" class="form-label">Media Type</label>
                <select class="form-select" id="media_type" aria-describedby="media_type" name="media_type">
                    <option selected>book</option>
                    <option value="1">CD</option>
                    <option value="2">DVD</option>
                </select>
            </div>
            <div class="mb-3 mt-3 w-50">
                <label for="author_first_name" class= "form-label">Author Firstname</label>
                <input  type="text" class="form-control" id="author_first_name" aria-describedby="author_first_name" name="author_first_name" required>
            </div>
            <div class="mb-3 mt-3 w-50">
                <label for="author_last_name" class= "form-label">Author Lastname</label>
                <input  type="text" class="form-control" id="author_last_name" aria-describedby="author_last_name" name="author_last_name" required>
            </div>
            <div class="mb-3 mt-3 w-50">
                <label for="publisher_name" class= "form-label">Publisher Name</label>
                <input  type="text" class="form-control" id="publisher_name" aria-describedby="publisher_name" name="publisher_name" required>
            </div>
            <div class="mb-3 mt-3 w-50">
                <label for="publisher_address" class= "form-label">Publisher Address</label>
                <textarea class="form-control" id="publisher_address" aria-describedby="publisher_address" name="publisher_address"
                style="height: 100px" placeholder="write publisher address here!" required>
            </div>
            <div class="mb-3 mt-3 w-50">
                <label for="publish_date" class= "form-label">Publish Date</label>
                <input  type="text" class="form-control" id="publish_date" aria-describedby="publish_date" name="publish_date"
                placeholder="YYYY-MM-DD" required>
            </div>
            <div class="mb-3 w-50">
                <label for="picture" class="form-label">picture</label>
                <input type = "file" class="form-control" id="picture" aria-describedby="picture"   name="picture">
            </div>
            <button name="create" type="submit" class="btn btn-primary">Create Dish</button>
            <a href="index.php" class="btn btn-warning">Back to home page</a>
        </form>
    </div>
    <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
<?php
mysqli_close($connect);
?>