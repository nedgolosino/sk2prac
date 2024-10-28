<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"></link>
    <title>Document</title>
</head>
<body>

    <div class="container d-flex justify-content-center mt-5">
        <a href="attRecord.php">Record Attendance Here </a>
        <p> | </p>
        <a href="../index.php"> Back to Menu</a>
    </div>

    <div class="container d-flex justify-content-center mt-5">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <td scope="col">Record #</td>
                    <td scope="col">Emp. ID</td>
                    <td scope="col">Date/Time In</td>
                    <td scope="col">Date/Time Out</td>
                    <td scope="col">Action</td>
                </tr>
            </thead>
<?php
    include('../dbconn.php');

    $sql = "SELECT * FROM attendance";
    $sql = mysqli_query($conn, $sql);

    if($sql){
        while($row = mysqli_fetch_assoc($sql)){

            echo  "<tbody>
                    <td>$row[attRN]</td>    
                    <td>$row[empID]</td>
                    <td>$row[attTimeIn]</td>
                    <td>$row[attTimeOut]</td>
                    <td><a href='cancelRecord.php?attRN=$row[attRN]'>$row[attStat]</a></td>
                </tbody>";
        }
    }

?>
        </table>
    </div>
</body>
</html>