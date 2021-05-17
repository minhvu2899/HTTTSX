<?php
class QuanLiSX extends Controller
{
    public $mt, $pn, $hdn, $px, $hdx, $kho, $ttsx;

    function __construct()
    {
        $this->mt = $this->model("MaterialsModel");
        $this->pn = $this->model("PhieuNhapModel");
        $this->px = $this->model("PhieuXuatModel");
        $this->hdn = $this->model("HoaDonNhapModel");
        $this->hdx = $this->model("HoaDonXuatModel");
        $this->kho = $this->model("KhoModel");
        $this->lsx = $this->model("LenhSanXuatModel");
        $this->ctlsx = $this->model("ChiTietLSXModel");
        $this->ttsx = $this->model("ThucTeSanXuatModel");
        $this->ctcd = $this->model("ChiTietCongDoanModel");
    }

    function SayHi()
    {

        $this->view(
            "Admin",
            [

                "Page" => "quytrinhsanxuat/home",
                // "listMaterials" => $this->mt->getListMaterials(),
            ]
        );
    }
    function CongDoanCat()
    {
        $listLenhSX = $this->ctcd->getChiTietCongDoan(1);
        $this->view(
            "Admin",
            [

                "Page" => "quytrinhsanxuat/congdoancat",
                "listLenhSX" => $listLenhSX,
            ]
        );
    }
    function ChiTietLenh($id_lsx, $id_congdoan)
    {
        $listLenhSX = $this->ctlsx->getChiTietLenhTheoCongDoan($id_congdoan, $id_lsx);
        $this->view(
            "Admin",
            [

                "Page" => "quytrinhsanxuat/chitietLenh",
                "listLenhSX" => $listLenhSX,
            ]
        );
    }
    function CongDoanMay()
    {
        $listLenhSX = $this->ctcd->getChiTietCongDoan(2);
        $this->view(
            "Admin",
            [

                "Page" => "quytrinhsanxuat/congdoanmay",
                "listLenhSX" => $listLenhSX,
            ]
        );
    }
    function CongDoanHoanThien()
    {
        $listLenhSX = $this->ctcd->getChiTietCongDoan(3);
        $this->view(
            "Admin",
            [

                "Page" => "quytrinhsanxuat/congdoanhoanthien",
                "listLenhSX" => $listLenhSX,
            ]
        );
    }
    function ThucTeSanXuat($id_ctlsx)
    {
        $listTTSX = $this->ttsx->getListTTSX($id_ctlsx);
        if (isset($_POST['addTTSX'])) {
            $date_start = $_POST['ngaybt'];
            $date_end = $_POST['ngaykt'];
            $quantity = $_POST['soluonght'];
            $kq = $this->ttsx->insertTTSX($id_ctlsx, $date_start, $date_end, $quantity);


            $this->ctlsx->updateSoLuongHoanThanh($id_ctlsx, $quantity);
            $listTTSX = $this->ttsx->getListTTSX($id_ctlsx);
        }
        $this->view(
            "Admin",
            [

                "Page" => "quytrinhsanxuat/thuctesanxuat",
                "listTTSX" => $listTTSX,
            ]
        );
    }
    function CapNhaTrangThaiCTLSX()
    {
        $newStatus = $_POST['newStatus'];
        $id = $_POST['id'];
        $kq = $this->ctlsx->updateStatus($newStatus, $id);
        echo $kq;
    }
    function QuytrinhSX()
    {

        $this->view(
            "Admin",
            [
                "Page" => "quytrinhsanxuat/quytrinhsanxuat",
                // "listKho" => $this->kho->getListKho(),

            ]
        );
    }
}
