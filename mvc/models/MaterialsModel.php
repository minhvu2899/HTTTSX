<?php
class MaterialsModel extends DB
{
    function getListMaterials()
    {

        $sql = "SELECT * FROM materials";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getListMaterialsDM()
    {

        $sql = "SELECT * FROM materials where type!=0";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getListMaterialsSP()
    {

        $sql = "SELECT * FROM materials where type='2'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getSoLuongTonByID($id)
    {
        $sql = "SELECT materials.tonthucte FROM materials where id_material='$id'";
        $query = mysqli_query($this->con, $sql);
        return mysqli_fetch_row($query);
    }
    function updateTonKho($id_material, $quantity)
    {
        $sql = "UPDATE `materials` SET tonlithuyet=tonlithuyet + '$quantity',tonthucte=quantity-tonlithuyet WHERE id_material='$id_material'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
