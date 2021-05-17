<div class="container-fluid">
    <form action="DinhMuc/addDinhMuc" method="POST">
        <div class="row d-flex align-items-center">
            <div class="card card-header card-header-primary">
                <h4 class="card-title ">Thêm định mức nguyên vật liệu</h4>

            </div>

            <div class="col-3 ">

                <div class="form-group">
                    <lable for="sp" class="font-weight-bold">Chọn đầu ra</lable>
                    <select class="form-control" name="sp" id="sp">
                        <?php
                        $listOutPut = $data["listOutPut"];
                        while ($row = mysqli_fetch_array($listOutPut)) {
                        ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                        <?php
                        }

                        ?>
                    </select>
                </div>

            </div>
            <div class="col-3">
                <div class="form-group">
                    <lable for="sp" class="font-weight-bold">Chọn đầu vào</lable>
                    <select class="form-control" name="vt" id="sp">
                        <?php
                        $listMaterials = $data['listMaterials'];

                        while ($row = mysqli_fetch_array($listMaterials)) {
                        ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                        <?php
                        }

                        ?>



                    </select>
                </div>

            </div>

            <div class="col-3">
                <div class="form-group">
                    <lable for="sp" class="font-weight-bold">Công đoạn</lable>
                    <select class="form-control" name="cd" id="cd">
                        <?php
                        $listCD = $data['listCD'];

                        while ($row = mysqli_fetch_array($listCD)) {
                        ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                        <?php
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <lable for="sp" class="font-weight-bold">Số lượng cần</lable>
                    <input type="text" class="p-1" name="quantity">
                </div>
            </div>

        </div>
        <button type="submit" name="addDinhMuc">Submit</button>
    </form>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Định mức nguyên vật liệu</h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Tên đầu ra
                            </th>
                            <th>
                                ID_VT
                            </th>
                            <th>
                                Tên vật tư
                            </th>
                            <th>
                                Đơn vị
                            </th>
                            <th>
                                Số lượng
                            </th>
                            <th>
                                Hành động
                            </th>
                        </thead>
                        <tbody>
                            <?php

                            $listMaterials = $data["listBOM"];
                            while ($row = mysqli_fetch_array($listMaterials)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row[2] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[1] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[3] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[8] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[9] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[6] ?>
                                    </td>

                                    <td>
                                        <div>
                                            <a href="DinhMuc/Edit/<?php echo $row[2] ?>" class="fa fa-edit btn btn-success"></a>
                                            <a onclick="return confirm('Bạn có muốn xóa không')" href="DinhMuc/Xoa/<?php echo $row[2] ?>" class="fa fa-remove btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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