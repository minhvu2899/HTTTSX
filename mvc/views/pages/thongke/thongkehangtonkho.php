<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title ">Thống kê hàng tồn kho</h4>

                </div>



                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top:43px">
                                    <label for="">Ngày nhập</label>
                                    <input type="date" class="form-control" name="ngaybd" id="" aria-describedby="helpId" placeholder="">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top:43px">
                                    <label for="">Ngày nhập</label>
                                    <input type="date" class="form-control" name="ngaykt" id="" aria-describedby="helpId" placeholder="">

                                </div>
                            </div>
                        </div>

                        <button name="xemTK" class="btn btn-success">Submit</button>
                    </form>
                    <div class="card-header card-header-danger mt-2">
                        <h4 class="card-title ">Danh sách hàng tồn kho</h4>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">

                                <th>
                                    ID
                                </th>
                                <th>
                                    Tên vật tư
                                </th>
                                <th>Đơn vị</th>
                                <th>Số lượng nhập</th>
                                <th>Số lượng xuất</th>
                                <th>
                                    Số lượng tồn
                                </th>
                            </thead>
                            <tbody>
                                <?php

                                $listKho = $data["listKho"];
                                foreach ($listKho as $value) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $value['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['name_material']; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['donvi']; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['Soluongnhap']; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['Soluongxuat']; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['tonkho']; ?>
                                        </td>
                                        <td>
                                            <div>
                                                <a class="btn btn-light" href="QuanLiKho/chiTietHĐX/<?php echo $row[0] ?>"><i class="fas fa-eye"></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div>
        <a href="Admin/QuanLiKho" class="btn btn-success">Quay lại</a>
    </div>
</div>