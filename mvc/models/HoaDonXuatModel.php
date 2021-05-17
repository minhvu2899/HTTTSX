<?php
class HoaDonXuatModel extends DB
{

    function insertHĐX($id_px, $id_material, $quantity)
    {
        $sql = "INSERT INTO `hoadonxuat`(`id_px`, `id_material`, `quantity`) VALUES ('$id_px','$id_material','$quantity')";
        $query = mysqli_query($this->con, $sql);
        return json_encode($query);
    }
    function getHĐXByID($id_px)
    {
        $sql = "SELECT hoadonxuat.id_hdx,hoadonxuat.id_px,hoadonxuat.id_material,materials.name_material,hoadonxuat.quantity FROM hoadonxuat,phieuxuat,materials where hoadonxuat.id_px=phieuxuat.id_px and hoadonxuat.id_material=materials.id_material AND hoadonxuat.id_px='$id_px'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getHDXByNgay($ngaybd, $ngaykt)
    {
        $sql = "SELECT phieuxuat.id_px,phieuxuat.ngayxuat,hoadonxuat.id_hdx,hoadonxuat.id_material, SUM(hoadonxuat.quantity) as Soluongxuat,materials.name_material,materials.donvi FROM `phieuxuat`,hoadonxuat,materials WHERE phieuxuat.id_px=hoadonxuat.id_px and phieuxuat.ngayxuat>='$ngaybd' and phieuxuat.ngayxuat<='$ngaykt' and materials.id_material=hoadonxuat.id_material GROUP BY hoadonxuat.id_material";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
