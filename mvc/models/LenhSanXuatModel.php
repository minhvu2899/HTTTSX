<?php
class LenhSanXuatModel extends DB
{
    function getIDByYC($id)
    {
        $sql = "SELECT * from lenhsanxuat where id_ycsx='$id'";
        $query = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_row($query);
        return $row[0];
    }
    function getListLSX()
    {
        $sql = "SELECT * from lenhsanxuat";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getListYeuCau()
    {

        $sql = "SELECT yeucausanxuat.id_ycsx,materials.id_material,materials.name_material,yeucausanxuat.ngay_yc,yeucausanxuat.ngay_ht,yeucausanxuat.quantity,yeucausanxuat.status FROM yeucausanxuat,materials where yeucausanxuat.id_material=materials.id_material";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function insertLenhSX($id_ycsx, $ngay)
    {
        $sql = "INSERT INTO `lenhsanxuat`( `id_ycsx`, `ngayTao`) VALUES ('$id_ycsx','$ngay')";
        $query = mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
    }
    function getLenhSXByID($id_ycsx)
    {
        $sql = "SELECT lenhsanxuat.*,congdoan.name from materials,congdoan,lenhsanxuat WHERE materials.type!=0 and materials.id_congdoan=congdoan.id_congdoan and lenhsanxuat.id_material=materials.id_material AND lenhsanxuat.id_ycsx ='$id_ycsx'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }

    function getLSXTheoCongDoan($id_congdoan)
    {
        $sql = "SELECT distinct lenhsanxuat.* from lenhsanxuat,chitietlenhsanxuat,materials WHERE lenhsanxuat.id_lenh=chitietlenhsanxuat.id_lenh and materials.id_material=chitietlenhsanxuat.id_material and materials.id_congdoan='$id_congdoan' and lenhsanxuat . status = 1";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function updateStatus($status, $id_lenh)
    {
        $sql = "UPDATE `lenhsanxuat` SET `status`='$status' WHERE id_lenh='$id_lenh'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getLenhHoanThanh()
    {
        $sql = "SELECT lenhsanxuat.id_lenh,materials.name_material FROM lenhsanxuat,yeucausanxuat,materials WHERE lenhsanxuat.id_ycsx=yeucausanxuat.id_ycsx and yeucausanxuat.id_material=materials.id_material and lenhsanxuat.status=2";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getMaterialByLenh($id_lenh)
    {
        $sql = "SELECT chitietlenhsanxuat.id_material,materials.name_material,chitietlenhsanxuat.soluongcan from chitietlenhsanxuat,lenhsanxuat,yeucausanxuat,materials WHERE chitietlenhsanxuat.id_lenh=lenhsanxuat.id_lenh and lenhsanxuat.id_ycsx=yeucausanxuat.id_ycsx and yeucausanxuat.id_material= chitietlenhsanxuat.id_material and chitietlenhsanxuat.id_lenh='$id_lenh' and materials.id_material=yeucausanxuat.id_material";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
