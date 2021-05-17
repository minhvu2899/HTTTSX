<div class="container-fluid"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh sách các phiếu nhập</h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                ID_PN
                            </th>
                            <th>
                                Ngày nhập
                            </th>
                            <th>Nhân viên nhập</th>

                            <th>
                                Hành động
                            </th>
                        </thead>
                        <tbody>
                            <?php

                            $listPN = $data["listPN"];
                            while ($row = mysqli_fetch_array($listPN)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row[0] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[2] ?>
                                    </td>

                                    <td>
                                        <?php echo $row[1] ?>
                                    </td>
                                    <td>
                                        <div>
                                            <a class="btn btn-light" href="QuanLiKho/chiTietHĐN/<?php echo $row[0] ?>"><i class="fas fa-eye"></i></a>

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