<div class="container-fluid"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Chi tiết hóa đơn xuất</h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>
                                ID_PX
                            </th>
                            <th>IDVT</th>
                            <th>Tên vật tư</th>
                            <th>Số lượng </th>

                        </thead>
                        <tbody>
                            <?php

                            $listHĐX = $data["listHĐX"];
                            while ($row = mysqli_fetch_array($listHĐX)) {
                            ?>
                                <tr>

                                    <td>
                                        <?php echo $row[0] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[1] ?>
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