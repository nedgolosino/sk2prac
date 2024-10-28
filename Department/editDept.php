<?php
    include("../dbconn.php");

    if(isset($_GET['depCode'])){

        $depCode = $_GET['depCode'];

        if(isset($_POST['submit'])){
        
            $depName = $_POST['depName'];
            $depHead = $_POST['depHead'];
            $depTelNo = $_POST['depTelNo'];
    
            if(empty($depName) || empty($depHead) || empty($depTelNo)){
    
                echo "<script>
                        window.alert('Fields Are Missing!');
                        window.location.href='editDept.php?depCode=$depCode';    
                    </script>";
            }
            else{
            $sql = "UPDATE `departments` SET `depName`='$depName',`depHead`='$depHead',`depTelNo`='$depTelNo' WHERE depCode = '$depCode'";
            $sql = mysqli_query($conn, $sql);
    
            if($sql){    
                echo "<script>
                        window.alert('Updated Successfully!');
                        window.location.href='editDept.php?depCode=$depCode';    
                    </script>";
                }
            }
        }else{

            $sql = "SELECT * from departments WHERE depCode = $depCode";
            $sql = mysqli_query($conn, $sql);
    
            $row = mysqli_fetch_assoc($sql);
    
            $depName = $row['depName'];
            $depHead = $row['depHead'];
            $depTelNo = $row['depTelNo'];
    
        }
    }
    
?>
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
                <label for="depName">Department Name</label>
                <input type="text" name="depName" value="<?php echo $depName ?>">
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="depHead">Department Head</label>
                <input type="text" name="depHead" value="<?php echo $depHead ?>">
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="depTelNo">Department Telephone Number</label>
                <input type="text" name="depTelNo" value="<?php echo $depTelNo ?>">
            </div>
        </div>

        <div class="container d-flex justify-content-end mt-5">
            <button name="submit" class="btn btn-primary">Submit</button>
            
        </div>
    </form>
        <div class="container d-flex justify-content-end mt-5">
            <a href="department.php"><button class="btn btn-secondary">Go Back</button></a>
        </div>
    
</body>
</html>