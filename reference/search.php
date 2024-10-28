<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"></link>
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <div class="container d-flex justify-content-start mt-5">

            <div class="form-group">
                <label for="ID">Enter ID to Search:</label>
                <input type="text" name="ID">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>

        <div class="container d-flex justify-content-center mt-5">
            <table class="table table-striped">
                <thead>
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

    if(isset($_GET['ID'])){
        $ID = $_GET['ID'];

        $sql = "SELECT * FROM students WHERE ID = '$ID' and attended = 'No'";
        $sql = mysqli_query($conn, $sql);

        if($sql-> num_rows>0){
        $row = mysqli_fetch_assoc($sql);


        echo "  <tbody>
                    <tr>
                        <td>$row[ID]</td>
                        <td>$row[campus]</td>
                        <td>$row[FName] $row[LName]</td>
                        <td>$row[amount]</td>
                        <td><a href='attend.php?ID=$row[ID]'>Attend</a></td>
                    </tr>
                </tbody>";
        }else{
            echo "<script>
                window.alert('Record Already Attended');
                window.location.href='search.php';
            </script>";
        }
    
    }else{
        
        /*try{
        $sql = "SELECT * FROM students WHERE attended = 'No'";
        $sql = mysqli_query($conn, $sql);

        
        $row = mysqli_fetch_assoc($sql);

        echo "  <tbody>
                    <tr>
                        <td>$row[ID]</td>
                        <td>$row[campus]</td>
                        <td>$row[FName] $row[LName]</td>
                        <td>$row[amount]</td>
                        <td><a href='attend.php?ID=$row[ID]'>Attend</a></td>
                    </tr>
                </tbody>";
        }catch(mysqli_sql_exception){
            echo "No Data Found";
        }*/
    
    }
?>


    
</table>
        </div>
    </form>
    <div class="container d-flex justify-content-end mt-5">
        <a href="index.php"><button class="btn btn-danger">Go Back</button></a>
    </div>
</body>
</html>