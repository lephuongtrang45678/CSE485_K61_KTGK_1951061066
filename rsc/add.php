<?php
include("header.php");
ob_start();

?>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col d-flex"><a href="index.php"><i class="fas fa-chevron-left "></i></a>
            <h4 class="ms-2">Trở lại thông tin danh sách người hiến máu</h4>
        </div>
        <div class="col text-end"><a href="./index.php"><button class="btn btn-outline-danger" type="submit">Hủy</button></a></div>
    </div>
    <?php

    if (isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
    {
        echo $_SESSION['add']; //Display the SEssion Message if SEt
        unset($_SESSION['add']); //Remove Session Message
    }


    ?>
    <div class="row">
        <div class="col border p-3 rounded-2 mt-3">
            <form method="POST" class="row g-3 " enctype="multipart/form-data">
                <div class="col-md-4">
                    <label for="bd_id" class="form-label">Mã người hiến máu</label>
                    <input type="" name="bd_id" class="form-control" id="bd_id" placeholder="1">
                </div>
                <div class="col-md-4">
                    <label for="bd_name" class="form-label">Tên người hiến máu</label>
                    <input type="" name="bd_name" class="form-control" id="bd_name" placeholder="Kiều Tuấn Dũng">
                </div>
                <div class="col-md-4">
                    <label for="bd_sex" class="form-label">Giới tính</label>
                    <input type="" name="bd_sex" class="form-control" id="bd_sex" placeholder="Nam">
                </div>
                <div class="col-md-4">
                    <label for="bd_age" class="form-label">Năm sinh (Tuổi)</label>
                    <input type="tel" name="bd_age" class="form-control" id="bd_age" placeholder="06/06/1999">
                </div>
                <div class="col-md-4">
                    <label for="bd_bgroup" class="form-label">Nhóm máu</label>
                    <input type="bd_bgroup" name="bd_bgroup" class="form-control" id="bd_bgroup" placeholder="AB">
                </div>
                <div class="col-md-4">
                    <label for="bd_reg_date" class="form-label">Ngày đăng kí hiến máu</label>
                    <input type="bd_reg_date" name="bd_reg_date" class="form-control" id="bd_reg_date" placeholder="06/06/2021">
                </div>
                <div class="col-md-4">
                    <label for="bd_phno" class="form-label">Số điện thoại</label>
                    <input type="bd_phno" name="bd_phno" class="form-control" id="bd_phno" placeholder="0394759">
                </div>

                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-outline-danger ">
                        <h5>Thêm</h5x>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php




//Process the Value from Form and Save it in Database

//Check whether the submit button is clicked or not

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
    require('constants.php');
    //2. SQL Query to Save the data into database
    // $sql = "SELECT bd_id, bd_name, bd_sex, bd_age, bd_bgroup, bd_reg_date, bd_phno FROM blood_donor   ";

    $sql = "INSERT INTO blood_donor(bd_id, bd_name, bd_sex, bd_age, bd_bgroup, bd_reg_date, bd_phno) 
        VALUES (NULL,'$bd_name','$bd_sex','$bd_age','$bd_bgroup','$bd_reg_date','$bd_phno')";
    //3. Executing Query and Saving Data into Datbase
    $res = mysqli_query($conn, $sql);

    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res == TRUE) {
        //Data Inserted

        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='danger'>thêm thành công</div>";
        header("location: index.php");
    } else {

        $_SESSION['add'] = "<div class='error'>không hợp lệ</div>";
        //Redirect Page to Add Admin
        header("location:error.php");
    }
}

?>