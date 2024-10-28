
<?php

    include('dbcon.php');

    if(isset($_GET['ID'])){
        
        $ID = $_GET['ID'];

        if(isset($_POST['submit'])){
            

            $campus = $_POST['campus'];
            $FName = $_POST['FName'];
            $LName = $_POST['LName'];
            $amount = $_POST['amount'];
            $attended = $_POST['attended'];
            
            $update = "UPDATE students SET campus = '$campus', FName = '$FName', LName = '$LName', amount = '$amount', attended = '$attended' WHERE ID = $ID";
            $update = mysqli_query($conn, $update);

            if($update){
                echo "<script>
                        window.alert('Updated Successfuly');
                        window.location.href='student.php';
                        </script>";
            }
        }else{

            $sql = "SELECT * FROM students WHERE ID = $ID";
            $sql = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_assoc($sql);

            $ID = $row['ID'];
            $campus = $row['campus'];
            $FName = $row['FName'];
            $LName = $row['LName'];
            $amount = $row['amount'];
            $attended = $row['attended'];
    
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"></link>
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <div class="container d-flex justify-content-start mt-5">
            <h1>Update Student</h1>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="ID">ID:</label>
                <input type="text" name="ID" value="<?php echo $ID; ?>" readonly>
            </div><br>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="">Select Campus:</label>
                <select name="campus" id="campus">
                    <option value="UC-Main" <?php if($campus == 'UC-Main') echo 'selected'?>>UC-Main</option>
                    <option value="UC-Banilad" <?php if($campus == 'UC-Banilad') echo 'selected'?>>UC-Banilad</option>
                    <option value="UC-LM" <?php if($campus == 'UC-LM') echo 'selected'?>>UC-LM</option>
                    <option value="UC-PT" <?php if($campus == 'UC-PT') echo 'selected'?>>UC-PT</option>
                </select>
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="FName">First Name:</label>
                <input type="text" name="FName" value="<?php echo $FName; ?>">
            </div><br>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="LName">Last Name:</label>
                <input type="text" name="LName" value="<?php echo $LName; ?>">
            </div><br>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" value="<?php echo $amount; ?>">
            </div><br>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="Attended">Attended:</label>
                <select name="attended" id="campus" value="<?php echo $attended; ?>">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>

                </select>
            </div><br>
        </div>
        <div class="container d-flex justify-content-end mt-5">
            <button class="btn btn-primary" type="submit" name="submit">Update Student</button>
            
        </div>
    </form>
    <div class="container d-flex justify-content-end mt-5">
        <a href="student.php"><button class="btn btn-danger">Go Back</button></a>
    </div>
</body>
</html>
