<?php
            if(isset($_POST['submit'])){
            echo " 
            <table id='empt' >
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Vehicle Type</th>
                        <th>Contact No</th>
                        <th>Book</th>
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
                    <td><a href='../book.php?passenger_id=".$cus_id."&driver_id=".$id."'>Book</a></td>
                </tr>
                ";
                }
                echo "
                </tbody>
            </table>";
        }
            ?>