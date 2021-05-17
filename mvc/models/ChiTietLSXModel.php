<?php
class ChiTietLSXModel extends DB
{
    function insertCTLSX($id_lenh, $id_material, $soluongcan, $soluonghoanthanh, $soluongconthieu)
    {
        $sql = "INSERT INTO `chitietlenhsanxuat`(`id_lenh`, `id_material`, `soluongcan`, `soluonghoanthanh`, `soluongconthieu`) VALUES ('$id_lenh','$id_material','$soluongcan','$soluonghoanthanh','$soluongconthieu')";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getChiTietLenhByID($id_lenh)
    {
        $sql = "SELECT chitietlenhsanxuat.*,materials.name_material,congdoan.id_congdoan FROM `chitietlenhsanxuat`,materials,congdoan WHERE id_lenh='$id_lenh' and chitietlenhsanxuat.id_material=materials.id_material AND congdoan.id_congdoan=materials.id_congdoan";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getChiTietLenhByCD($id_lenh)
    {
        $sql = "SELECT chitietlenhsanxuat.*,materials.name_material,congdoan.id_congdoan FROM `chitietlenhsanxuat`,materials,congdoan WHERE id_lenh='$id_lenh' and chitietlenhsanxuat.id_material=materials.id_material AND congdoan.id_congdoan=materials.id_congdoan GROUP BY congdoan.id_congdoan";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getChiTietLenhTheoCongDoan($id_congdoan, $id_lenh)
    {
        $sql = "SELECT chitietlenhsanxuat.*,materials.name_material from materials,chitietlenhsanxuat WHERE materials.id_congdoan='$id_congdoan' and chitietlenhsanxuat.id_material=materials.id_material
        and chitietlenhsanxuat.id_lenh='$id_lenh'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function updateSoLuongHoanThanh($id_ctlenh, $quantity)
    {
        $sql = "UPDATE `chitietlenhsanxuat` SET soluonghoanthanh=soluonghoanthanh + '$quantity', soluongconthieu= soluongcan - soluonghoanthanh WHERE id_ctlsx='$id_ctlenh'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }

    function getTienDo($id_lenh)
    {
        $sql = "SELECT chitietlenhsanxuat.id_ctlsx,chitietlenhsanxuat.id_lenh,chitietlenhsanxuat.id_material,materials.name_material,ROUND((chitietlenhsanxuat.soluonghoanthanh/(chitietlenhsanxuat.soluongcan))*100) AS TienDo from chitietlenhsanxuat,materials where chitietlenhsanxuat.id_material=materials.id_material and chitietlenhsanxuat.id_lenh='$id_lenh'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function updateStatus($status, $id_ctlenh)
    {
        $sql = "UPDATE `chitietlenhsanxuat` SET `status`='$status' WHERE id_ctlsx='$id_ctlenh'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function updateNgay($ngaybd, $ngaykt, $id_ctlenh)
    {
        $sql = "UPDATE `chitietlenhsanxuat` SET `date_start`='$ngaybd',`date_end`='$ngaykt' WHERE id_ctlsx='$id_ctlenh'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
