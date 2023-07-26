<?php
    require_once  "db_connect.php";  

    $layout = "";
    $publisher="";

    if (isset($_GET['publisher'])) {

        $publisher = $_GET['publisher'];

    } 
    
    $sql = "select distinct(publisher_name) from media order by publisher_name";
    $result = mysqli_query($connect,$sql);
    
    if (!empty($publisher)) {
        $sql = "select * from media where publisher_name = '$publisher'";

        $result2 = mysqli_query($connect,$sql);
        
        while($row2 = mysqli_fetch_assoc($result2)) {
            $layout .= "
            <div class='card' style='width: 25rem;'>
            <img class='card-img-top' src='photos/{$row2['image']}' alt='Card image cap'>
            <div class='card-body'>
              <h5 class='card-title'>{$row2['title']}</h5>
              <p class='card-text'>Type:  {$row2['type']}</p>
              <p class='card-text'>";
              $layout .= substr($row2['short_description'],0,120)."...";
              $layout .= "</p>";
              $layout .="<div class='d-flex justify-content-between'>
              <a href='details.php?detail={$row2['id']}#detail' class='btn btn-primary'>Show Detail</a>
              <a href='update.php?detail={$row2['id']}' class='btn btn-warning'>Update Media</a>
              <a href='delete.php?detail={$row2['id']}' class='btn btn-danger'>Delete Media</a>
              </div>
                </div>
            </div>";
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Publishers</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"  crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        include  "navbar.html"; 
    ?>
    <div class="container mt-3">


        <h2 class="text-primary">Publishers</h2>
        <form method="get">
        <div class="mb-3 w-50">
                <label for="status" class="form-label">Publishers List</label>
                <select class="form-select  border-primary" id="publisher" aria-describedby="publisher" name="publisher">
                    <?php 
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <option value="<?=$row['publisher_name']?>" <?php if ($publisher == $row['publisher_name']) { echo "selected"; } ?> >
                        <?=$row['publisher_name']?></option>
                    <?php
                    }
                    ?>
                </select>
        </div>
        <button type="submit" class="btn btn-primary">Show Medias form the Publisher</button>
        </form>
        <div>
            <?php 
            if (!empty($publisher)) {
            ?>
            <br>
            <h3 class='text-primary'>Meidas form <?=$publisher?></h3><br>
            <?php
            }
            ?>
            <div class="wrapper2">
                <?= $layout ?>
            <div>
        </div>
            
        
    </div>


    
    <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
<?php
mysqli_close($connect);
?>