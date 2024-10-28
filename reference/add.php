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
        <div class="container d-flex justify-content-start mt-5">
            <h1>Add New Student</h1>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="ID">ID:</label>
                <input type="text" name="ID">
            </div><br>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="">Select Campus:</label>
                <select name="campus" id="campus">
                    <option value="UC-Main">UC-Main</option>
                    <option value="UC-Banilad">UC-Banilad</option>
                    <option value="UC-LM">UC-LM</option>
                    <option value="UC-PT">UC-PT</option>
                </select>
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="FName">First Name:</label>
                <input type="text" name="FName">
            </div><br>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="LName">Last Name:</label>
                <input type="text" name="LName">
            </div><br>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" name="amount">
            </div><br>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="Attended">Attended:</label>
                <select name="attended" id="campus">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>

                </select>
            </div><br>
        </div>
        <div class="container d-flex justify-content-end mt-5">
            <button class="btn btn-primary" type="submit" name="submit">Add Student</button>
            
        </div>
    </form>
    <div class="container d-flex justify-content-end mt-5">
        <a href="student.php"><button class="btn btn-danger">Go Back</button></a>
    </div>
</body>
</html>

<?php 

    include('dbcon.php');

    if(isset($_POST['submit'])){
        
        $ID = $_POST['ID'];
        $campus = $_POST['campus'];
        $FName = $_POST['FName'];
        $LName = $_POST['LName'];
        $amount = $_POST['amount'];
        $attended = $_POST['attended'];

        $check = "SELECT * FROM students WHERE ID = $ID";
        $check = mysqli_query($conn, $check);
        if($check-> num_rows>0){
            echo "  <script> 
                        window.alert('Student Already Exists');
                        window.location.href='add.php';
                    </script>";
        }else{

        $sql = "INSERT INTO students (ID, campus, FName, LName, amount, attended) VALUES ('$ID', '$campus', '$FName', '$LName', '$amount', '$attended')";
        $sql = mysqli_query($conn, $sql);   

        if($sql){
            echo "  <script> 
                        window.alert('Added Successfully');
                        window.location.href='student.php';
                    </script>";
            }
        }
    }

?>