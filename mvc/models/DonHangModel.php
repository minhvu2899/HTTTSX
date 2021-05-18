<?php
class DonHangModel extends DB
{


    public function insertDH($id_user, $id_material, $quantity, $ngayNhan)
    {
        $sql = "INSERT INTO `donhang`(`id_user`, `id_material`, `quantity`, `ngayNhan`) VALUES ('$id_user','$id_material','$quantity','$ngayNhan')";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    public function getListDHChuaHT()
    {
        $sql = "SELECT distinct donhang.*,khachhang.name,khachhang.diachi,khachhang.sdt,materials.name_material FROM khachhang,materials,donhang WHERE donhang.id_user= khachhang.id_user AND materials.id_material=donhang.id_material and donhang.status!=2
        ";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    public function editDH($id, $ten, $diachi, $sdt, $email, $soluongnhap)
    {
        $sql = "update nhacungcap set
                ten='$ten',
                diachi='$diachi',
                sdt='$sdt',
                email='$email',
                soluongnhap='$soluongnhap'
                where id='$id'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    public function chitietDH($id)
    {
        $sql = "select * from nhacungcap where id='$id'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    public function getListDH()
    {
        $sql = "SELECT distinct donhang.*,khachhang.name,khachhang.diachi,khachhang.sdt,materials.name_material FROM khachhang,materials,donhang WHERE donhang.id_user= khachhang.id_user AND materials.id_material=donhang.id_material
        ";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    public function getListDHByID($id)
    {
        $sql = "SELECT distinct donhang.*,khachhang.name,khachhang.diachi,khachhang.sdt,materials.name_material FROM khachhang,materials,donhang WHERE donhang.id_user= khachhang.id_user and donhang.id_dh='$id' AND materials.id_material=donhang.id_material
        
        ";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function XoaDH($id)
    {
        $sql = "DELETE from donhang where id_dh='$id'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    public function ThongKeDonHang($status)
    {
        $sql = "SELECT donhang.id_dh,khachhang.name,materials.name_material,donhang.quantity,donhang.ngayNhan,donhang.status FROM donhang,khachhang,materials WHERE donhang.id_user= khachhang.id_user and donhang.id_material=materials.id_material and donhang.status='$status'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    public function updateStatusByID($status, $id)
    {
        $sql = "UPDATE `donhang` SET `status`='$status' WHERE id_dh='$id';";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    public function UpdateStatus($id)
    {
        $sql = "UPDATE `donhang` SET `status`='2' WHERE id_dh='$id';";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
