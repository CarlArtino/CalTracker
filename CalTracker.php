<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <?php require_once 'process.php'; ?>

    <?php 
    
    if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php   
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

    <div class="container">
    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'isp') or die(mysqli_error(mysqli));
        $result = $mysqli->query("SELECT * FROM books") or die($mysqli_error->error);
        //pre_r($result->fetch_assoc());
    ?>

        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thread>

                <?php   
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['price'] ?></td>
                            <td><?php echo $row['quantity'] ?></td>
                            <td><?php if ($row['flag'] == 1) 
                                        echo "Discontinued"; 
                                      else 
                                        echo "Available";
                                ?></td>
                            <td>
                                <a href="CalTracker.php?edit=<?php echo $row['id']; ?>"
                                    class="btn btn-info">Edit</a>
                                <a href="process.php?delete=<?php echo $row['id']; ?>"
                                    class="btn btn-danger">Delete</a>
                        </tr>
                    <?php endwhile; ?>
            </table>
        </div>


    <div class="row justify-content-center"> 
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="form-group">
                <?php
                if ($update == false):
                ?>
                <label>ISBN</label> <br>
                <input type="text" name="isbn" class="form-control" placeholder="Enter ISBN (no dash)">
                <?php endif; ?>
            </div>

            <div class="form-group">
                <?php
                if ($update == false):
                ?>
                <label>Title</label> <br>
                <input type="text" name="title" class="form-control" placeholder="Enter book title">
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Price</label> <br>
                <input type="text" name="price" 
                        value="<?php echo $price; ?>" class="form-control" placeholder="Enter book price">
            </div>

            <div class="form-group">
                <?php
                if ($update == false):
                ?>
                <label>Quantity</label> <br>
                <input type="text" name="quantity" class="form-control" placeholder="Enter book quantity">
                <?php endif; ?>
            </div>
            
            <div class="custom-control custom-checkbox">
                <?php
                if ($update == false):
                ?>
                <input type="hidden" class="form-check-input" name="flag" id="customCheck1" value="0" />
                <input type="checkbox" class="form-check-input" name="flag" id="customCheck1" value="1">
                <label> Book is discontinued</label>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <br>
                <?php
                if ($update == true):
                ?>
                    <button type="submit" class="btn btn-info" name="update">Update</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    </body>
</html>