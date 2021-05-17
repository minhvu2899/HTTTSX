<?php
class DinhMuc extends Controller
{
    public $dm, $mt, $sp;
    function __construct()
    {
        $this->dm = $this->model("DinhMucModel");
        $this->mt = $this->model("MaterialsModel");
        $this->cd = $this->model("CongDoanModel");
    }

    function SayHi()
    {
        $listCD = $this->cd->getCongDoan();
        $listMaterials = $this->mt->getListMaterials();
        $listBOM = $this->dm->getListDinhMuc();
        $listOutPut = $this->mt->getListMaterialsDM();
        $this->view(
            "Admin",
            [


                "Page" => "dinhmuc/dinhmuc",
                "listMaterials" =>  $listMaterials,
                "listBOM" =>  $listBOM,
                "listOutPut" => $listOutPut,
                "listCD" => $listCD
            ]
        );
    }
    function addDinhMuc()
    {

        if (isset($_POST['addDinhMuc'])) {
            $id_parent = $_POST['sp'];
            $id_material = $_POST['vt'];
            $quantity = $_POST['quantity'];
            $cd = $_POST['cd'];
            $kq = $this->dm->insertDinhMuc($id_material, $id_parent, $cd, $quantity);
            echo $kq;
            if ($kq) {


                echo "Thành công";
                echo '<script type="text/javascript">
                window.location = "https://hethongquanlisanxuat.herokuapp.com/DinhMuc"
           </script>';
            }
        }
    }
    function Edit($id)
    {
        if (isset($_POST['editDM'])) {
            $id_material = $_POST['in'];
            $id_parent = $_POST['out'];
            $id_cd = $_POST['cd'];
            $quantity = $_POST['soluong'];
            $kq = $this->dm->UpdateDinhMuc($id, $id_material, $id_parent, $id_cd, $quantity);
            echo $kq;

            header('location: https://hethongquanlisanxuat.herokuapp.com/DinhMuc');
        }
        $listMaterials = $this->mt->getListMaterials();
        $listBOM = $this->dm->getListDinhMuc();
        $listOutPut = $this->dm->getParent();
        $listDM = $this->dm->getDinhMucByID($id);
        $listCD = $this->cd->getCongDoan();
        $this->view(
            "Admin",
            [


                "Page" => "dinhmuc/editDinhMuc",
                "listMaterials" =>  $listMaterials,
                "listBOM" =>  $listBOM,
                "listOutPut" => $listOutPut,
                "listDM" => $listDM,
                "listCD" => $listCD
            ]
        );
    }
    function Xoa($id)
    {
        $kq = $this->dm->XoaDinhMuc($id);
        echo $kq;
        if ($kq) {

            echo '<script type="text/javascript">
                window.location = "https://hethongquanlisanxuat.herokuapp.com/DinhMuc"
           </script>';
        }
    }
}
