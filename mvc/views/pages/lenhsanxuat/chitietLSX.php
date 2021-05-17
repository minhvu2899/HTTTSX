<div class="container-fluid">
    <form action="LenhSanXuat/addYeuCau" method="POST">
        <div class="row d-flex align-items-center">



            <div class="col-3 ">

                <div class="form-group">
                    <lable for="sp" class="font-weight-bold">Trạng thái</lable>
                    <select class="form-control" name="status" id="sp">

                        <option value="0">Kế hoạch</option>
                        <option value="1">Đang thực hiện</option>

                    </select>
                </div>

            </div>

        </div>
        <button type="submit" name="addYeuCau">Submit</button>
    </form>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Chi tiết lệnh sản xuất</h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                ID_CT
                            </th>

                            <th>
                                ID_VT
                            </th>
                            <th>Tên vật tư</th>
                            <th>Số lượng cần</th>
                            <th>Số lượng hoàn thành</th>
                            <th>Số lượng còn thiếu</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>

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
                                        <?php echo $row['name_material'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[3] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[4] ?>
                                    </td>
                                    <td>
                                        <?php echo $row[5] ?>
                                    </td>

                                    <td id="date_start<?php echo $row[0] ?>">
                                        <?php if ($row[6] == '') { ?>
                                            <input onclick="handleClick(this.id)" type="date" name="" id="ngaybd-<?php echo $row[0] ?>">
                                        <?php } else echo $row[6]; ?>
                                    </td>
                                    <td id="date_end<?php echo $row[0] ?>">
                                        <?php if ($row[7] == '') { ?>
                                            <input type="date" name="" id="ngaykt-<?php echo $row[0] ?>">
                                        <?php } else echo $row[7]; ?>
                                    </td>
                                    <td>
                                        <?php if ($row[8] == 0) { ?>
                                            <span class="badge badge-warning">Chờ xử lí</span>
                                        <?php } elseif ($row[8] == 1) { ?>
                                            <span class="badge badge-primary">Đang thực hiện</span>
                                        <?php } elseif ($row[8] == 2) { ?>
                                            <span class="badge badge-success">Đã hoàn thành</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div id="update<?php echo $row[0] ?>">
                                            <a id="capnhat<?php echo $row[0] ?>"> <span class="btn btn-success">Cập nhật</span></a>

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
    <a href="LenhSanXuat" class="btn btn-success">Quay lại</a>
</div>
</div>
<script>
    var idx;
    var handleClick = (id) => {
        console.log("click");
        idx = id.split("-")[1];
        console.log(idx);
        var x = $(`#${id}`).val();
        console.log(x);
        $(`#ngaybd-${idx}`).change(function() {
            var x = $(`#ngaybd-${idx}`).val();
            console.log(x);
            $(`#ngaykt-${idx}`).change(function() {
                var y = $(`#ngaykt-${idx}`).val();
                console.log(y);
                $(`#capnhat${idx}`).click(function() {
                    console.log(x);
                    console.log(y);
                    $.post("LenhSanXuat/updateLenhSX", {
                            ngaybd: x,
                            ngaykt: y,
                            id: idx,
                        },
                        function(data, status) {
                            if (data == 1) {
                                alert("Cập nhật thành công");
                                console.log(idx);
                                $(`#date_start${idx}`).html(x);
                                $(`#date_end${idx}`).html(y);


                            }
                            console.log(data);
                        });
                })
            })
        })
    }
</script>