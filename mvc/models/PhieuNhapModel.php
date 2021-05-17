<?php
class PhieuNhapModel extends DB
{

    function insertPhieuNhap($id_nv, $ngaynhap)
    {
        $sql = "INSERT INTO `phieunhap`(`id_nv`, `ngaynhap`) VALUES ('$id_nv','$ngaynhap')";
        $query = mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
    }
    function getListPN()
    {
        $sql = "SELECT * FROM phieunhap";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
