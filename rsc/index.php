<?php
include('header.php');
ob_start();

?>

    <div class="container">

        <div class="col mt-5 mb-3">
            <h4>Danh sách Người hiến máu</h4>
        </div>
        <div class="col-12 d-flex justify-content-end mt-4">
            <a href="add.php" class="">
                <button type="submit" name="submit" class="btn btn-danger ">
                    <h5>Thêm</h5x>
                </button>
            </a>
        </div>
        <div class="col mt-5">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã người hiến máu</th>
                        <th scope="col">Tên người hiến máu</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Năm sinh (Tuổi)</th>
                        <th scope="col">Nhóm máu</th>
                        <th scope="col">Ngày đăng kí hiến máu</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
                    //bước 1:kết nối tời csdl(mysql) 
                    //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
                    $sql = "SELECT bd_id, bd_name, bd_sex, bd_age, bd_bgroup, bd_reg_date, bd_phno FROM blood_donor   ";
                    $result = mysqli_query($conn, $sql);

                    //bước 3 xử lý kết quả trả về
                    if (mysqli_num_rows($result) > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?> </th>
                                <td><?php echo $row['bd_id']; ?> </td>
                                <td><?php echo $row['bd_name']; ?> </td>
                                <td><?php echo $row['bd_sex']; ?> </td>
                                <td><?php echo $row['bd_age']; ?> </td>
                                <td><?php echo $row['bd_bgroup']; ?> </td>
                                <td><?php echo $row['bd_reg_date']; ?> </td>
                                <td><?php echo $row['bd_phno']; ?> </td>
                                <td><a href="edit.php?bd_id=<?php echo $row['bd_id']; ?>"><i class="fas fa-edit text-danger"></i></a></td>
                                <td><a href="delete.php?bd_id=<?php echo $row['bd_id']; ?>"><i class="fas fa-trash text-danger"></i></a></td>
                            </tr>
                    <?php
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col">
                <h3>Hiến máu tình nguyện 2021</h3>
            </div>
            <div class="col text-end"><i class="fab fa-facebook-square"></i><i class="fab fa-youtube"></i></div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>