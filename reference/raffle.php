<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"></link>
    <title>Document</title>
</head>
<body>
    <form action="" method="GET">
        <div class="container d-flex justify-content-center mt-5">
            <div class="form-group">
                <label for="">Select Filters Here:</label>
                <select name="campus" id="campus">
                    <option value="UC-Main" value="<?php if($campus == 'UC-Main') echo 'selected'?>">UC-Main</option>
                    <option value="UC-Banilad" value="<?php if($campus == 'UC-Banilad') echo 'selected'?>">UC-Banilad</option>
                    <option value="UC-LM" value="<?php if($campus == 'UC-LM') echo 'selected'?>">UC-LM</option>
                    <option value="UC-PT" value="<?php if($campus == 'UC-PT') echo 'selected'?>">UC-PT</option>
                </select>
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            <button class="btn btn-primay" type="submit"><h3>Reveal The Lucky Winner!</h3></button>
        </div>
    </form>
    <div class="container d-flex justify-content-center mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>ID#</th>
                    <th>Name</th>
                    <th>Campus</th>
                </tr>
            </thead>

<?php
    include('dbcon.php');

    if(isset($_GET['campus'])){

        $campus = $_GET['campus'];

        $sql = "SELECT * FROM students WHERE campus = '$campus' ORDER BY rand() LIMIT 1";
        $sql = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($sql)){

            echo "<tbody>
                    <tr>
                        <td>$row[ID]</td>
                        <td>$row[FName] $row[LName]</td>
                        <td>$row[campus]</td>
                    </tr>
                </tbody>";
        }
    }
?>

            
</table>
    </div>
    <div class="container d-flex justify-content-end mt-5">    
        <a href="index.php"><button class="btn btn-danger">Go Back</button></a>
    </div>
</body>
</html>
