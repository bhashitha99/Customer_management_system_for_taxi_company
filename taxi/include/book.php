
<?php session_start();?>
<?php include_once "connection.php";  
    $driver_id=$_GET['driver_id'];
    $passenger_id=$_GET['passenger_id'];
    echo $passenger_id;
    $quary_book="INSERT INTO book (driver, passenger)
    VALUES ( $driver_id , $passenger_id)";
    $quary_book_set=mysqli_query($connection,$quary_book);
    header('Location: interfaces/passenger.php');
?>