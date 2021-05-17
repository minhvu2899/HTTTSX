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
                                    ID_ĐH
                                </th>
                                <th>
                                    Tên Khách hàng
                                </th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Ngày nhận</th>
                                <th>Trạng thái</th>
                                <th>
                                    Action
                                </th>
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
                                            <strong><?php echo $row['name'] ?></strong>
                                        </td>
                                        <td>
                                            <?php echo $row[9] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['quantity'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row[4] ?>
                                        </td>
                                        <td id="status<?php echo $row[0] ?>">
                                            <?php if ($row[5] == 0) { ?>
                                                <span class=" badge badge-warning">Cần sản xuất</span>
                                            <?php } elseif ($row[5] == 1) { ?>
                                                <span class="badge badge-primary">Đang thực hiện</span>
                                            <?php } elseif ($row[5] == 2) { ?>
                                                <span class="badge badge-success">Đã hoàn thành</span>
                                            <?php } ?>
                                        </td>



                                        <td>
                                            <div id="action<?php echo $row[0] ?>">
                                                <div id="btn-action<?php echo $row[0] ?>">
                                                    <a title="Tạo yêu cầu sản xuất" href="Admin/AddYeuCau/<?php echo $row[0] ?>" class="btn btn-success"> <i class="fas fa-plus-square"></i></a>
                                                    <button onclick="handleClick(this.id)" class="fa fa-edit btn btn-danger" id="updateStatus-<?php echo $row[0] ?>"></button>
                                                    <a onclick="return confirm('Bạn có muốn xóa không')" title="Tạo yêu cầu sản xuất" href="Admin/XoaDH/<?php echo $row[0] ?>" class="btn btn-warning"> <i class="fas fa-trash-alt"></i></a>
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
        <option value="0">Chờ xử lí</option>
            <option value="1">Đang thực hiện</option>
            <option value="2">Đã hoàn thành</option>
        </select>
        </div>`

        $(`#status${idx}`).html(status);
        data = `<button class="btn" id="capnhat${idx}">Cập nhật</button><button  class="" id="huyStatus${idx}">Hủy</button>`;
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

            $.post("DonHang/updateStatusByID", {
                    newStatus: newStatus,
                    id: idx,

                },
                function(data, status) {
                    // $("#dh_ycsx").html(data);
                    console.log(data);
                    if (data == 1) {
                        alert("Cập nhật thành công");
                        if (newStatus == '0') {
                            data = ` <span class="badge badge-warning">Chờ xử lí</span>`;
                        } else if (newStatus == '1') {
                            data = ` <span class="badge badge-primary">Đang thực hiện</span>`;
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