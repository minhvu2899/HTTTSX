<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <a href="Admin/AddDonHang" class="btn btn-success"><i class="fas fa-plus-square">Tạo đơn hàng</i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Đơn hàng</h4>
                    <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary text-center">
                                <th>
                                    ID_CTDH
                                </th>
                                <th>
                                    Tên sản phẩm
                                </th>
                                <th>Đơn vị</th>
                                <th>Số lượng</th>


                            </thead>
                            <tbody>
                                <?php

                                $listDH = $data["listDH"];
                                while ($row = mysqli_fetch_array($listDH)) {
                                ?>
                                    <tr class="text-center">
                                        <td>
                                            <?php echo $row[0] ?>
                                        </td>
                                        <td>
                                            <strong><?php echo $row['name_material'] ?></strong>
                                        </td>
                                        <td>
                                            <?php echo $row['donvi'] ?>
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