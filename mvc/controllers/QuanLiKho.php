<?php
class QuanLiKho extends Controller
{
    public $mt, $pn, $hdn, $px, $hdx, $kho;

    function __construct()
    {
        $this->mt = $this->model("MaterialsModel");
        $this->pn = $this->model("PhieuNhapModel");
        $this->px = $this->model("PhieuXuatModel");
        $this->hdn = $this->model("HoaDonNhapModel");
        $this->hdx = $this->model("HoaDonXuatModel");
        $this->kho = $this->model("KhoModel");
        $this->dh = $this->model("DonHangModel");
    }

    function SayHi()
    {

        $this->view(
            "Admin",
            [

                "Page" => "materials/category_materials",
                "listMaterials" => $this->mt->getListMaterials(),
            ]
        );
    }
    function NhapKho()
    {

        if (isset($_POST["addPN"])) {
            $ngaynhap = $_POST['ngaynhap'];
            $id_nv = $_POST['nvk'];
            if ($ngaynhap != '') {
                $id_pn = $this->pn->insertPhieuNhap($id_nv, $ngaynhap);
                if (isset($_SESSION['listMaterials'])) {
                    $listInput = $_SESSION['listMaterials'];

                    foreach ($listInput as $vt) {

                        $kq = $this->hdn->insertHĐN($id_pn, $vt->id_material, $vt->soluongconthieu);
                    }
                } else if (isset($_SESSION['listMaterials1'])) {
                    $listInput = $_SESSION['listMaterials1'];
                    print_r($_SESSION['listMaterials1']);

                    foreach ($listInput as $vt) {

                        $kq = $this->hdn->insertHĐN($id_pn, $vt->id_material, $vt->soluongnhap);
                    }
                }
                $listTonKho = $this->kho->getTonKho();
                while ($row = mysqli_fetch_array($listTonKho)) {
                    $this->kho->updateQuantityTon($row[0], $row[1]);
                }
                echo "<script>alert('Thành công!')</script>";
                unset($_SESSION['listMaterials']);
                unset($_SESSION['listMaterials1']);
                unset($_POST['addPN']);
            } else {
                echo "<script>alert('Vui lòng nhập ngày')</script>";
            }
        }
        $this->view(
            "Admin",
            [
                "Page" => "kho/hoadonnhap",
                "listMaterials" => $this->mt->getListMaterials(),

            ]
        );
    }
    function XuatKho()
    {
        if (isset($_POST["addPX"])) {
            $ngayxuat = $_POST['ngayxuat'];
            $id_nv = $_POST['nvk'];
            $type = $_POST['typeHD'];
            $dh_ycsx = $_POST['dh_ycsx'];
            if ($ngayxuat != '') {
                if ($type == 1) {
                    $id_px = $this->px->insertPhieuXuat('', $dh_ycsx, $type, $ngayxuat);
                    if (isset($_SESSION['listSPByYC'])) {
                        $listSPByYC = $_SESSION['listSPByYC'];
                        foreach ($listSPByYC as $vt) {

                            $this->kho->updateQuantityTonLiThuyet($vt[2], $vt[4]);

                            $kq = $this->hdx->insertHĐX($id_px, $vt[2], $vt[5]);
                            echo $kq;
                        }
                        $listTonKho = $this->kho->getTonKho();
                        while ($row = mysqli_fetch_array($listTonKho)) {
                            $this->kho->updateQuantityTon($row[0], $row[1]);
                        }
                        echo "<script>alert('Thành công!')</script>";
                        unset($_SESSION['listSPByYC']);
                        unset($_POST['addPX']);
                    }
                } else if ($type == 2) {
                    $id_px = $this->px->insertPhieuXuat($dh_ycsx, "", $type, $ngayxuat);
                    if (isset($_SESSION['listSPByĐH'])) {
                        $listSPByDH = $_SESSION['listSPByĐH'];
                        foreach ($listSPByDH as $vt) {

                            $kq = $this->hdx->insertHĐX($id_px, $vt['id_material'], $vt['quantity']);
                            echo $kq;
                        }
                        $listTonKho = $this->kho->getTonKho();
                        while ($row = mysqli_fetch_array($listTonKho)) {
                            $this->kho->updateQuantityTon($row[0], $row[1]);
                        }
                        $this->dh->UpdateStatus($dh_ycsx);
                        echo "<script>alert('Thành công!')</script>";
                        unset($_SESSION['listSPByĐH']);
                        unset($_POST['addPX']);
                    }
                }
            } else {
                echo "<script>alert('Vui lòng nhập ngày')</script>";
            }
        }
        $this->view(
            "Admin",
            [
                "Page" => "kho/hoadonxuat",
                "listMaterials" => $this->mt->getListMaterials(),

            ]
        );
    }
    function GetAllPhieuNhap()
    {
        $listPN = $this->pn->getListPN();

        $this->view(
            "Admin",
            [
                "Page" => "kho/listPN",
                "listPN" => $listPN,

            ]
        );
    }
    function GetAllPhieuXuat()
    {
        $listPX = $this->px->getListPX();

        $this->view(
            "Admin",
            [
                "Page" => "kho/listPX",
                "listPX" => $listPX,

            ]
        );
    }
    function ChitietHĐN($id)
    {
        $listHĐN = $this->hdn->getHĐNByID($id);

        $this->view(
            "Admin",
            [
                "Page" => "kho/chitietHĐN",
                "listHĐN" => $listHĐN,

            ]
        );
    }
    function ChitietHĐX($id)
    {
        $listHĐX = $this->hdx->getHĐXByID($id);

        $this->view(
            "Admin",
            [
                "Page" => "kho/chitietHĐX",
                "listHĐX" => $listHĐX,

            ]
        );
    }
    function Yeucaumuahang()
    {
        $this->view(
            "Admin",
            [
                "Page" => "kho/yeucaumuahang",
                // "listHĐX" => $listHĐX,

            ]
        );
    }
}
