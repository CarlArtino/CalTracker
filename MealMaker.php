<?php session_start();?>

<!doctype html>
<html lang="en">
    <head>
        <title>Meal Maker</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
	
	<body>
		<?php 
			// Database Connection

			$mysqli = new mysqli('localhost', 'root', '', 'isp') or die(mysqli_error(mysqli));
            $result = $mysqli->query("SELECT * FROM foods") or die($mysqli_error->error);

            // Test isset for session array. set if not

		    $setArray = isset($_SESSION["currentMeal"]);
		    if (!$setArray) $_SESSION["currentMeal"] = array();

		    // Test if session variable from caltracker isset. append and null if so.

		    $adding = isset($_POST["ateFood"]);
		    if ($adding) {
		    	array_push($_SESSION["currentMeal"], $_POST["ateFood"]);
		    }
		?>
    <div class="container">
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

				<?php
				    // Add code to print list under here

				    if ($setArray || $adding) // Tests if it has a list to display. 
				    {
				    	$totCal = 0;   // init total calories
		                $totFat = 0;   // init total fat
		                $totChol = 0;  // init total cholesterol
		                $totSod = 0;   // init total sodium
		                $totCarb = 0;  // init total carbs
		                $totProt = 0;  // init total protein

				    	for ($i=0; $i<count($_SESSION["currentMeal"]); $i++){
				    		echo $_SESSION["currentMeal"][$i];
				    	}
				    }

					//if ($_SESSION["sampleSessionVar"] == "")
					// echo $_SESSION["sampleSessionVar"];
					
					// 	$_SESSION["sampleSessionVar"] = "Session Variable Example";
					// echo "<br>";
					// echo $_SESSION["sampleSessionVar"];
				?>
            </table>
        </div>
    </div>
    <form action="CalTracker.php" method="post" id="addFood">

	</form>

	<button type="submit" form="addFood" value="Submit">Add another food</button>
	</body>
	
</html>