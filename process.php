<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'isp') or die(mysqli_error($mysqli));

$id = 0;
$price = '';
$update = false;

if (isset($_POST['save'])) {

    $id = $_POST['isbn'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $flag = $_POST['flag'];

    $mysqli->query("INSERT INTO books (id, title, price, quantity, flag) VALUES('$id', '$title', '$price', '$quantity', '$flag')") or
        die($mysqli->error);

    $_SESSION['message'] = "Book has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: CalTracker.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM books WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Book has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: CalTracker.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM books WHERE id=$id") or die($mysqli->erorr());
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
}