<div class="container-fluid"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Chi tiết hóa đơn nhập</h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">

                            <th>
                                ID_PN
                            </th>
                            <th>IDVT</th>
                            <th>Tên vật tư</th>
                            <th>Số lượng nhập </th>
                            <th>
                                Hành động
                            </th>
                        </thead>
                        <tbody>
                            <?php

                            $listHĐN = $data["listHĐN"];
                            while ($row = mysqli_fetch_array($listHĐN)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row[1] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[2] ?>
                                    </td>

                                    <td>
                                        <?php echo $row[3] ?>
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