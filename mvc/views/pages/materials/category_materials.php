<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row mb-5">
                    <div class="col-md-4"><a href="QuanLiKho/GetAllPhieuNhap" class="btn btn-success">Danh sách phiếu nhập</a></div>
                    <div class="col-md-4"><a href="QuanLiKho/GetAllPhieuXuat" class="btn btn-success">Danh sách phiếu xuất</a></div>
                </div>
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Danh mục nguyên vật liệu</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    ID_VT
                                </th>
                                <th>
                                    Tên VT
                                </th>
                                <th>Loại VT</th>
                                <th>
                                    Đơn vị tính
                                </th>
                                <th>
                                    Số lượng tồn
                                </th>
                                <th>Tồn lí thuyết</th>
                                <th>Tồn thực tế</th>
                                <th>
                                    Hành động
                                </th>
                            </thead>
                            <tbody>
                                <?php

                                $listMaterials = $data["listMaterials"];
                                while ($row = mysqli_fetch_array($listMaterials)) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $row[0] ?>
                                        </td>
                                        <td>
                                            <?php echo $row[1] ?>
                                        </td>

                                        <td>
                                            <?php if ($row[2] == 0) { ?>
                                                <span>Vật tư</span>
                                            <?php } elseif ($row[2] == 1) { ?>
                                                <span>Bán thành phẩm</span>
                                            <?php } elseif ($row[2] == 2) { ?>
                                                <span>Thành phẩm</span>
                                            <?php } ?>
                                        </td>
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
                                            <?php echo $row[6] ?>
                                        </td>

                                        <td>
                                            <div>
                                                <span class="fa fa-edit btn btn-success"></span>
                                                <span class="fa fa-remove btn btn-danger"></span>
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