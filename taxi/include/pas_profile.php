<?php require_once("connection.php") ?>
<?php
    $email = $_SESSION['email'];

    $query_id = "SELECT cus_id FROM customer WHERE email='$email'";
    $result_set_id =  mysqli_query($connection,$query_id);
    
    $record_id = mysqli_fetch_assoc($result_set_id);
    $cus_id = $record_id["cus_id"];

    $query = "SELECT * FROM passenger WHERE cus_id='$cus_id'";
    $result_set = mysqli_query($connection, $query);
    $record = mysqli_fetch_assoc($result_set);
    $name = $record["name"];
    $gender = $record["gender"];
    $co_num = $record["contact_no"];
    $age = $record["age"];

    if(isset($_POST['submit'])){
        $cur_password = $_POST['currentPassword'];
        $new_password = $_POST['newPassword'];
        $confirm_password = $_POST['confirmPassword'];

    if ($new_password == $confirm_password) {

        $hashed_cur_password = sha1($cur_password);
        $hashed_new_password = sha1($new_password);

        $query_user = "SELECT password FROM customer WHERE email='$email'";
        $result_set = mysqli_query($connection, $query_user);
        $record = mysqli_fetch_assoc($result_set);
        $db_password = $record["password"];
        if ($db_password == $hashed_cur_password) {
            $query_change_password = "UPDATE customer SET password='$hashed_new_password' WHERE email='$email'";
            $result_change_password = mysqli_query($connection, $query_change_password);
            echo '<script>alert("Password has been changed")</script>';
        } else {
            echo '<script>alert("Invalid Password")</script>';
        }
    }else{
        echo '<script>alert("Retype your new password correctly")</script>';
    }
    }
?>

<div class="imageContainer">
        <img src="../../img/avatar1.jpg" width="256" height="256" alt="Profile Picture" class="avatar">
    </div>

<div class="bigContainer">
    <div class="tableContainer">
        <table class="editable">
            <tr>
                <td>Name</td>
                <td> :- </td>
                <td><b><?php echo $name ?></b></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td> :- </td>
                <td><b><?php echo $gender ?></b></td>
            </tr>
            <tr>
                <td>Contact Number</td>
                <td> :- </td>
                <td><b><?php echo $co_num ?></b></td>
            </tr>
            <tr>
                <td>Age</td>
                <td> :- </td>
                <td><b><?php echo $age ?></b></td>
            </tr>
        </table>
    </div>
    <div class="changePasswordForm">
        <form action="pas_profile.php" method="post">
            <div class=content>
                <h2>Change Password</h2>
                <div class="row">
                    <label class="inline-block">Current Password</label>
                    <span id="currentPassword"
                    class="validation-message"></span> <input
                    type="password" name="currentPassword"
                    class="full-width">
                </div>
                <div class="row">
                    <label class="inline-block">New Password</label> <span
                    id="newPassword" class="validation-message"></span><input
                    type="password" name="newPassword"
                    class="full-width">
                </div>
                <div class="row">
                    <label class="inline-block">Confirm Password</label>
                    <span id="confirmPassword"
                    class="validation-message"></span><input
                    type="password" name="confirmPassword"
                    class="full-width">
                </div>
                <div class="row">
                    <input class="changebtn" type="submit" name="submit" value="Change Password">
                    <div class="inval">
                        <?php
                            if(isset($_POST['submit'])){
                                  
                            }
                        ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>