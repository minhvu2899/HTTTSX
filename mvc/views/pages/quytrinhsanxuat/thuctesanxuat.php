<div class="container-fluid">
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên vật tư</label>
                    <input type="text" class="form-control" name="id_vt" id="" aria-describedby="helpId" placeholder="">

                </div>
                <div class="form-group">
                    <label for="">Số lượng hoàn thành</label>
                    <input type="text" class="form-control" name="soluonght" id="" aria-describedby="helpId" placeholder="">

                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="">Ngày nhập</label>
                    <input type="date" class="form-control" name="ngaybt" id="" aria-describedby="helpId" placeholder="">

                </div>
                <div class="form-group ">
                    <label for="">Ngày nhập</label>
                    <input type="date" class="form-control" name="ngaykt" id="" aria-describedby="helpId" placeholder="">

                </div>
            </div>
        </div>
        <button type="submit" name="addTTSX">Submit</button>
    </form>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title ">Thực tế sản xuât</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">

                                <th>
                                    ID_TTSX
                                </th>
                                <th>ID_LSX</th>
                                <th>ID vật tư</th>
                                <th>Số lượng nhập </th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>
                                    Hành động
                                </th>
                            </thead>
                            <tbody>
                                <?php

                                $listTTSX = $data["listTTSX"];
                                while ($row = mysqli_fetch_array($listTTSX)) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $row[0] ?>
                                        </td>

                                        <td>
                                            <?php echo $row[1] ?>
                                        </td>

                                        <td>
                                            <?php echo $row[4] ?>
                                        </td>
                                        <td>
                                            <?php echo $row[2] ?>
                                        </td>

                                        <td>
                                            <?php echo $row[3] ?>
                                        </td>



                                        <td>
                                            <div>
                                                <a href="QuanLiSX/ThucTeSanXuat/<?php echo $row[0] ?>"> <span class="fa fa-edit btn btn-success"></span></a>
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
        <button onclick="quay_lai_trang_truoc()" class=" btn btn-success">Quay lại</button>
    </div>
    <script>
        function quay_lai_trang_truoc() {
            history.back();
        }
    </script>
</div>