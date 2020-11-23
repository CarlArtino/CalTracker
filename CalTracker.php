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
        $result = $mysqli->query("SELECT * FROM foods") or die($mysqli_error->error);
        //pre_r($result->fetch_assoc());
		
    ?>
	
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
						<th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Calories</th>
                        <th>Fat</th>
						<th>Cholesterol</th>
						<th>Sodium</th>
						<th>Carbs</th>
						<th>Protein</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thread>

				<form action="MealMaker.php" method="post" id="addFood"></form>

                <?php   
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['foodID'] ?></td>
                            <td><?php echo $row['foodName'] ?></td>
                            <td><?php echo $row['foodType'] ?></td>
                            <td><?php echo $row['foodBrand'] ?></td>
							<td><?php echo $row['calories'] ?></td>
							<td><?php echo $row['fat'] ?></td>
							<td><?php echo $row['cholesterol'] ?></td>
							<td><?php echo $row['sodium'] ?></td>
							<td><?php echo $row['carbs'] ?></td>
							<td><?php echo $row['protein'] ?></td>
               
                            <td>
                                <button type="submit" name="ateFood" form="addFood" value="<?= $row['foodID'] ?>"
                                    class="btn btn-info">Add</button>
                                <a href="process.php?delete=<?php echo $row['foodID']; ?>"
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
                <label>Name</label> <br>
                <input type="text" name="fName" class="form-control" placeholder="Enter name">
                <?php endif; ?>
            </div>
			
			<div class="form-group">
				<?php
                if ($update == false):
                ?>
				<label for="exampleFormControlSelect1">Type</label>
				<select class="form-control" name = "fType" id="exampleFormControlSelect1">
				<option value="Fruit">Fruit</option>
				<option value="Vegetable">Vegetable</option>
				<option value="Meat">Meat</option>
				<option value="Grain">Grain</option>
				<option value="Dairy">Dairy</option>
				<option value="Junk">Junk</option>
				</select>
				<?php endif; ?>
			</div>

            <div class="form-group">
                <label>Brand</label> <br>
                <input type="text" name="fBrand" class="form-control" placeholder="Enter brand">
            </div>

            <div class="form-group">
                <?php
                if ($update == false):
                ?>
                <label>Calories</label> <br>
                <input type="text" name="fCalories" class="form-control" placeholder="Enter calories">
                <?php endif; ?>
            </div>
			
			<div class="form-group">
                <?php
                if ($update == false):
                ?>
                <label>Fat</label> <br>
                <input type="text" name="fFat" class="form-control" placeholder="Enter fat">
                <?php endif; ?>
            </div>
			
			<div class="form-group">
                <?php
                if ($update == false):
                ?>
                <label>Cholesterol</label> <br>
                <input type="text" name="fCholesterol" class="form-control" placeholder="Enter cholesterol">
                <?php endif; ?>
            </div>
			
			<div class="form-group">
                <?php
                if ($update == false):
                ?>
                <label>Sodium</label> <br>
                <input type="text" name="fSodium" class="form-control" placeholder="Enter sodium">
                <?php endif; ?>
            </div>
			
			<div class="form-group">
                <?php
                if ($update == false):
                ?>
                <label>Carbs</label> <br>
                <input type="text" name="fCarbs" class="form-control" placeholder="Enter carbs">
                <?php endif; ?>
            </div>
			
			<div class="form-group">
                <?php
                if ($update == false):
                ?>
                <label>Protein</label> <br>
                <input type="text" name="fProtein" class="form-control" placeholder="Enter protein">
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