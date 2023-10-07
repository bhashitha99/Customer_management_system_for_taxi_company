<?php session_start();?>
<?php include_once "../connection.php";  
$email=$_SESSION['email'];
$query_id = "SELECT cus_id FROM customer WHERE email='$email'";
$result_set_id =  mysqli_query($connection,$query_id);

$record_id = mysqli_fetch_assoc($result_set_id);
$cus_id = $record_id["cus_id"];

 $namequary="SELECT name  FROM  passenger where cus_id=$cus_id";
 $name_result=mysqli_query($connection,$namequary);
 $name_data=mysqli_fetch_assoc($name_result);
 $name=$name_data["name"]


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers</title>
    <link rel="stylesheet" href="../../css/empdash1.css">
    <link rel="stylesheet" href="../../css/emp_table.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7dd60dd937.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="bigbox">
    <div class="main-container d-flex leftside">
        <div class = "sidebar" id="side_nav">
                    <div class="header-box px-2 pt-3 pb-4">
                        <h1 class="fs-4"><span class="gb-white text-white rounded shadow px-2 me-2"><i class="fa-sharp fa-solid fa-sun"></i></span><span class="text-white">TAXI</span></h1>
                        <button class="btn d-md-none d-block close-btn px-1 py-0"><i class="far fa-stream"></i></button>
                    </div>
                    <div>
                        <ul class="list-unstyled px-2">
                            <li class=""><a href ="passenger.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-home"></i>Dashboard</li>
                            <li class=""><a href ="pas_profile.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-user"></i>Profile</li>
                            <li class="active"><a href ="" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-users"></i>Drivers</li>                        <ul class="list-unstyle px-2">
                            <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"></a></li>
                        </ul>
                    </div>
        </div>
    </div>
    <div class="rightside">
        <?php require_once("../navibar.php"); ?>
        <div>
            <h3 id="emphead">Drivers</h3>
        </div>
        <?php
            $empquary1="SELECT name,contact_no,age,gender,cus_id from driver";
            $emp_result1=mysqli_query($connection,$empquary1);

            

            echo "
            <table id='empt' >
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Job</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>";

                while($row = mysqli_fetch_assoc($emp_result1))
                {
                    $id=$row['cus_id'];
                    $vehicle="SELECT vehicle_type from vehicle where cus_id=$id";
                    $vehicle_result=mysqli_query($connection,$vehicle);
                    $vehi = mysqli_fetch_assoc($vehicle_result);
                    $vehicle_name = $vehi["vehicle_type"];
                echo "
                <tr>
                    <td>".$row['cus_id']."</td>
                    <td>".$row['name']." </td>
                    <td>".$row['gender']." </td>
                    <td>".$vehicle_name."</td>
                    <td>".$row['contact_no']."</td>
                </tr>
                ";
                }
                echo "
                </tbody>
            </table>";
        ?>
        <?php require_once("../footer.php") ?>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        $(".sidebar ul li").on('click' , function(){
            $(".sidebar ul li.active").removeClass('active');
            $(this).addClass('active');
        })
    </script>
    
</body>
</html>