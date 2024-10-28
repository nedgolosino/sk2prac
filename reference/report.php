<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"></link>
    <title>Document</title>
</head>
<body>

    <div class="container d-flex justify-content-end mt-5">
        <a href="index.php"><button class="btn btn-danger">Go Back</button></a>
    </div>
    <div class="container d-flex justify-content-center mt-5">
    
        <form action="" method="GET">
            <div class="form-group">
                <select name="campus" id="">Select Campus:
                    <option value="UC-Main">UC-Main</option>
                    <option value="UC-Banilad">UC-Banilad</option>
                    <option value="UC-LM">UC-LM</option>
                    <option value="UC-PT">UC-PT</option>
                </select>
            </div>
            </div>
            <div class="container d-flex justify-content-center mt-5">
                <button class="btn btn-primary" type="submit">Generate Report</button>
                
            </div>
            <div class="container d-flex justify-content-center mt-5">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID#</th>
                            <th>Name</th>
                            <th>Campus</th>
                            <th>Amount</th>
                            <th>Attended</th>
                        </tr>
                    </thead>
            

<?php
    include('dbcon.php');

    if(isset($_GET['campus'])){
        $campus = $_GET['campus'];

        $sql = "SELECT * FROM students WHERE campus = '$campus'";
        $sql = mysqli_query($conn, $sql);

        while($row = $sql->fetch_assoc()){
            echo "<tbody>
                    <tr>
                        <td>$row[ID]</td>
                        <td>$row[FName] $row[LName]</td>
                        <td>$row[campus]</td>
                        <td>$row[amount]</td>
                        <td>$row[attended]</td>
                    </tr>
                </tbody>";
        }
    }
?>


        </div>
        </table>
        </form>
        
    

</body>
</html>
