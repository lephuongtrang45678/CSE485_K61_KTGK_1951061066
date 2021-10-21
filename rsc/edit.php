<?php
include("header.php");
?>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col d-flex"><a href="index.php"><i class="fas fa-chevron-left "></i></a>
            <h4 class="ms-2">Trở lại thông tin danh bạ</h4>
        </div>
        <div class="col text-end"><a href="./index.php"><button class="btn btn-outline-danger" type="submit">Hủy</button></a></div>
    </div>
    <?php

    if (isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
    {
        echo $_SESSION['add']; //Display the SEssion Message if SEt
        unset($_SESSION['add']); //Remove Session Message
    }

    if (isset($_GET['bd_id'])) {
        $bd_id = $_GET['bd_id'];
    }

    $sql_2 = " SELECT * FROM blood_donor WHERE bd_id = '$bd_id'";
    $res_2 = mysqli_query($conn, $sql_2);

    $row_2 = mysqli_fetch_assoc($res_2);
    ?>

    <div class="row mt-4 ">
        <form class="d-flex w-25 text-end">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-danger" type="submit">Search</button>
        </form>
    </div>
    <div class="row">
        <div class="col border p-3 rounded-2 mt-3">
            <form method="POST" class="row g-3 ">
                <div class="col-md-4">
                    <label for="bd_id" class="form-label">Mã người hiến máu</label>
                    <input type="text" name="bd_id" class="form-control" id="bd_id" value="<?php echo $row_2['bd_id']; ?>">
                </div>
                <div class="col-md-4">
                    <label for="bd_name" class="form-label">Tên người hiến máu</label>
                    <input type="" name="bd_name" class="form-control" id="bd_name" value="<?php echo $row_2['bd_name']; ?>">
                </div>
                <div class="col-md-4">
                    <label for="bd_sex" class="form-label">Giới tính</label>
                    <input type="" name="bd_sex" class="form-control" id="bd_sex" value="<?php echo $row_2['bd_sex']; ?>">
                </div>
                <div class="col-md-4">
                    <label for="bd_age" class="form-label">Năm sinh (Tuổi)</label>
                    <input type="tel" name="bd_age" class="form-control" id="bd_age" value="<?php echo $row_2['bd_age']; ?>">
                </div>
                <div class="col-md-4">
                    <label for="bd_bgroup" class="form-label">Nhóm máu</label>
                    <input type="text" name="bd_bgroup" class="form-control" id="bd_bgroup" value="<?php echo $row_2['bd_bgroup']; ?>">
                </div>
                <div class="col-md-4">
                    <label for="bd_reg_date" class="form-label">Ngày đăng kí hiến máu</label>
                    <input type="text" name="bd_reg_date" class="form-control" id="bd_reg_date" value="<?php echo $row_2['bd_reg_date']; ?>">
                </div>
                <div class="col-md-4">
                    <label for="bd_phno" class="form-label">Số điện thoại</label>
                    <input type="text" name="bd_phno" class="form-control" id="bd_phno" value="<?php echo $row_2['bd_phno']; ?>">
                </div>
                <div class="col-12 d-flex justify-content-center mt-3">
                    <button type="submit" name="submit" class="btn btn-outline-danger ">
                        <h5>Sửa</h5x>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {


        //echo "CLicked";

        //1. Get the DAta from Form
        $bd_id = $_POST['bd_id'];
        $bd_name = $_POST['bd_name'];
        $bd_sex = $_POST['bd_sex'];
        $bd_age = $_POST['bd_age'];
        $bd_bgroup = $_POST['bd_bgroup'];
        $bd_reg_date = $_POST['bd_reg_date'];
        $bd_phno = $_POST['bd_phno'];


        // update
        include('constants.php');
        $sql = "SELECT * FROM blood_donor WHERE bd_id= $bd_id ";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $sql2 = "UPDATE blood_donor set  bd_name='$bd_name', bd_sex='$bd_sex', bd_age='$bd_age', bd_bgroup='$bd_bgroup', bd_reg_date = '$bd_reg_date', bd_phno = '$bd_phno'  where bd_id = '$bd_id'";
                $res2 = mysqli_query($conn, $sql2);
                if ($res2 == true) {
                    //Display Succes Message
                    //REdirect to Manage Admin Page with Success Message
                    $_SESSION['edit'] = "<div class='success'> Changed Successfully. </div>";
                    //Redirect the User
                    header('location:index.php');
                } else {
                    //Display Error Message
                    //REdirect to Manage Admin Page with Error Message
                    $_SESSION['edit'] = "<div class='error'>Failed to Change . </div>";
                    //Redirect the User
                    header('location:error.php');
                }
            }
        }
    }

    ?>
