<?php require_once("include/connection.php"); ?>
<?php session_start(); 
    $_SESSION['email'] = "";
    $_SESSION['password'] = "";
    ?>
<?php
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashed_password = sha1($password);
        $inval_or_not="";
        $query_user = "SELECT cus_type FROM customer  WHERE email='$email' AND password='$hashed_password' ";
        //$quert_test = "SELECT * FROM employee WHERE emp_id=1";
        $result_set = mysqli_query($connection,$query_user);
        $record = mysqli_fetch_assoc($result_set);
        if($record==null){
            $inval_or_not= "Invalied User Name or Password";
        }else{
            $_SESSION['email']=$email;
            $_SESSION['password']=$password;
            switch($record['cus_type']){
                case 0:
                    header("Location: include/interfaces/admin.php");
                    break;
                case 1:
                    header("Location: include/interfaces/passenger.php");
                    break;
                default;
                    header("Location: include/interfaces/driver.php");
                    break;
            }
        }
    }
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taxi booking</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
     <header>
        <h2 class="tbook">Taxi booking</h2>
        <nav class="navigation">
            <a href = "#">Home</a>
            <a href = "#">About</a>
            <a href = "#">Services</a>
            <a href = "#">Contact</a>
            <button class="btn">Login</button>
        </nav>
    </header>

    <div class="wrapper">
        <div class="loggin">
            <h2>Loggin</h2>
            <form action="index.php" method="post">
                <table>
                    <tr>
                        <div class="input-box">
                            <td><span class="icon"><i class="fa-regular fa-envelope"></i></span></td>
                            <td><lable>Email</lable></td>
                            <td><input name="email" type="text" required></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="input-box">
                            <td><span class="icon"><i class="fa-solid fa-unlock-keyhole"></i></span></td>
                            <td><lable>Password</lable></td>
                            <td><input name="password" type="password" required></td>
                            
                        </div>
                    </tr>
                </table>
                <div class="inval"><?php
            if(isset($_POST['submit'])){
                echo $inval_or_not;
            }
            else{
                echo " .    ";
            }
        ?>  </div>
                <div><input type="submit" value="Log In" name="submit" class="btn login-btn"></div>
                <div class="login-register"><p>Don't have an account?<a href="#" class="register-link">  Register</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/7dd60dd937.js" crossorigin="anonymous"></script>
</body>
</html>