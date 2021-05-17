<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <a href="YeuCauSanXuat/AddYeuCau" class="btn btn-success"><i class="fas fa-plus-square">Tạo yêu cầu</i></a>
        </div>
    </div>
    <!-- <form action="YeuCauSanXuat/addYeuCau" method="POST">
        <div class="row d-flex align-items-center"> -->
    <!-- <div class="card card-header card-header-primary">
                <h4 class="card-title ">Tạo yêu sản xuất</h4>

            </div>

            <div class="col-3 ">

                <div class="form-group">
                    <lable for="sp" class="font-weight-bold">Chọn sản phẩm</lable>
                    <select class="form-control" name="sp" id="sp">
                        <option value="">Chọn sản phẩm</option>
                        <?php
                        $listMaterials = $data["listMaterials"];
                        while ($row = mysqli_fetch_array($listMaterials)) {
                        ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                        <?php
                        }

                        ?>
                    </select>
                </div>

            </div>

            <div class="col-3">
                <input type="date" name="ngayyc" id="">
                <input type="date" name="ngayht" id="">

            </div>
            <div class="col-3 ">

                <div class="form-group">
                    <lable for="sp" class="font-weight-bold">Trạng thái</lable>
                    <select class="form-control" name="status" id="sp">

                        <option value="0">Kế hoạch</option>
                        <option value="1">Đang thực hiện</option>

                    </select>
                </div>

            </div>
            <div class="col-3">
                <div class="form-group">
                    <lable for="sp" class="font-weight-bold">Số lượng cần</lable>
                    <input type="text" class="p-1" name="quantity">
                </div>
            </div>
        </div>
        <button type="submit" name="addYeuCau">Submit</button>
    </form>
</div> -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Danh sách yêu cầu sản xuất</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Tên SP
                                </th>
                                <th>
                                    Ngày yêu cầu
                                </th>
                                <th>
                                    Ngày hoàn thành
                                </th>
                                <th>
                                    Số lượng
                                </th>
                                <th>
                                    Trạng thái
                                </th>
                                <th>
                                    Tạo kế hoạch vật tự
                                </th>
                                <th>
                                    Tạo lệnh sản xuất
                                </th>
                            </thead>
                            <tbody>
                                <?php

                                $listYeuCau = $data["listYeuCau"];
                                while ($row = mysqli_fetch_array($listYeuCau)) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $row[0] ?>
                                        </td>
                                        <td>
                                            <?php echo $row[2] ?>
                                        </td>
                                        <td>
                                            <?php echo $row[3] ?>
                                        </td>
                                        <td>
                                            <?php echo $row[4] ?>
                                        </td>
                                        <td>
                                            <?php echo $row[5] ?>
                                        </td>
                                        <td>
                                            <?php if ($row[6] == 0) { ?>
                                                <h2 class="badge badge-warning">Kế hoạch</h2>
                                            <?php } elseif ($row[6] == 1) { ?>
                                                <span class="badge badge-primary">Đang thực hiện</span>
                                            <?php } elseif ($row[6] == 2) { ?>
                                                <span class="badge badge-danger">Hủy bỏ</span>
                                            <?php } elseif ($row[6] == 3) { ?>
                                                <span class="badge badge-success">Hoàn thành</span>
                                            <?php } ?>
                                        </td>
                                        <th>
                                            <a onclick="handle(this.id)" id="khvt<?php echo $row[0] ?>" href="KeHoachVatTu/addKHVT/<?php echo $row[0] ?>/<?php echo $row[1] ?>/<?php echo $row[5] ?>" class="btn"><i class="fas fa-bolt"></i></a>

                                        </th>
                                        <td>
                                            <a href=" LenhSanXuat/addLenhSX/<?php echo $row[0] ?>" class="btn"><i class="fas fa-bolt"></i></a>
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
<script>
    var handle = (id) => {
        console.log(id);
    }
</script>