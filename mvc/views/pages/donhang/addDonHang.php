<div class="container-fluid">
    <form method="POST">
        <div class="row d-flex align-item-stretch">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Thêm đơn hàng</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ tên</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" id="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Số điện thoại</label>
                                    <input type="text" class="form-control" name="sdt" id="sdt">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Chọn khách hàng</label>
                            <select class="form-control" name="kh" id="kh">
                                <option value="0">Chọn khách hàng</option>
                                <?php
                                $list = $data["listKH"];
                                while ($row = mysqli_fetch_array($list)) {
                                ?>
                                    <option value="<?php echo $row[0] ?>"><?php echo $row[0] ?>-<?php echo $row[1] ?></option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit" name="addDH">Thêm</button>
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Chọn sản phẩm</label>
                            <select class="form-control" name="sp" id="vattu">
                                <option value="0">Chọn sản phẩm</option>
                                <?php
                                $list = $data["list"];
                                while ($row = mysqli_fetch_array($list)) {
                                ?>
                                    <option value="<?php echo $row[0] ?>"><?php echo $row[0] ?>-<?php echo $row[1] ?></option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Số lượng</label>
                            <input type="text" class="form-control" name="soluong">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Ngày giao</label>
                            <input type="date" class="form-control" name="ngaygiao">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </form>
</div>
<script>
    $("#kh").change(function() {
        if ($("#kh").val() != 0) {
            $("#email").prop("disabled", true);
            $("#sdt").prop("disabled", true);
            $("#name").prop("disabled", true);
            $("#address").prop("disabled", true);
        } else {
            $("#email").prop("disabled", false);
            $("#sdt").prop("disabled", false);
            $("#name").prop("disabled", false);
            $("#address").prop("disabled", false);
        }
    })
</script>