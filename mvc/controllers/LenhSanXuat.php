<?php
class LenhSanXuat extends Controller
{
    public  $yc, $mt, $lsx;
    function __construct()
    {

        $this->yc = $this->model("YeuCauSanXuatModel");
        $this->mt = $this->model("MaterialsModel");
        $this->lsx = $this->model("LenhSanXuatModel");
        $this->ctlsx = $this->model("ChiTietLSXModel");
        $this->khvt = $this->model("KeHoachVatTuModel");
        $this->ttsx = $this->model("ThucTeSanXuatModel");
        $this->ctcd = $this->model("ChiTietCongDoanModel");
    }
    function SayHi()
    {
        if (!isset($_SESSION['admin'])) {
            session_start();
            header('location: https://hethongquanlisanxuat.herokuapp.com/');
        }

        $listLenhSX = $this->lsx->getListLSX();
        while ($row = mysqli_fetch_array($listLenhSX)) {
            $check = $this->ctcd->checkStatus($row[0]);
            if ($check == 0 && $row['status'] == 0) {
                $kq = $this->lsx->updateStatus(2, $row[0]);
            }
        }
        $listLenhSX = $this->lsx->getListLSX();
        $this->view(
            "Admin",
            [
                "Page" => "lenhsanxuat/lenhsanxuat",
                "listMaterials" => $this->mt->getListMaterials(),
                "listLenhSX" => $listLenhSX,

            ]
        );
    }
    function addLenhSX($id_ycsx)
    {
        if (!isset($_SESSION['admin'])) {
            session_start();
            header('location: https://hethongquanlisanxuat.herokuapp.com/');
        }
        $name = `lenhsx$id_ycsx`;
        // unset($_SESSION[$name]);
        if (isset($_SESSION[$name])) {
            $id = $this->lsx->getIDByYC($id_ycsx);

            header("Location: https://hethongquanlisanxuat.herokuapp.com/LenhSanXuat/xemLSX/$id");
        } else {
            $ngay = date("Y-m-d") . "<br>";

            $kq = $this->lsx->insertLenhSX($id_ycsx, $ngay);
            echo $kq;
            $khvt = $this->khvt->getVatTuCanSX($id_ycsx);
            $ycmh = [];
            while ($row = mysqli_fetch_array($khvt)) {
                echo $row[2];
                if ($row[5] != 0) {
                    array_push($ycmh, (object)$row);
                }
                $kq1 = $this->ctlsx->insertCTLSX($kq, $row[2], $row[5], 0, $row[5]);
                echo $kq1;
            }
            $_SESSION['ycmh'] = $ycmh;
            $info = (object)[$id_ycsx, $kq, "Yêu cầu mua hàng"];
            $_SESSION['info_ycmh'] = $info;
            // var_dump(1);
            // die();
            $_SESSION[$name] = "True";
            header("Location: https://hethongquanlisanxuat.herokuapp.com/LenhSanXuat/xemLSX/$kq");
        }
    }

    function xemLSX($id_lsx)
    {
        if (!isset($_SESSION['admin'])) {
            session_start();
            header('location: https://hethongquanlisanxuat.herokuapp.com/');
        }
        $listLenhSX = $this->ctlsx->getChiTietLenhByID($id_lsx);
        $this->view(
            "Admin",
            [
                "Page" => "lenhsanxuat/chitietLSX",
                "listLenhSX" => $listLenhSX,

            ]
        );
    }
    function TienDoSanXuat($id_lsx)
    {
        if (!isset($_SESSION['admin'])) {
            session_start();
            header('location: https://hethongquanlisanxuat.herokuapp.com/');
        }
        $listTienDo = $this->ctlsx->getTienDo($id_lsx);
        $this->view(
            "Admin",
            [
                "Page" => "lenhsanxuat/tiendoSX",
                "listTienDo" => $listTienDo,

            ]
        );
    }
    function updateLenhSX()
    {
        if (!isset($_SESSION['admin'])) {
            session_start();
            header('location: https://hethongquanlisanxuat.herokuapp.com/');
        }
        $ngaybd = $_POST['ngaybd'];
        $ngaykt = $_POST['ngaykt'];
        $id = $_POST['id'];
        $kq = $this->ctlsx->updateNgay($ngaybd, $ngaykt, $id);
        echo $kq;
    }
    function CapNhatTrangThaiLSX()
    {
        if (!isset($_SESSION['admin'])) {
            session_start();
            header('location: https://hethongquanlisanxuat.herokuapp.com/');
        }
        $newStatus = $_POST['newStatus'];
        $id = $_POST['id'];
        if ($newStatus == 1) {
            $khvt = $this->ctlsx->getChiTietLenhByCD($id);
            $ngay = date("Y-m-d") . "<br>";
            while ($row = mysqli_fetch_array($khvt)) {
                $this->ctcd->insertCTCD($row['id_congdoan'], $row['id_lenh'], $ngay);
            }
        }
        $kq = $this->lsx->updateStatus($newStatus, $id);
        echo $kq;
    }
    function CapNhatTrangThaiCĐ()
    {
        if (!isset($_SESSION['admin'])) {
            session_start();
            header('location: https://hethongquanlisanxuat.herokuapp.com/');
        }
        $newStatus = $_POST['newStatus'];
        $id = $_POST['id'];
        // if ($newStatus == 1) {
        //     $khvt = $this->ctlsx->getChiTietLenhByCD($id);
        //     $ngay = date("Y-m-d") . "<br>";
        //     while ($row = mysqli_fetch_array($khvt)) {
        //         $this->ctcd->insertCTCD($row['id_congdoan'], $row['id_lenh'], $ngay);
        //     }
        // }
        $kq = $this->ctcd->updateStatus($id, $newStatus);
        echo $kq;
    }
    function getLenhHoanThanh()
    {
        $list = $this->lsx->getLenhHoanThanh();
        $data = "<option value=''>Chọn đơn hàng</option>";
        while ($dh = mysqli_fetch_array($list)) {
            $data .= "
            <option value='$dh[0]'>$dh[0]-$dh[1]</option>";
        }
        echo  $data;
    }
    function GetDetailLenh()
    {
        $id_lenh = $_POST['id_lenh'];
        $list = $this->lsx->getMaterialByLenh($id_lenh);
        $data = '';
        $listInput = [];

        while ($vt = mysqli_fetch_array($list)) {
            array_push($listInput, $vt);
            $data .= " <tr>
            <td>$vt[0]</td>
            <td>$vt[1]</td>
            <td>$vt[2]</td>
             </tr>";
        }
        $_SESSION['listMaterials1'] = $listInput;
        echo  $data;
    }
    function ChiTietTienDo($id_ctlsx)
    {
        $listTienDo = $this->ttsx->getListTTSX($id_ctlsx);
        $this->view(
            "Admin",
            [
                "Page" => "lenhsanxuat/chitiettiendo",
                "listTienDo" => $listTienDo,

            ]
        );
    }
}
