<?php
    include('../dbconn.php');

    if(isset($_GET['attRN'])){
        
        $attRN = $_GET['attRN'];
        $attTimeOut = date('Y-m-d H:i:s');


        $sql = "UPDATE attendance SET `attTimeOut` = '$attTimeOut',`attStat` = 'Cancelled' WHERE `attRN` = '$attRN'";
        $sql = mysqli_query($conn, $sql);

        if($sql){
            echo "<script>
                    window.alert('Attendace Recorded Successfully');
                    window.location.href='attendance.php';
            </script>";
        }
    }
?>