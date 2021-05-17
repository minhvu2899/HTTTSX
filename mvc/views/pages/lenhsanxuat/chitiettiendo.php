<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Chi tiết tiến độ sản xuất</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary text-center">
                                <th>
                                    ID
                                </th>
                                <th>Từ ngày</th>
                                <th>Đến ngày</th>
                                <th>Số lượng hoàn thành</th>



                            </thead>
                            <tbody>
                                <?php

                                $listTienDo = $data["listTienDo"];
                                while ($row = mysqli_fetch_array($listTienDo)) {
                                ?>
                                    <tr class="text-center">
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
        <a href="LenhSanXuat" class="btn btn-success">Quay lại</a>
    </div>
</div>