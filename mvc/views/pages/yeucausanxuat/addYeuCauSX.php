<?php if (isset($data['dh'])) {
    $dh = $data['dh'];
    $dh = mysqli_fetch_row($dh);
}
?>
<div class="container-fluid">
    <form method="POST">
        <div class="row d-flex align-item-stretch">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Thêm Yêu Cầu Sản Xuât</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Chọn loai sản xuất</label>
                                    <select class="form-control" name="kh" id="kh">
                                        <option <?php if (isset($data['dh'])) {
                                                    echo "selected";
                                                }
                                                ?> value="1">Sản xuất theo đơn</option>
                                        <option value="2">Sản xuất theo yêu cầu</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Chọn đơn hàng</label>
                                    <select class="form-control" name="dhkh" id="dhkh">
                                        <option value="0">Chọn đơn hàng</option>
                                        <?php
                                        if (isset($data['dh'])) {
                                            echo "<option selected value=$dh[0]>$dh[6]</option>";
                                        }
                                        ?>
                                        <?php
                                        if (isset($data['listDH'])) {

                                            $listDH = $data["listDH"];
                                            while ($row = mysqli_fetch_array($listDH)) {
                                        ?>
                                                <option value="<?php echo $row[0] ?>"><?php echo $row['name'] ?></option>
                                        <?php
                                            }
                                        }

                                        ?>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Ngày yêu cầu</label>
                                    <input type="date" class="form-control" name="ngayyc" id="ngayyc">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="addYeuCau">Thêm</button>
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">

                    <div class="card-body" id="infodh">
                        <div class="form-group">
                            <label for="">Chọn sản phẩm</label>
                            <select class="form-control" name="sp" id="sp">
                                <?php if (isset($data['dh'])) { ?>

                                    <option selected value="<?php echo $dh[2] ?>"><?php echo $dh[9] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Số lượng</label>
                            <input type="text" class="form-control" name="soluong" id="soluong" value=<?php if (isset($data['dh'])) echo $dh[3]; ?>>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Ngày giao</label>
                            <input type="date" class="form-control" name="ngaygiao" id="ngaygiao" value=<?php if (isset($data['dh'])) echo $dh[4]; ?>>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </form>
</div>
<script>
    $("#dhkh").change(function() {
        var id = $("#dhkh").val();
        console.log(id);
        $.post("DonHang/getDonHangByID", {

                id: id,

            },
            function(data, status) {
                $("#infodh").html(data);
                console.log(data);
            });
    })
</script>