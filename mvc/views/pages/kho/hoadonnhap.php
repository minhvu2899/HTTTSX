<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Hóa đơn nhập kho</h4>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Chọn loại</label>
                                <select class="form-control" name="typeHD" id="typeHD">
                                    <option value="0">Vui lòng chọn loại hóa đơn</option>
                                    <option value="2">Nhập thành phẩm</option>
                                    <option value="1">Nhâp nguyên vật liêu</option>

                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Chọn lệnh sản xuất</label>
                                <select class="form-control" name="dh_ycsx" id="dh_ycsx">
                                    <option value="0">Vui lòng chọn loại hóa đơn</option>


                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class=" card card-header card-header-success mt-2">
                                <h4 class="card-title">Thêm vật tư</h4>

                            </div>

                            <div class="form-group">
                                <label for="vattu">Chọn vật tư</label>
                                <select class="form-control" name="vattu" id="vattu">

                                    <?php
                                    $listMaterials = $data["listMaterials"];
                                    while ($row = mysqli_fetch_array($listMaterials)) {
                                    ?>
                                        <option value="<?php echo $row[0] ?>-<?php echo $row[1] ?>"><?php echo $row[0] ?>-<?php echo $row[1] ?></option>
                                    <?php
                                    }

                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Số lượng nhập</label>
                                <input type="text" class="form-control" name="soluongnhap" id="soluongnhap" aria-describedby="helpId" placeholder="">

                            </div>
                            <button class="btn btn-success" id="add">Thêm</button>

                            <form action="" method="POST">
                                <div class="form-group mt-5">
                                    <label for="">Ngày nhập</label>
                                    <input type="date" class="form-control" name="ngaynhap" id="" aria-describedby="helpId" placeholder="">

                                </div>
                                <div class="form-group">
                                    <label for="">Nhân viên nhập</label>
                                    <select class="form-control" name="nvk" id="nvk">
                                        <option value="<?php if (isset($_SESSION['nvk'])) echo $_SESSION['nvk'][0]; ?>"><?php if (isset($_SESSION['nvk'])) echo $_SESSION['nvk'][1]; ?></option>


                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="addPN">Nhập hàng</button>
                            </form>
                            <a href="Admin/QuanLiKho" type="submit" class="btn btn-primary" name="">Quay lại</a>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-warning">
                                    <h4 class="card-title">Danh mục vật tư</h4>

                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
                                            <th>ID_VT</th>
                                            <th>Tên</th>
                                            <th>Số lượng</th>

                                        </thead>
                                        <tbody id="contentInput">


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>





                    <!-- <div class="clearfix"></div> -->

                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        let type = 0;
        $("#typeHD").change(function() {
            type = $("#typeHD").val();

            console.log(type);

            if (type == 2) {
                $.post("LenhSanXuat/getLenhHoanThanh", {

                    },
                    function(data, status) {
                        $("#dh_ycsx").html(data);
                        console.log(data);
                    });
            } else if (type == 1) {
                $.post("Ajax/GetYCSX", {

                    },
                    function(data, status) {
                        $("#dh_ycsx").html(data);
                        console.log(data);
                    });
            }
        });
        $("#dh_ycsx").change(function() {
            let dh_ycsx = $("#dh_ycsx").val();

            console.log(dh_ycsx);
            console.log(type);
            if (type == 2) {
                $.post("LenhSanXuat/GetDetailLenh", {
                        id_lenh: dh_ycsx,
                    },
                    function(data, status) {
                        if (data == 0) {
                            alert('Vui lòng tạo kế hoạch vật tư');
                        } else {
                            $("#contentInput").html(data);
                        }

                    });
            } else if (type == 1) {
                $.post("Ajax/GetMaterialNhap", {
                        id_ycsx: dh_ycsx,
                    },
                    function(data, status) {
                        $("#contentInput").html(data);

                    });
            }
        });
        $("#add").click(function() {
            let id_material = $("#vattu").val().split('-')[0];
            let name_material = $("#vattu").val().split('-')[1];
            let soluongnhap = $('#soluongnhap').val();
            console.log(id_material);
            console.log(name_material);
            console.log(soluongnhap);


            $.post("Ajax/showVatTu", {
                    id_material: id_material,
                    name_material: name_material,
                    soluongnhap: soluongnhap,
                },
                function(data, status) {
                    $("#contentInput").html(data);
                    // console.log(data);
                });
        });
    });
</script>