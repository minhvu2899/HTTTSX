<div class="container-fluid">
    <!-- <form action="LenhSanXuat/addYeuCau" method="POST">
        <div class="row d-flex align-items-center">
            <div class="card card-header card-header-primary">
                <h4 class="card-title ">Tạo lệnh sản xuất</h4>

            </div>

            <div class="col-3 ">

                <div class="form-group">
                    <lable for="sp" class="font-weight-bold">Chọn yêu cầu</lable>
                    <select class="form-control" name="sp" id="sp">
                        <option value="">Chọn sản phẩm</option>



                    </select>
                </div>

            </div>

            <div class="col-3">
                <input type="date" name="ngayyc" id="">
                <input type="date" name="ngayht" id="">

            </div>
            <div class="col-3 ">

                <div class="form-group">
                    <lable for="sp" class="font-weight-bold">Trạng thái</lable>
                    <select class="form-control" name="status" id="sp">

                        <option value="0">Kế hoạch</option>
                        <option value="1">Đang thực hiện</option>

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
        <button type="submit" name="addYeuCau">Submit</button>
    </form> -->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh sách lệnh sản xuất</h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>ID_Lenh</th>
                            <th>
                                ID_YCSX
                            </th>

                            <th>
                                Ngày tạo
                            </th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </thead>
                        <tbody>
                            <?php

                            $listLenhSX = $data["listLenhSX"];
                            while ($row = mysqli_fetch_array($listLenhSX)) {
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
                                    <td id="status<?php echo $row[0] ?>">
                                        <?php if ($row[3] == 0) { ?>
                                            <span class="badge badge-warning">Kế hoạch</span>
                                        <?php } elseif ($row[3] == 1) { ?>
                                            <span class="badge badge-primary">Đang thực hiện</span>
                                        <?php } elseif ($row[3] == 2) { ?>
                                            <span class="badge badge-success">Đã hoàn thành</span>
                                        <?php } elseif ($row[3] == 3) { ?>
                                            <span class="badge badge-success">Kết thúc lệnh</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div id="action<?php echo $row[0] ?>">
                                            <div id="btn-action<?php echo $row[0] ?>">
                                                <a href="LenhSanXuat/xemLSX/<?php echo $row[0] ?>"> <span class="fa fa-edit btn btn-success"></span></a>
                                                <a href="LenhSanXuat/TienDoSanXuat/<?php echo $row[0] ?>" class="btn btn-danger"><i class="fas fa-eye"></i></a>
                                                <button onclick="handleClick(this.id)" class="fa fa-edit btn btn-warning" id="updateStatus-<?php echo $row[0] ?>">Sửa</button>
                                            </div>


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
<script>
    var handleClick = (id) => {
        console.log(id);
        var idx = id.split("-")[1];
        var prestatus = $(`#status${idx}`)[0].firstElementChild;
        var action = $(`#btn-action${idx}`)[0];
        console.log(action);
        console.log(id);
        status = `<div class="form-group">
        <label for=""></label>
        <select class="form-control" name="" id="select${idx}">
        <option value="0">Kế hoạch</option>
            <option value="1">Sản xuất</option>
            <option value="2">Hoàn thành</option>
        </select>
        </div>`

        $(`#status${idx}`).html(status);
        data = `<button class="btn btn-success" id="capnhat${idx}">Cập nhật</button><button  class="btn btn-danger" id="huyStatus${idx}">Hủy</button>`;
        $(`#action${idx}`).html(data);

        $(`#huyStatus${idx}`).click(function() {
            console.log(1);
            $(`#action${idx}`).html(action);
            $(`#status${idx}`).html(prestatus);
        })

        $(`#select${idx}`).change(function() {
            var newStatus = $(`#select${idx}`).val();
            console.log(newStatus);


        })
        $(`#capnhat${idx}`).click(function() {
            var newStatus = $(`#select${idx}`).val();
            data = '';

            $.post("LenhSanXuat/CapNhatTrangThaiLSX", {
                    newStatus: newStatus,
                    id: idx,

                },
                function(data, status) {
                    // $("#dh_ycsx").html(data);
                    if (data == 1) {
                        alert("Cập nhật thành công");
                        if (newStatus == '0') {
                            data = ` <span class="badge badge-warning">Kế hoạch</span>`;
                        } else if (newStatus == '1') {
                            data = ` <span class="badge badge-primary">Sản xuất</span>`;
                        } else if (newStatus == '2') {
                            data = `<span class="badge badge-success">Đã hoàn thành</span>`;
                        }
                        $(`#status${idx}`).html(data);
                        $(`#action${idx}`).html(action);
                    }
                });

        })

    }
</script>