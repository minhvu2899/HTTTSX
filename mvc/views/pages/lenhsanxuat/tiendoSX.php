<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Theo dõi tiến độ sản xuất</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    ID_Lenh
                                </th>


                                <th>Tên vật tư</th>

                                <th>Đã hoàn thành</th>




                            </thead>
                            <tbody>
                                <?php

                                $listTienDo = $data["listTienDo"];
                                while ($row = mysqli_fetch_array($listTienDo)) {
                                ?>
                                    <tr>
                                        <td>

                                            <?php echo $row[1] ?>
                                        </td>


                                        <td>
                                            <?php echo $row['name_material'] ?>
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo $row[4] . "%" ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $row[4] . "%" ?></div>
                                            </div>

                                        </td>
                                        <td>
                                            <a href="LenhSanXuat/ChiTietTienDo/<?php echo $row[0] ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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