<div class="container-fluid"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh sách các phiếu xuất</h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">

                            <th>
                                ID_PX
                            </th>
                            <th>
                                ID_ĐH/ID_YC
                            </th>
                            <th>Loại</th>
                            <th>Ngày xuất</th>
                            <th>
                                Hành động
                            </th>
                        </thead>
                        <tbody>
                            <?php

                            $listPX = $data["listPX"];
                            while ($row = mysqli_fetch_array($listPX)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row[0] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[1] == 0 ? $row[2] : $row[1] ?>
                                    </td>

                                    <td>
                                        <?php if ($row[3] == 1) { ?>
                                            <span class="badge badge-primary">Theo yêu cầu sản xuất</span>
                                        <?php } elseif ($row[3] == 2) { ?>
                                            <span class="badge badge-warning">Theo đơn hàng</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php echo $row[4] ?>
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