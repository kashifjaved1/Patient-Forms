<?php
error_reporting(0);
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'bahmni');

if($_GET['op'] == "medmgmtdel"){
    $id = $_GET['id'];
    $result = mysqli_query($conn, "DELETE FROM pat_med WHERE id=$id");
    $_GET['op'] = "";
    header("Location: pat_med_view.php");
}

if($_GET['op'] == "foodmgmtdel"){
    $id = $_GET['id'];
    $result = mysqli_query($conn, "DELETE FROM pat_food WHERE id=$id");
    $_GET['op'] = "";
    header("Location: pat_food_view.php");
}

if($_GET['op'] == "vitalmgmtdel"){
  $rid = $_GET['id'];
  $result = mysqli_query($conn, "DELETE FROM pat_vitals WHERE id=$rid");
  $_GET['op'] = "";
  $_SESSION['msg'] = "<script>alert('Patient Vitals Deleted Successfully.')</script>";
  header("Location: pat_vitals_view.php");
}

if($_GET['op'] == "delallrec"){
    $_SESSION['rid'] = $_GET['id'];
    $_SESSION['pid'] = $_GET['pid'];
    $_GET['resp'] = "";
    header('location: confirm.php');
}

if($_GET['resp'] == "true"){
  $rid = $_SESSION['rid'];
  $pid = $_SESSION['pid'];
  $result = mysqli_query($conn, "DELETE FROM patient where id=$id");
  $result = mysqli_query($conn, "DELETE FROM pat_vitals WHERE pid=$pid"); 
  $result = mysqli_query($conn, "DELETE FROM pat_med WHERE pid = $pid");
  $result = mysqli_query($conn, "DELETE FROM pat_food WHERE pid = $pid");
  $_GET['resp'] = "";
  $_SESSION['msg'] = "<script>alert('Patient All Record Deleted Successfully.')</script>";
  header('location: index.php');
}
else if($_GET['resp'] == "false"){
  $_GET['resp'] = "";
  header('location: index.php');
}

?>