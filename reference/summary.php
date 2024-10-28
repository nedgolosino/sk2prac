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
        <h3>Summary Report</h3>
        <h4>(All Campuses)</h1>
    </div>
    <div class="container d-flex justify-content-center mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Campus</th>
                    <th>Registered</th>
                    <th>Attended</th>
                    <th>Total Collection</th>
                </tr>
            </thead> 
            <tbody>


<?php
    include('dbcon.php');

    //main
    $countMain = "SELECT COUNT(campus) as registered FROM students WHERE campus = 'UC-Main'";
    $countMain = mysqli_query($conn, $countMain);
    $rowCountMain = $countMain -> fetch_assoc();

    $attendMain = "SELECT COUNT(attended) as count FROM students WHERE campus = 'UC-Main' and attended = 'Yes'";
    $attendMain = mysqli_query($conn, $attendMain);
    $rowAttendMain = $attendMain -> fetch_assoc();

    $sumMain = "SELECT SUM(amount) as sum FROM students WHERE campus = 'UC-Main'";
    $sumMain = mysqli_query($conn, $sumMain);
    $rowSumMain = $sumMain -> fetch_assoc();

    echo "<tr><td>Main</td>";
    echo "      
            <td>$rowCountMain[registered]</td>
            <td>$rowAttendMain[count]</td>
            <td>$rowSumMain[sum]</td>
        </tr>
    ";


    //banilad
    $countMain = "SELECT COUNT(campus) as registered FROM students WHERE campus = 'UC-Banilad'";
    $countMain = mysqli_query($conn, $countMain);
    $rowCountMain = $countMain -> fetch_assoc();

    $attendMain = "SELECT COUNT(attended) as count FROM students WHERE campus = 'UC-Banilad' and attended = 'Yes'";
    $attendMain = mysqli_query($conn, $attendMain);
    $rowAttendMain = $attendMain -> fetch_assoc();

    $sumMain = "SELECT SUM(amount) as sum FROM students WHERE campus = 'UC-Banilad'";
    $sumMain = mysqli_query($conn, $sumMain);
    $rowSumMain = $sumMain -> fetch_assoc();

    echo "<tr><td>Banilad</td>";
    echo "      
            <td>$rowCountMain[registered]</td>
            <td>$rowAttendMain[count]</td>
            <td>$rowSumMain[sum]</td>
        </tr>
    ";

    //LM
    $countMain = "SELECT COUNT(campus) as registered FROM students WHERE campus = 'UC-LM'";
    $countMain = mysqli_query($conn, $countMain);
    $rowCountMain = $countMain -> fetch_assoc();

    $attendMain = "SELECT COUNT(attended) as count FROM students WHERE campus = 'UC-LM' and attended = 'Yes'";
    $attendMain = mysqli_query($conn, $attendMain);
    $rowAttendMain = $attendMain -> fetch_assoc();

    $sumMain = "SELECT SUM(amount) as sum FROM students WHERE campus = 'UC-LM'";
    $sumMain = mysqli_query($conn, $sumMain);
    $rowSumMain = $sumMain -> fetch_assoc();

    echo "<tr><td>Lapu-Lapu and Mandaue</td>";
    echo "      
            <td>$rowCountMain[registered]</td>
            <td>$rowAttendMain[count]</td>
            <td>$rowSumMain[sum]</td>
        </tr>
    ";
    

    //PT
    $countMain = "SELECT COUNT(campus) as registered FROM students WHERE campus = 'UC-PT'";
    $countMain = mysqli_query($conn, $countMain);
    $rowCountMain = $countMain -> fetch_assoc();

    $attendMain = "SELECT COUNT(attended) as count FROM students WHERE campus = 'UC-PT' and attended = 'Yes'";
    $attendMain = mysqli_query($conn, $attendMain);
    $rowAttendMain = $attendMain -> fetch_assoc();

    $sumMain = "SELECT SUM(amount) as sum FROM students WHERE campus = 'UC-PT'";
    $sumMain = mysqli_query($conn, $sumMain);
    $rowSumMain = $sumMain -> fetch_assoc();

    echo "<tr><td>Pardo-Talisay</td>";
    echo "      
            <td>$rowCountMain[registered]</td>
            <td>$rowAttendMain[count]</td>
            <td>$rowSumMain[sum]</td>
        </tr>
    ";
?>


</tbody>
        </table>
    </div>
    <div class="container d-flex justify-content-end mt-5">
        <p>Date Generated: <?php echo date('Y-m-d');?></p>
    </div>
</body>
</html>
