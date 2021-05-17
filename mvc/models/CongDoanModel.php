<?php
class CongDoanModel extends DB
{

    function getCongDoan()
    {
        $sql = "SELECT * FROM `congdoan`"; // ORDER BY `id_parent`  DESC
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
}
