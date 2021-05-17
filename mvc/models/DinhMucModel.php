<?php
class DinhMucModel extends DB
{
    function getListDinhMuc()
    {

        $sql = "SELECT DISTINCT * FROM (SELECT dinhmuc.id_parent,materials.name_material from dinhmuc,materials WHERE dinhmuc.id_parent=materials.id_material)AS bang1,(SELECT dinhmuc.*,materials.name_material,materials.donvi from dinhmuc,materials WHERE dinhmuc.id_material=materials.id_material)AS bang2 WHERE bang1.id_parent=bang2.id_parent";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function insertDinhMuc($id_material, $id_parent, $cd, $quantity)
    {
        $sql = "INSERT INTO `dinhmuc`(`id_material`, `id_parent`,`id_congdoan`, `quantity`) VALUES ('$id_material','$id_parent','$cd','$quantity')";
        $query = mysqli_query($this->con, $sql);
        return json_encode($query);
    }
    function getDinhMucBySoLuong()
    {
        $sql = "SELECT id_material,SUM(quantity) AS SUMS FROM `dinhmuc` GROUP BY id_material";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getParent()
    {
        $sql = "SELECT dinhmuc.id_parent,materials.name_material from dinhmuc,materials WHERE dinhmuc.id_parent=materials.id_material GROUP BY dinhmuc.id_parent";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getDinhMuc()
    {
        $sql = "SELECT * FROM `dinhmuc`"; // ORDER BY `id_parent`  DESC
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getDinhMucByID($id)
    {
        $sql = "SELECT * FROM `dinhmuc` where id_dinhmuc='$id'"; // ORDER BY `id_parent`  DESC
        $query = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_row($query);
        return $row;
    }
    function XoaDinhMuc($id)
    {
        $sql = "DELETE FROM `dinhmuc` WHERE id_dinhmuc='$id'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function UpdateDinhMuc($id, $id_material, $id_parent, $id_congdoan, $quantity)
    {
        $sql = "UPDATE `dinhmuc` SET `id_material`='$id_material',`id_parent`='$id_parent',`id_congdoan`='$id_congdoan',`quantity`='$quantity' WHERE `id_dinhmuc`='$id'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
