<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-4"><a href="Material" class="btn btn-success">Quản lí vật tư</a></div>
        <div class="col-md-4"><a href="QuanLiKho/NhapKho" class="btn btn-success">Nhập kho</a></div>
        <div class="col-md-4"><a href="QuanLiKho/XuatKho" class="btn btn-success">Xuất kho</a></div>
        <div class="col-md-4"><a href="QuanLiKho/TonKho" class="btn btn-success">Tồn kho</a></div>
        <div class="col-md-4"><a href="QuanLiKho/GetAllPhieuNhap" class="btn btn-success">Danh sách phiếu nhập</a></div>
        <div class="col-md-4"><a href="QuanLiKho/GetAllPhieuXuat" class="btn btn-success">Danh sách phiếu xuất</a></div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Danh sách kho hàng</h4>
                    <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary text-center">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Tên kho hàng
                                </th>
                                <th>
                                    Địa chỉ
                                </th>
                                <th>
                                    Nhân viên quản lí
                                </th>
                                <th>Trạng thái</th>


                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                <?php

                                $listKho = $data["listKho"];
                                while ($row = mysqli_fetch_array($listKho)) {
                                ?>
                                    <tr class="text-center">
                                        <td>
                                            <?php echo $row[0] ?>
                                        </td>
                                        <td>
                                            <strong><?php echo $row[1] ?></strong>
                                        </td>
                                        <td>
                                            <?php echo $row[2] ?>
                                        </td>

                                        <td>
                                            <?php echo $row[3] ?>
                                        </td>
                                        <td>
                                            <?php if ($row[4] == 1) { ?>
                                                <span class="badge badge-success">Đang hoạt động</span>
                                            <?php } elseif ($row[4] == 0) { ?>
                                                <span class="badge badge-danger">Ngừng hoạt động</span>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <div>
                                                <a href="" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
                                                <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
</div>