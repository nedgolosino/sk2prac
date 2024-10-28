<?php
    include('dbcon.php');


    if(isset($_GET['ID'])){

        $ID = $_GET['ID'];

        $del = "DELETE FROM students WHERE ID = $ID";
        $del = mysqli_query($conn, $del);

        if($del){
            echo"   <script>
                    window.alert('Deleted Sucessfully');
                    window.location.href='student.php';
                    </script>";
        }
    }
?>