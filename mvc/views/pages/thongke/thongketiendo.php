<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title ">Thống kê tiến độ</h4>

                </div>



                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Chọn trạng thái</label>
                                    <select class="form-control" name="" id="">
                                        <option>Đã hoàn thành</option>
                                        <option>Đang thực hiện</option>
                                        <option>Chờ xử lí</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button name="xemTK" class="btn btn-success">Submit</button>
                    </form>
                    <div class="card-header card-header-danger mt-2">
                        <h4 class="card-title ">Danh sách đơn hàng</h4>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">

                                <th>
                                    STT
                                </th>
                                <th>
                                    ID
                                </th>
                                <th>Tên khách hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>
                                    Ngày giao
                                </th>
                                <th>Trạng thái</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $listDH = $data["listDH"];
                                while ($value = mysqli_fetch_array($listDH)) {
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td>
                                            <?php echo $value[0]; ?>
                                        </td>
                                        <td>
                                            <?php echo $value[1]; ?>
                                        </td>
                                        <td>
                                            <?php echo $value[2]; ?>
                                        </td>
                                        <td>
                                            <?php echo $value[3]; ?>
                                        </td>
                                        <td>
                                            <?php echo $value[4]; ?>
                                        </td>
                                        <td>
                                            <?php if ($value[5] == 0) { ?>
                                                <span class="badge badge-warning">Chờ xử lí</span>
                                            <?php } elseif ($value[5] == 1) { ?>
                                                <span class="badge badge-primary">Đang thực hiện</span>
                                            <?php } elseif ($value[5] == 2) { ?>
                                                <span class="badge badge-success">Đã hoàn thành</span>
                                            <?php } ?>
                                        </td>

                                    </tr>
                                <?php
                                    $i = $i + 1;
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