<?php

    include('../dbconn.php');

    if(isset($_GET['empID'])){

        $empID = $_GET['empID'];

        $sql = "DELETE FROM `employees` WHERE `empID` = '$empID'";
        $sql = mysqli_query($conn, $sql);

        if($sql){
            echo"<script>
                    window.alert('Deleted Successfully');
                    window.location.href='employee.php';
                </script>";
        }

    }
?>