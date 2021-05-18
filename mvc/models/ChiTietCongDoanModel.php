<?php
class ChiTietCongDoanModel extends DB
{
    function insertCTCD($id_congdoan, $id_lenh, $ngay)
    {
        $sql = "INSERT INTO `chitietcongdoan`( `id_congdoan`, `id_lenh`,`ngayTao`) VALUES ('$id_congdoan','$id_lenh','$ngay')";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getChiTietCongDoan($id)
    {
        $sql = "SELECT * FROM `chitietcongdoan` where id_congdoan='$id'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function updateStatus($id, $status)
    {
        $sql = "UPDATE `chitietcongdoan` SET `status`='$status' WHERE id_ctcd='$id';";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function checkStatus($id_lenh)
    {
        $sql = "SELECT * FROM `chitietcongdoan` WHERE chitietcongdoan.id_lenh='$id_lenh' and status!=2
        ";
        $query = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($query);
        return $num;
    }
    function checkTonTai($id_lenh)
    {
        $sql = "SELECT * FROM `chitietcongdoan` WHERE chitietcongdoan.id_lenh='$id_lenh'
        ";
        $query = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($query);
        return $num;
    }
}
