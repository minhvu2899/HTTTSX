<?php
class YeuCauSanXuatModel extends DB
{
    function getListYeuCau()
    {

        $sql = "SELECT yeucausanxuat.id_ycsx,materials.id_material,materials.name_material,yeucausanxuat.ngay_yc,yeucausanxuat.ngay_ht,yeucausanxuat.quantity,yeucausanxuat.status FROM yeucausanxuat,materials where yeucausanxuat.id_material=materials.id_material";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function insertYCSX($id_dh, $id_product, $ngay_yc, $ngay_ht, $quantity)
    {
        $sql = "INSERT INTO `yeucausanxuat`( `id_dh`, `id_material`, `ngay_yc`, `ngay_ht`, `quantity`) VALUES ('$id_dh','$id_product','$ngay_yc','$ngay_ht','$quantity')";
        $query = mysqli_query($this->con, $sql);
        return json_encode($query);
    }
    function getVatTuCanSX($id_ycsx)
    {
        $sql = "SELECT yeucausanxuat.id_ycsx,materials.id_material from yeucausanxuat,materials,kehoachvattu WHERE yeucausanxuat.id_ycsx=kehoachvattu.id_ycsx and materials.id_material=kehoachvattu.id_material and materials.type!=0 and yeucausanxuat.id_ycsx='$id_ycsx'  ORDER BY `materials`.`id_material` ASC";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function updateStatus($status, $id_lenh)
    {
        $sql = "UPDATE `yeucausanxuat` SET `status`='$status' WHERE id_ycsx='$id_lenh'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
