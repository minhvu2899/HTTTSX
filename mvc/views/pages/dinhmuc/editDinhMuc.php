<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Sửa định mức</h4>

                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Đầu ra</label>
                                    <select class="form-control" name="out" id="">
                                        <?php
                                        $listOutPut = $data["listOutPut"];
                                        while ($row = mysqli_fetch_array($listOutPut)) {
                                        ?>
                                            <option <?php if ($data['listDM'][2] == $row[0]) echo "selected" ?> value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Đầu vào</label>
                                    <select class="form-control" name="in" id="">
                                        <?php
                                        $listMaterials = $data['listMaterials'];

                                        while ($row = mysqli_fetch_array($listMaterials)) {
                                        ?>
                                            <option value=<?php echo $row[0] ?> <?php if ($data['listDM'][1] == $row[0]) echo "selected" ?>><?php echo $row[1] ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Số lượng</label>
                                    <input type="text" class="form-control" name="soluong" value=<?php echo $data['listDM'][4] ?>>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Công đoạn</label>
                                    <select class="form-control" name="cd" id="">
                                        <?php
                                        $listCD = $data['listCD'];

                                        while ($row = mysqli_fetch_array($listCD)) {
                                        ?>
                                            <option value="<?php echo $row[0] ?>" <?php if ($data['listDM'][3] == $row[0]) echo "selected"; ?>><?php echo $row[1] ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" name="editDM">Update Profile</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>