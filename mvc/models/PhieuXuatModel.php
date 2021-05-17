<?php
class PhieuXuatModel extends DB
{

    function insertPhieuXuat($id_dh, $id_ycsx, $type, $ngayxuat)
    {
        $sql = "INSERT INTO `phieuxuat`( `id_dh`, `id_ycsx`, `type`, `ngayxuat`) VALUES ('$id_dh','$id_ycsx','$type','$ngayxuat')";
        $query = mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
    }
    function getListPX()
    {
        $sql = "SELECT * FROM phieuxuat";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
