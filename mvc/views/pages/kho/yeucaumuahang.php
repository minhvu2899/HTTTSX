<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Yêu cầu mua hàng</h4>
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

                                if (isset($_SESSION['info_ycmh'])) {
                                ?>
                                    <tr class="text-center">
                                        <td>
                                            <?php echo $_SESSION['info_ycmh'][0] ?>
                                        </td>
                                        <td>
                                            <strong><?php echo $_SESSION['info_ycmh'][1] ?></strong>
                                        </td>
                                        <td>
                                            <?php echo $_SESSION['info_ycmh'][2] ?>
                                        </td>

                                        <!-- <td>
                                            <?php echo $row[3] ?>
                                        </td>
                                        <td>
                                            <?php if ($row[4] == 1) { ?>
                                                <span class="badge badge-success">Đang hoạt động</span>
                                            <?php } elseif ($row[4] == 0) { ?>
                                                <span class="badge badge-danger">Ngừng hoạt động</span>
                                            <?php } ?>
                                        </td> -->

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