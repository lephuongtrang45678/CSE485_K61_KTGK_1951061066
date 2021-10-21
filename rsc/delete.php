<?php 


    //Include constants.php file here
    include('constants.php');

    // 1. 
    $bd_id = $_GET['bd_id'];

    //2. Create SQL Query to Delete 
    
    $sql = "DELETE FROM blood_donor WHERE  bd_id='$bd_id'";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
       $_SESSION['delete'] = "<div class='danger'>xoa thanh cong.</div>";
        header("location: index.php");
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>xoa that bai.</div>";
        header("location: error.php");
    }
?>
