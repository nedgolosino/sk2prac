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
            <div class="form-group">
                <label for="empFName">First Name</label>
                <input type="text" name="empFName">
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="empLName">Last Name</label>
                <input type="text" name="empLName">
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="empRPH">Rate/Hour</label>
                <input type="number" step=0.01 name="empRPH">
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="depCode">Department Code</label>
                <input type="text" name="depCode">
            </div>
        </div>
        <div class="container d-flex justify-content-end">
            <button class="btn btn-primary" name="submit">Add Employee</button>
        </div>
    </form><br>
    <div class="container d-flex justify-content-end">
        <a href="employee.php"><button class="btn btn-secondary">Back</button></a>
    </div>
</body>
</html>
<?php
    include("../dbconn.php");

    if(isset($_POST['submit'])){

        $empFName = $_POST['empFName'];
        $empLName = $_POST['empLName'];
        $empRPH = $_POST['empRPH'];
        $depCode = $_POST['depCode'];
        

        if(empty($empFName) || empty($empLName) || empty($empRPH) || empty($depCode)){

            echo "<script>
                    window.alert('Fields are missing!');
                    window.location.href='addEmp.php';
                    </script>";
        }else{
        $sql = "INSERT INTO `employees`(`empFName`, `empLName`, `empRPH`, `depCode`) VALUES ('$empFName','$empLName','$empRPH','$depCode')";
        $sql = mysqli_query($conn, $sql);

        if($sql){
            echo "<script>
                    window.alert('Employees Added Successfully');
                    window.location.href='addEmp.php';
                </script>";
        }
    }
}
?>