<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"></link>
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 align-items-start">
                    <label for="attDateTime">Select Start Date and Time</label>
                    <input type="datetime-local" name="attDateTime" required>
                </div>
                <div class="col-md-6 justify-content-end">
                    <label for="attDateTime2">Select End Date</label>
                    <input type="datetime-local" name="attDateTime2" required>
                </div>
            </div>
            <button class="btn btn-success" name="submit">Submit</button>
        </div>
        <div class="container d-flex justify-content-start mt-5">
        </div>
    </form>

    <div class="container d-flex justify-content-end mt-5">
        <a href="employeeMonitoring.php"><button class="btn btn-secondary">Go Back</button></a>
    </div>

    <div class="container d-flex justify-content-center mt-5">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <td scope="col">Record #</td>
                    <td scope="col">Emp. ID</td>
                    <td scope="col">Date/Time In</td>
                    <td scope="col">Date/Time Out</td>
                    <td scope="col">Total</td>
                </tr>
            </thead>
<?php
    include("../dbconn.php");

    if(isset($_GET['submit'])){

        $attDateTime = $_GET['attDateTime'];
        $attDateTime2 = $_GET['attDateTime2'];

        $sql = "SELECT *, TIMESTAMPDIFF(HOUR, attTimeIn, attTimeOut) as timeDifference,(SELECT SUM(TIMESTAMPDIFF(HOUR, attTimeIn, attTimeOut)) FROM attendance) as totalHours FROM attendance WHERE attTimeIn >= '$attDateTime' AND attTimeOut <= '$attDateTime2'";
        $sql = mysqli_query($conn, $sql);

        if($sql){
            while($row = mysqli_fetch_assoc($sql)){

                $totalHours = $row['totalHours'];

                echo  "<tbody>
                        <td>$row[attRN]</td>    
                        <td>$row[empID]</td>
                        <td>$row[attTimeIn]</td>
                        <td>$row[attTimeOut]</td>
                        <td>$row[timeDifference]</td>
                    </tbody>";
            }
        }
    }
?>
        </table>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-start">
                <label for="">Date Generated:<p><?php $generated = date("m-d-Y"); echo "{$generated}";?></p></label> 
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <label for="">Total Hours Worked:<p><?php if(empty($totalHours))
                echo "<p>Not Available</p>";
                else echo "{$totalHours}";?></p></label> 
            </div>
        </div>
    </div>

    </body>
</html>

