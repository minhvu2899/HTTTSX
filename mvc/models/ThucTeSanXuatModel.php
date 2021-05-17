<?php
class ThucTeSanXuatModel extends DB
{

    function insertTTSX($id_ctlsx, $date_start, $date_end, $quantity)
    {
        $sql = "INSERT INTO `thuctesanxuat`( `id_ctlsx`, `date_start`, `date_end`, `quantity`) VALUES ('$id_ctlsx','$date_start','$date_end','$quantity')";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getListTTSX($id_lsx)
    {
        $sql = "SELECT * FROM thuctesanxuat where id_ctlsx='$id_lsx'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
