<?php
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