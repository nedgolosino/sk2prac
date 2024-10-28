<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>

<div class="container d-flex justify-content-end mt-5">
    <a href="monitoringDateRange.php">Attendance Monitoring(Date Range)</a>
</div>

<form method="GET">
    <div class="container d-flex justify-content-start mt-5">
        <label class="form" for="empID">Input Employee #: </label>
        <input type="number" name="empID">
        <button class="btn btn-primary">Search</button>
    </div>
</form>

<?php
    include('../dbconn.php');

    if(isset($_GET['empID'])){
        
        $empID = $_GET['empID'];
        
        if(empty($empID)){
            echo "  <script>
                        window.alert('Employee not found!');
                        window.location.href='employeeMonitoring.php';
                    </script>";
        }else{

        $checkEmpID = "SELECT empID FROM employees WHERE empID = '$empID'";
        $result = mysqli_query($conn, $checkEmpID);

        if(mysqli_num_rows($result) == 0){
            echo "<script>
                window.alert('Employee Not Found!');
                window.location.href='employeeMonitoring.php';
            </script>";
        }

        $namesql = "SELECT e.empFName, e.empLName, e.empRPH, d.depName FROM attendance a JOIN employees e ON a.empID = e.empID JOIN departments d ON e.depCode  = d.depCode WHERE a.empID = $empID";
        $namesql = mysqli_query($conn, $namesql);
        $fetchName = mysqli_fetch_assoc($namesql);

        

            $empFName = $fetchName['empFName'];
            $empLName = $fetchName['empLName'];
            $depName = $fetchName['depName'];
            $empRPH = $fetchName['empRPH'];
?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 d-flex align-items-start">
                <label for="empName">Name:</label>
                <p value=><?php echo "{$empFName} {$empLName}" ?></p>
            </div>
            <div class="col-md-6 d-flex align-items-start justify-content-end">
                <label for="depName">Department:</label>
                <p><?php echo "{$depName}"?></p>
            </div>
        </div>
    </div>

<body>
    <div class="container d-flex justify-content-center mt-5">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <td scope="col">Record#:</td>
                    <td scope="col">Emp. ID</td>
                    <td scope="col">Date/Time In</td>
                    <td scope="col">Date/Time Out</td>
                    <td scope="col">Total</td>
                </tr>
            </thead>
<?php

            $sql = "SELECT *, TIMESTAMPDIFF(HOUR, attTimeIn, attTimeOut) AS timeDifference,(SELECT SUM(TIMESTAMPDIFF(HOUR, attTimeIn, attTimeOut)) FROM attendance WHERE empID = '$empID') as totalHours FROM attendance WHERE `empID` = '$empID'";
            $sql = mysqli_query($conn, $sql);
            
            if($sql){
                while($row = mysqli_fetch_assoc($sql)){

                    $salary = $empRPH * $row['totalHours'];
                    $totalHours = $row['totalHours'];

                    echo "<tbody>
                    <td scope='col'>$row[attRN]</td>
                    <td scope='col'>$row[empID]</td>
                    <td >$row[attTimeIn]</td>
                    <td >$row[attTimeOut]</td>
                    <td scope='col'>$row[timeDifference]</td>
                    </tbody>";
                }

?>
        </table>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-start">
                <label for="">Rate Per Hour:<p><?php echo "{$empRPH}";?></p></label>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <label for="">Total Hours Worked:<p><?php echo "{$totalHours}";?></p></label> 
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-start">
                <label for="">Salary:<p><?php echo "{$salary}";?></p></label> 
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <label for="">Date Generated:<p><?php $generated = date("m-d-Y"); echo "{$generated}";?></p></label> 
            </div>
        </div>
    </div>

    <?php
                }
            }
        
    }   
?>
    <div class="container d-flex justify-content-end mt-5">
        <a href="../index.php"><button class="btn btn-secondary">Go Back</button></a>
    </div>
</body>
</html>
