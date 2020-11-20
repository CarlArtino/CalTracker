<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'isp') or die(mysqli_error($mysqli));

$id = 0;
$price = '';
$update = false;

if (isset($_POST['save'])) {

    $foodName = $_POST['fName'];
    $foodType = $_POST['fType'];
    $foodBrand = $_POST['fBrand'];
    $calories = $_POST['fCalories'];
    $fat = $_POST['fFat'];
	$cholesterol = $_POST['fCholesterol'];
	$sodium = $_POST['fSodium'];
	$carbs = $_POST['fCarbs'];
	$protein = $_POST['fProtein'];

    $mysqli->query("INSERT INTO foods (foodName, foodType, foodBrand, calories, fat, cholesterol, sodium, carbs, protein) 
					VALUES('$foodName', '$foodType', '$foodBrand', '$calories', '$fat', '$cholesterol', '$sodium', '$carbs', '$protein')") or die($mysqli->error);

    $_SESSION['message'] = "Food has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: CalTracker.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM foods WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Food has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: CalTracker.php");
}

/*if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM foods WHERE id=$id") or die($mysqli->erorr());
    $update = true;

    if($result->num_rows) {
        $row = $result->fetch_array();
        $price = $row['price'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $price = $_POST['price'];

    $mysqli->query("UPDATE books SET price='$price' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Price has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: CalTracker.php');
}*/