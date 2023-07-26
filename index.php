<?php
    require_once  "db_connect.php"; 
   
    $sql = "SELECT * FROM media";

    $result = mysqli_query($connect, $sql);

    $layout="";
    $detail="";
    $detail_id = 0 ;

    if (isset($_GET['detail'])) {

        $detail_id = intval($_GET['detail']);

    }

    if (mysqli_num_rows($result)) {

        while($row = mysqli_fetch_assoc($result)) {

            $layout .= "
            <div class='card' style='width: 25rem;'>
            
            <img class='card-img-top' src='photos/{$row['image']}' alt='Card image cap'>
            
            <div class='card-body'>
              
              <h5 class='card-title'>{$row['title']}</h5>
              
              <p class='card-text'>Type:  {$row['type']}</p>
              
              <p class='card-text'>";
              $layout .= substr($row['short_description'],0,120)."...";
              $layout .= "</p>";
            $layout .="<div class='d-flex justify-content-between'>
            <a href='details.php?detail={$row['id']}#detail' class='btn btn-primary'>Show Detail</a>
            <a href='update.php?detail={$row['id']}' class='btn btn-warning'>Update Media</a>
            <a href='delete.php?detail={$row['id']}' class='btn btn-danger'>Delete Media</a>
            </div>
              </div>
          </div>";
        }

    } else {
        $layout="No Result!";
    }
?>

<!doctype html>
<html  lang="en">

    <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Library</title>
       <link rel="stylesheet" href="css/main.css">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"  crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <?php
        include  "navbar.html"; 
        ?>
        <div class="d-flex justify-content-center row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 ">
            <?= $layout ?>
        </div>
        <div class="detail">
        <?= $detail ?>
        </div>
    </div>
    
        <!--<script src="js/main.js"></script>-->
        <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>
<?php
mysqli_close($connect);
?>