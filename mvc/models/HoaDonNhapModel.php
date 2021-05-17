<?php
class HoaDonNhapModel extends DB
{

    function insertHĐN($id_pn, $id_material, $quantity)
    {
        $sql = "INSERT INTO `hoadonnhap`(`id_pn`, `id_material`, `quantity`) VALUES ('$id_pn','$id_material','$quantity')";
        $query = mysqli_query($this->con, $sql);
        return json_encode($query);
    }
    function getHĐNByID($id_pn)
    {
        $sql = "SELECT hoadonnhap.id_pn,hoadonnhap.id_material,materials.name_material,hoadonnhap.quantity FROM hoadonnhap,phieunhap,materials where hoadonnhap.id_pn=phieunhap.id_pn and hoadonnhap.id_material=materials.id_material AND hoadonnhap.id_pn='$id_pn'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getHDNByNgay($ngaybd, $ngaykt)
    {
        $sql = "SELECT phieunhap.id_pn,phieunhap.ngaynhap,hoadonnhap.id_hdn,hoadonnhap.id_material, SUM(hoadonnhap.quantity) as Soluongnhap,materials.name_material,materials.donvi FROM `phieunhap`,hoadonnhap,materials WHERE phieunhap.id_pn=hoadonnhap.id_pn and phieunhap.ngaynhap>='$ngaybd' and phieunhap.ngaynhap<='$ngaykt' and materials.id_material=hoadonnhap.id_material GROUP BY hoadonnhap.id_material";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
