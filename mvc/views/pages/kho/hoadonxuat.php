<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Hóa đơn xuất kho</h4>

                </div>
                <form action="QuanLiKho/XuatKho" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top:43px">
                                    <label for="">Ngày nhập</label>
                                    <input type="date" class="form-control" name="ngayxuat" id="" aria-describedby="helpId" placeholder="">

                                </div>
                                <div class="form-group">
                                    <label for="">Nhân viên nhập</label>
                                    <select class="form-control" name="nvk" id="nvk">
                                        <option value="<?php if (isset($_SESSION['nvk'])) echo $_SESSION['nvk'][0]; ?>"><?php if (isset($_SESSION['nvk'])) echo $_SESSION['nvk'][1]; ?></option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Chọn loại</label>
                                    <select class="form-control" name="typeHD" id="typeHD">
                                        <option value="0">Vui lòng chọn loại hóa đơn</option>
                                        <option value="1">Theo lệnh sản xuất</option>
                                        <option value="2">Theo đơn hàng</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Chọn đơn hàng/lệnh sản xuất</label>
                                    <select class="form-control" name="dh_ycsx" id="dh_ycsx">
                                        <option value="0">Vui lòng chọn loại hóa đơn</option>


                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="card" id="card-change">
                                <div class="card-header card-header-warning">
                                    <h4 class="card-title">Danh mục vật tư</h4>

                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
                                            <th>ID_VT</th>
                                            <th>Tên</th>
                                            <th>Số lượng</th>
                                            <th>Đơn vị</th>
                                        </thead>
                                        <tbody id="contentInput">


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success" type="submit" name="addPX">Xuất hóa đơn</button>
                    </div>





                    <!-- <div class="clearfix"></div> -->


            </div>
            </form>
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
                $("#card-change").html(` <div class="card-header card-header-warning">
                                    <h4 class="card-title">Thông tin đơn hàng</h4>

                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
                                            <th>ID_DH</th>
                                            <th>Tên khách hàng</th>
                                            <th>Tên sản phẩm</th>
                                            
                                            <th>Số lượng</th>
                                            <th>Ngày giao</th>
                                            <th>Trạng thái</th>
                                        </thead>
                                        <tbody id="contentInput">


                                        </tbody>
                                    </table>
                                </div>`);
                $.post("Ajax/GetAllDH", {

                    },
                    function(data, status) {
                        $("#dh_ycsx").html(data);
                        console.log(data);
                    });
            } else if (type == 1) {
                $("#card-change").html(`<div class="card-header card-header-warning">
                                    <h4 class="card-title">Danh mục vật tư</h4>

                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
                                            <th>ID_VT</th>
                                            <th>Tên</th>
                                            <th>Số lượng</th>
                                            <th>Đơn vị</th>
                                        </thead>
                                        <tbody id="contentInput">


                                        </tbody>
                                    </table>
                                </div>`);
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
            if (type == 1) {
                $.post("Ajax/GetMaterialXuat", {
                        id_ycsx: dh_ycsx,
                    },
                    function(data, status) {
                        if (data == 0) {
                            alert('Vui lòng tạo kế hoạch vật tư');
                        } else {
                            $("#contentInput").html(data);
                        }

                    });
            } else if (type == 2) {
                $.post("Ajax/GetProductByĐH", {
                        id_dh: dh_ycsx,
                    },
                    function(data, status) {
                        $("#contentInput").html(data);

                    });
            }
        });

    });
</script>