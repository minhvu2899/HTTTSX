<?php

class Material extends Controller
{
    public $mt, $pn, $hdn;

    function __construct()
    {
        $this->mt = $this->model("MaterialsModel");
        $this->pn = $this->model("PhieuNhapModel");
        $this->hdn = $this->model("HoaDonNhapModel");
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





    function xoaNCC($id)
    {
        $kq = $this->ncc->xoaNCC($id);
        if ($kq) {
            echo "Thành công";
            echo '<script type="text/javascript">
                window.location = "http://localhost/Minh/NhaCungCap/ListNCC"
           </script>';
        }
    }
    function SearchNCC()
    {
        $this->view(
            "Admin",
            [
                "Page" => "SearchNCC",

            ]
        );
    }




    function Loc($loai)
    {

        if ($loai === "dang-xu-li") {
            $_SESSION['loctt'] = 1;
            $kq = $this->dh->Loc(1);
        } elseif ($loai === "da-xu-li") {
            $_SESSION['loctt'] = 2;
            $kq = $this->dh->Loc(2);
        } elseif ($loai == "dang-lay-hang") {
            $_SESSION['loctt'] = 3;
            $kq = $this->dh->Loc(3);
        } elseif ($loai == "dang-giao-hang") {
            $_SESSION['loctt'] = 4;
            $kq = $this->dh->Loc(4);
        } elseif ($loai == "da-nhan-hang") {
            $_SESSION['loctt'] = 5;
            $kq = $this->dh->Loc(5);
        } elseif ($loai == "da-huy") {
            $_SESSION['loctt'] = 6;
            $kq = $this->dh->Loc(6);
        } elseif ($loai == "tat-ca") {
            $_SESSION['loctt'] = 0;
            $kq = $this->dh->getListDH();
        }
        $this->view(
            "Admin",
            [
                "Page" => "ListDonHang",
                "ListDH" => $kq,

            ]
        );
    }
}
