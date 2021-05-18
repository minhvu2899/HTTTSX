<?php
class KeHoachVatTu extends Controller
{
    public $sp, $yc, $dm, $khvt, $mt;
    function __construct()
    {
        $this->dm = $this->model("DinhMucModel");
        $this->yc = $this->model("YeuCauSanXuatModel");
        $this->khvt = $this->model("KeHoachVatTuModel");
        $this->mt = $this->model("MaterialsModel");
    }
    function SayHi()
    {
        $listYeuCau = $this->yc->getListYeuCau();
        $listKHVT = $this->khvt->getAllKHVT();
        $this->view(
            "Admin",
            [
                "Page" => "kehoachvattu/kehoachvattu",

                "listYeuCau" => $listYeuCau,
                // "listKHVT" => $listKHVT,

            ]
        );
    }

    function addKHVT($id_ycsx, $id_material, $quantity)
    {
        $name = "ycsx$id_ycsx";
        // unset($_SESSION[$name]);
        if (isset($_SESSION[$name])) {
            header("Location: https://hethongquanlisanxuat.herokuapp.com/KeHoachVatTu/xemKHVT/$id_ycsx");
        } else {
            $listDinhMuc = $this->dm->getDinhMuc();
            $mangDinhMuc = array();
            $id_parent = array($id_material);
            $id_parent_1 = array();
            $id_parent_2 = array();
            $check = array();
            while ($row = mysqli_fetch_assoc($listDinhMuc)) {
                array_push($mangDinhMuc, $row);
            }
            foreach ($mangDinhMuc as $key => $value) {
                if (in_array($value['id_parent'], $id_parent)) {
                    echo $value['id_material'];
                    echo gettype($value['quantity']);
                    if (!in_array($value['id_material'], $check)) {
                        array_push($check, $value['id_material']);
                        $kq = $this->khvt->insertKHVT($id_ycsx, $value['id_material'], $value['quantity'] * $quantity, $value['quantity'] * $quantity);
                        echo $kq;
                    } else {
                        $kq = $this->khvt->updateQuantityCan($id_ycsx, $value['id_material'], $value['quantity'] * $quantity, $value['quantity'] * $quantity);
                        echo $kq;
                    }
                    $id_parent_1[$value['id_material']] = $value['id_material'];
                }
            }
            foreach ($mangDinhMuc as $value) {
                if (in_array($value['id_parent'], $id_parent_1)) {
                    echo $value['id_material'];
                    if (!in_array($value['id_material'], $check)) {
                        array_push($check, $value['id_material']);
                        $kq = $this->khvt->insertKHVT($id_ycsx, $value['id_material'], $value['quantity'] * $quantity, $value['quantity'] * $quantity);
                        echo $kq;
                    } else {
                        $kq = $this->khvt->updateQuantityCan($id_ycsx, $value['id_material'], $value['quantity'] * $quantity, $value['quantity'] * $quantity);
                        echo $kq;
                    }
                    $id_parent_2[$value['id_material']] = $value['id_material'];
                }
            }
            foreach ($mangDinhMuc as $value) {
                if (in_array($value['id_parent'], $id_parent_2)) {
                    echo $value['id_material'];
                    if (!in_array($value['id_material'], $check)) {
                        array_push($check, $value['id_material']);
                        $kq = $this->khvt->insertKHVT($id_ycsx, $value['id_material'], $value['quantity'] * $quantity, $value['quantity'] * $quantity);
                        echo $kq;
                    } else {
                        $kq = $this->khvt->updateQuantityCan($id_ycsx, $value['id_material'], $value['quantity'] * $quantity, $value['quantity'] * $quantity);
                        echo $kq;
                    }
                }
            }
            $_SESSION[$name] = "true";
            $kq = $this->khvt->insertKHVT($id_ycsx, $id_material,  $quantity,  $quantity);
            echo "Thành kế hoạch vật tư thành công";
            echo `<script type="text/javascript">
            window.location = "https://hethongquanlisanxuat.herokuapp.com/KeHoachVatTu/xemKHVT/$id_ycsx"
       </script>`;
            // header("Location: https://hethongquanlisanxuat.herokuapp.com/KeHoachVatTu/xemKHVT/$id_ycsx");
        }
    }
    function xemKHVT($id_ycsx)
    {
        $khvt = $this->khvt->getKHVTByID($id_ycsx);
        $this->view(
            "Admin",
            [
                "Page" => "kehoachvattu/kehoachvattu",
                "listKHVT" => $khvt,


            ]
        );
    }
    function phanbovattu($id_ycsx, $id_material)
    {
        if (isset($_POST['pb'])) {
            $quantity = $_POST['slpb'];
        }


        $kq = $this->khvt->updateQuantityPhanBo($id_ycsx, $id_material, $quantity);
        $kq1 = $this->mt->updateTonKho($id_material, $quantity);


        echo $kq;

        $id_parent = array($id_material);
        $id_parent_1 = array();
        $id_parent_2 = array();
        $listDinhMuc = $this->dm->getDinhMuc();
        $mangDinhMuc = array();

        while ($row = mysqli_fetch_array($listDinhMuc)) {
            array_push($mangDinhMuc, $row);
        }
        foreach ($mangDinhMuc as $key => $value) {
            if (in_array($value['id_parent'], $id_parent)) {

                $quantity_pb = $quantity * $value[4];
                $kq = $this->khvt->updateQuantityDuocPhanBo($id_ycsx, $value[1], $quantity_pb);

                $id_parent_1[$value['id_material']] = $value['id_material'];
                echo $kq;
            }
        }
        foreach ($mangDinhMuc as $value) {
            if (in_array($value['id_parent'], $id_parent_1)) {
                $quantity_pb = $quantity * $value[4];
                $kq = $this->khvt->updateQuantityDuocPhanBo($id_ycsx, $value[1], $quantity_pb);

                $id_parent_2[$value['id_material']] = $value['id_material'];
                echo $kq;
            }
        }
        foreach ($mangDinhMuc as $value) {
            if (in_array($value['id_parent'], $id_parent_2)) {
                $quantity_pb = $quantity * $value[4];
                $kq = $this->khvt->updateQuantityDuocPhanBo($id_ycsx, $value[1], $quantity_pb);

                echo $kq;
            }
        }
        header("Location: https://hethongquanlisanxuat.herokuapp.com/KeHoachVatTu/xemKHVT/$id_ycsx");
    }
}
