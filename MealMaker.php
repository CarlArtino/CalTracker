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
	
	<form action="CalTracker.php" method="post" id="addFood">

	</form>

	<button type="submit" form="addFood" value="Submit">Add another food</button>
	
	<body>
		<?php 
            // Test isset for session array. set if not
		    $setArray = isset($_SESSION["currentMeal"]);
		    if (!$setArray) $_SESSION["currentMeal"] = array();

		    // Test if session variable from caltracker isset. append and null if so.
		    $adding = isset($_POST["ateFood"]);
		    if ($adding) {
		    	array_push($_SESSION["currentMeal"], $_POST["ateFood"]);
		    }

		    // Add code to print list under here
		    if ($setArray || $adding) // Tests if it has a list to display. 
		    {
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
	</body>
	
</html>