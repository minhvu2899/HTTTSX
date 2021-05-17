<?php
class ChiTietDonHangModel extends DB
{

    function getListProductById($id_dh)
    {
        $sql = "SELECT chitietdonhang.id_ctdh,chitietdonhang.id_dh,materials.id_material,materials.name_material,chitietdonhang.quantity,materials.donvi FROM chitietdonhang,donhang,materials WHERE chitietdonhang.id_dh=donhang.id_dh and chitietdonhang.id_material=materials.id_material and donhang.status!=1 and chitietdonhang.id_dh='$id_dh'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function insertChiTietDH($id_dh, $id_material, $quantity)
    {
        $sql = "INSERT INTO `chitietdonhang`(`id_dh`, `id_material`,`quantity`) VALUES ('$id_dh','$id_material','$quantity')";
        $query = mysqli_query($this->con, $sql);
        return json_encode($query);
    }
    function getChiTietDHByID($id)
    {
        $sql = "SELECT chitietdonhang.*,materials.name_material,materials.donvi FROM `chitietdonhang`,materials WHERE chitietdonhang.id_material=materials.id_material and chitietdonhang.id_dh='$id'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
