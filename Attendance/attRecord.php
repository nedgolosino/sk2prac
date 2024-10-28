<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"></link>
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <div class="container d-flex justify-content-center mt-5">
            <label for="empID">Employee ID</label>
            <input type="number" name="empID">
        </div>
        <div class="container d-flex justify-content-end mt-5">
            <button class="btn btn-success" name="submit">Submit</button>
        </div>
    </form>
    <div class="container d-flex justify-content-end mt-5">
        <a href="attendance.php"><button class="btn btn-secondary">Go Back</button></a>
    </div>
</body>
</html>
<?php
    include("../dbconn.php");

    if(isset($_POST['submit'])){

        $empID = $_POST['empID'];
        $attDate = date('Y-m-d');
        $attTimeIn = date('Y-m-d H:i:s');
        $attStat = "Not Cancelled";

        $sql = "INSERT INTO attendance (attDate, attTimeIn, attStat, empID) VALUES ('$attDate','$attTimeIn','$attStat','$empID')";
        $sql = mysqli_query($conn, $sql);

        if($sql){
            echo "<script>
                    window.alert('Recorded Successfully');
                    window.location.href='attRecord.php';
            </script>";
        }
    }
?>