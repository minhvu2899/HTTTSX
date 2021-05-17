<?php
class YeuCauSanXuat extends Controller
{
    public $sp, $yc, $mt;
    function __construct()
    {

        $this->yc = $this->model("YeuCauSanXuatModel");
        $this->mt = $this->model("MaterialsModel");
        $this->dh = $this->model("DonHangModel");
    }
    function SayHi()
    {
        // $kq = $this->ncc->getListNCC();


        $listYeuCau = $this->yc->getListYeuCau();
        $this->view(
            "Admin",
            [
                "Page" => "yeucausanxuat/yeucausanxuat",
                "listMaterials" => $this->mt->getListMaterials(),
                "listYeuCau" => $listYeuCau,

            ]
        );
    }
    function addYeuCau()
    {
        if (isset($_POST['addYeuCau'])) {
            $id_product = $_POST['sp'];
            $ngay_ht = $_POST['ngaygiao'];
            $ngay_yc = $_POST['ngayyc'];
            $quantity = $_POST['soluong'];

            $id_dh = $_POST['dh'];
            $kq = $this->yc->insertYCSX($id_dh, $id_product, $ngay_yc, $ngay_ht, $quantity);
            echo $kq;
            // var_dump(1);
            // die();
            if ($kq) {


                echo "Thành công";
                echo '<script type="text/javascript">
                window.location = "https://hethongquanlisanxuat.herokuapp.com/YeuCauSanXuat"
           </script>';
            }
        }
        $listDH = $this->dh->getListDH();
        // print_r($listDH);
        // var_dump(1);
        // die();
        $this->view(
            "Admin",
            [
                "Page" => "yeucausanxuat/addYeuCauSX",
                "listDH" => $listDH,


            ]
        );
    }
}
