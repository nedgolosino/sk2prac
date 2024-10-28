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
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID#</th>
                    <th scope="col">Campus</th>
                    <th scope="col">Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

<?php 

    include('dbcon.php');

    $sql = "SELECT * FROM students";
    $sql = mysqli_query($conn,$sql);

    if($sql){
        while($row = $sql->fetch_assoc()){


        echo "<tbody>
                <td>$row[ID]</td>
                <td>$row[campus]</td>
                <td>$row[FName]  $row[LName]</td>
                <td>$row[amount]</td>
                <td><a href='edit.php?ID=$row[ID]'><button class='btn btn-primary'>Edit</button></a>
                    <a href='delete.php?ID=$row[ID]'><button class='btn btn-danger'>Delete</button></td></a>
            </tbody>";

        }
    }

?>

                
        </table>
    </div>
    <div class="container d-flex justify-content-end mt-5">    
        <a href="add.php"><button class="btn btn-success">Add Student</button></a>
    </div>
    <div class="container d-flex justify-content-end mt-5">    
        <a href="index.php"><button class="btn btn-danger">Go Back</button></a>
    </div>
</body>

</html>
