<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <select class="form-control" name="" id="">
                    <option>Chọn yêu cầu</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <a type="submit"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Kế hoạch vật tư</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    ID_YC
                                </th>
                                <th>
                                    Tên Vật tư
                                </th>
                                <th>Đơn vị</th>
                                <th>
                                    Số lượng cần
                                </th>
                                <th>
                                    Số lượng phân bổ
                                </th>
                                <th>
                                    Số lượng thiếu
                                </th>
                                <th>Phân bổ</th>

                            </thead>
                            <tbody>
                                <?php
                                if (isset($data['listKHVT'])) {

                                    $listKHVT = $data["listKHVT"];
                                    while ($row = mysqli_fetch_array($listKHVT)) {
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo $row[1] ?>
                                            </td>
                                            <td>
                                                <strong><?php echo $row[7] ?></strong>
                                            </td>
                                            <td>
                                                <?php echo $row[8] ?>
                                            </td>

                                            <td>
                                                <?php echo $row[3] ?>
                                            </td>
                                            <td>
                                                <?php echo $row[4] ?>
                                            </td>
                                            <td id="soluongthieu<?php echo $row['id_material'] ?>">
                                                <?php echo $row[5] ?>
                                            </td>
                                            <td>
                                                <button onclick="handelClick(this.id,this.name)" class="btn " name="pb" id="<?php echo $row['id_material'] ?>">Phân bổ</button>
                                                <form style="display:none;" id="form-<?php echo $row['id_material'] ?>" action="KeHoachVatTu/phanbovattu/<?php echo $row[1] ?>/<?php echo $row[6] ?>" method="post">
                                                    <input type="text" name="slpb" id="slpb-<?php echo $row['id_material'] ?>"><button type="submit" name="pb" id="pb<?php echo $row['id_material'] ?>">PB</button><br>
                                                    <div id="text-slt<?php echo $row['id_material'] ?>">

                                                    </div>

                                                </form>


                                            </td>

                                        </tr>
                                <?php
                                    }
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
        <a href="YeuCauSanXuat" class="btn btn-success">Quay lại</a>
    </div>
</div>
</div>
<script>
    function handelClick(id, name) {

        console.log("id:", id);
        console.log("name", name);
        let btn_pb = document.getElementById(`${id}`);
        console.log(btn_pb);
        btn_pb.style.display = "none";
        let form = document.getElementById(`form-${id}`);
        console.log(form);
        form.style.display = "block";

        $.post("Ajax/getSLTonKhoByID", {
                id_material: id,
            },
            function(data, status) {
                data = "<span class ='badge badge-success'>Số lượng tồn hiện tại:" + data + "</span>";
                $(`#text-slt${id}`).html(data);

                console.log(data);
            });
        $(`#slpb-${id}`).keyup(function() {
            console.log("ss", id);
            var soluong = $(`#slpb-${id}`).val();
            console.log(soluong);
            console.log(soluongthieu);


            if (soluong != '') {
                var soluongthieu = $(`#soluongthieu${id}`)[0].innerText;
                if (Number(soluong) > Number(soluongthieu)) {
                    alert("Vượt quá số lượng cần. Vui lòng nhập lại!");
                    $(`#pb${id}`).prop("disabled", true);
                    $(`#text-slt${id}`).html(data);
                } else {
                    $(`#pb${id}`).prop("disabled", false);
                    $.post("Ajax/checkSLTon", {
                            id_material: id,
                            soluong: soluong,
                        },
                        function(data, status) {
                            if (data == 1) {
                                data = "<span class = 'badge badge-success' >Có thể phân bổ</span>";
                            } else {
                                data = "<span class = 'badge badge-danger' >Vượt quá số lượng có thể phân bổ</span>";
                                alert("Vượt quá số lượng tồn");
                            }
                            $(`#text-slt${id}`).html(data);

                            console.log(data);
                        });
                }
            } else {
                $.post("Ajax/getSLTonKhoByID", {
                        id_material: id,
                    },
                    function(data, status) {

                        data = "<span class ='badge badge-success'>Số lượng tồn hiện tại: " + data + "</span>";
                        console.log(data);
                        $(`#text-slt${id}`).html(data);


                    });
            }
        })

    }
</script>