<div class="container-fluid"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card-header card-header-success">
                        <h3>Công đoạn may</h3>
                        </h4>

                    </div>
                </div>
            </div>
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh sách các lệnh</h4>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">

                            <th>ID</th>
                            <th>
                                ID_Lệnh
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
                                        <?php echo $row[2] ?>
                                    </td>

                                    <td>
                                        <?php echo $row[3] ?>
                                    </td>

                                    <td id="status<?php echo $row[0] ?>">
                                        <?php if ($row[4] == 0) { ?>
                                            <span class="badge badge-warning">Đã nhận lệnh</span>
                                        <?php } elseif ($row[4] == 1) { ?>
                                            <span class="badge badge-primary">Đang thực hiện</span>
                                        <?php } elseif ($row[4] == 2) { ?>
                                            <span class="badge badge-success">Đã hoàn thành</span>
                                        <?php } ?>
                                    </td>


                                    <td>
                                        <div id="action<?php echo $row[0] ?>">
                                            <div id="btn-action<?php echo $row[0] ?>">
                                                <a href="QuanLiSX/ChitietLenh/<?php echo $row[2] ?>/<?php echo $row[1] ?>"> <span class="fa fa-eye btn btn-success"></span></a>
                                                <button onclick="handleClick(this.id)" class="fa fa-edit btn btn-danger" id="updateStatus-<?php echo $row[0] ?>"></button>
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
    <div>
        <button onclick="quay_lai_trang_truoc()" class=" btn btn-success">Quay lại</button>
    </div>
    <script>
        function quay_lai_trang_truoc() {
            history.back();
        }
    </script>
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

            $.post("LenhSanXuat/CapNhatTrangThaiCĐ", {
                    newStatus: newStatus,
                    id: idx,

                },
                function(data, status) {
                    // $("#dh_ycsx").html(data);
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
</script>