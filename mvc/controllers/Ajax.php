<?php
class Ajax extends Controller
{
    public $UserModel, $dh, $yc, $ctdh, $mt;
    function __construct()
    {
        $this->UserModel = $this->model("User");
        $this->dh = $this->model("DonHangModel");
        $this->ctdh = $this->model("ChiTietDonHangModel");
        $this->yc = $this->model("YeuCauSanXuatModel");
        $this->khvt = $this->model("KeHoachVatTuModel");
        $this->mt = $this->model("MaterialsModel");
    }
    function checkUsername()
    {
        $un = $_POST['un'];
        $kq = $this->UserModel->checkUsername($un);
        if ($kq == 1) {
            echo 1;
        } else echo 0;
    }
    function GetAllDH()
    {
        $listDH = $this->dh->getListDH();
        $data = "<option value=''>Chọn đơn hàng</option>";
        while ($dh = mysqli_fetch_array($listDH)) {
            $data .= "
            <option value='$dh[0]'>$dh[0]-$dh[5]</option>";
        }
        echo  $data;
    }
    function GetYCSX()
    {
        $listYeuCau = $this->yc->getListYeuCau();
        $data = "<option value=''>Chọn yêu cầu</option>";
        while ($yc = mysqli_fetch_array($listYeuCau)) {
            $data .= "
            <option value='$yc[0]'>$yc[0]-$yc[2]</option>";
        }
        echo  $data;
    }
    function GetMaterialXuat()
    {
        $id_ycsx = $_POST['id_ycsx'];
        $listKHVT = $this->khvt->getKHVTByID($id_ycsx);
        $list = [];
        if (mysqli_num_rows($listKHVT) == 0) {
            echo 0;
        } else {
            $data = "";
            while ($vt = mysqli_fetch_array($listKHVT)) {

                if ($vt['type'] == 0) {
                    $quantity = $vt[4] + $vt[5];
                    array_push($list, $vt);
                    $data .= " <tr>
                <td>$vt[2]</td>
                <td>$vt[7]</td>
                <td>$quantity</td>
                <td>$vt[8]</td>
                 </tr>";
                } else if ($vt['type'] == 1 && $vt['soluongphanbo'] != 0) {
                    array_push($list, $vt);
                    $data .= " <tr>
                <td>$vt[2]</td>
                <td>$vt[7]</td>
                <td>$vt[4]</td>
                <td>$vt[8]</td>
                 </tr>";
                }
            }
            $_SESSION['listSPByYC'] = $list;
            echo  $data;
        }
    }
    function GetMaterialNhap()
    {
        $id_ycsx = $_POST['id_ycsx'];
        $listKHVT = $this->khvt->getKHVTByID($id_ycsx);
        $list = [];
        if (mysqli_num_rows($listKHVT) == 0) {
            echo 0;
        } else {
            $data = "";
            while ($vt = mysqli_fetch_array($listKHVT)) {

                if ($vt['type'] == 0) {
                    array_push($list, (object)$vt);
                    $data .= " <tr>
                <td>$vt[2]</td>
                <td>$vt[7]</td>
                <td>$vt[5]</td>
                <td>$vt[8]</td>
                 </tr>";
                }
            }
            $_SESSION['listMaterials'] = $list;
            echo  $data;
        }
    }
    function GetProductByĐH()
    {
        $id_dh = $_POST['id_dh'];
        $listProduct = $this->dh->getListDHByID($id_dh);
        $data = "";
        $list = [];
        while ($vt = mysqli_fetch_array($listProduct)) {
            array_push($list, $vt);
            if ($vt[5] == 0) {
                $vt[5] = "<span class='badge badge-warning'>Chờ xử lí</span>";
            } else if ($vt[5] == 1) {
                $vt[5] = "<span class='badge badge-primary'>Đang thực hiện</span>";
            } else if ($vt[5] == 2) {
                $vt[5] = "<span class='badge badge-success'>Đã hoàn thành</span>";
            }
            $data .= " <tr>
                <td>$vt[0]</td>
                <td>$vt[6]</td>
                <td>$vt[9]</td>
                <td>$vt[3]</td>
                <td>$vt[4]</td>
                <td>$vt[5]</td>
                 </tr>";
        }
        $_SESSION['listSPByĐH'] = $list;
        echo  $data;
    }

    function showVatTu()
    {
        $id_material = $_POST['id_material'];
        $name_material = $_POST['name_material'];
        $soluongnhap = $_POST['soluongnhap'];
        if (isset($_SESSION['listMaterials1'])) {
            $listInput = $_SESSION['listMaterials1'];
        } else {
            $listInput = [];
        }
        $material = (object)[
            'id_material' => $id_material,
            'name_material' => $name_material,
            'soluongnhap' => $soluongnhap,
        ];

        if (count($listInput) != 0) {
            $check = 0;
            foreach ($listInput as $value) {
                if ($value->id_material == $material->id_material) {
                    $value->soluongnhap += $material->soluongnhap;
                    $check = 1;
                    break;
                }
            }
            if (!$check) {
                array_push($listInput, $material);
                $_SESSION['listMaterials1'] = $listInput;
            }
        } else {
            array_push($listInput, $material);
            $_SESSION['listMaterials1'] = $listInput;
        }
        $data = "";

        foreach ($listInput as $vt) {
            $data .= " <tr>
            <td>$vt->id_material</td>
            <td>$vt->name_material</td>
            <td>$vt->soluongnhap</td>
             </tr>";
        }
        echo  $data;
    }
    function getSLTonKhoByID()
    {
        $id_material = $_POST['id_material'];
        $quantity = $this->mt->getSoLuongTonByID($id_material);

        echo $quantity[0];
    }
    function checkSLTon()
    {
        $quantity = $_POST['soluong'];
        $id_material = $_POST['id_material'];
        $q = $this->mt->getSoLuongTonByID($id_material);
        if ($q[0] >= $quantity) {
            echo 1;
        } else echo 0;
    }
    function updateLenhSX()
    {
        $ngaybt = $_POST['ngaybt'];
        $ngaykt = $_POST['ngaykt'];
        echo $ngaybt;
    }
    function getDonHangByID()
    {
        // $id = $_POST['id'];
        $id = 1;
        $dh = $this->dh->getListDHByID($id);
        $data = "";
        while ($d = mysqli_fetch_array($dh)) {
            $data .= `<div class="form-group">
            <label for="">Chọn sản phẩm</label>
            <select class="form-control" name="sp" id="sp">
                    <option value="$d[2].">$d[9]</option>
            </select>
        </div>
        <div class="form-group">
            <label class="bmd-label-floating">Số lượng</label>
            <input type="text" class="form-control" name="soluong" id="soluong" value=$d[3]>
        </div>
        <div class="form-group">
            <label class="bmd-label-floating">Ngày giao</label>
            <input type="date" class="form-control" name="ngaygiao" id="ngaygiao" value=$d[4]>
        </div>`;
        }




        echo $data;
    }
}
