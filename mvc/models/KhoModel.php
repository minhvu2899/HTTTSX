<?php
class KhoModel extends DB
{

    function insertKho($id_nv, $ngaynhap)
    {
        $sql = "INSERT INTO `phieunhap`(`id_nv`, `ngaynhap`) VALUES ('$id_nv','$ngaynhap')";
        $query = mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
        mysqli_insert_id($this->con);
    }
    function getListKho()
    {
        $sql = "SELECT * FROM kho";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getTonKho()
    {
        $sql = "SELECT K.nhap,(soluongnhap-IFNULL(soluongxuat,0)) as TonKHO FROM (SELECT * FROM (SELECT * FROM (SELECT hoadonnhap.id_material as nhap, hoadonxuat.id_material as xuat from hoadonnhap LEFT JOIN hoadonxuat ON hoadonxuat.id_material=hoadonnhap.id_material GROUP BY nhap) as A,(SELECT hoadonnhap.id_material as x,SUM(hoadonnhap.quantity) as soluongnhap from hoadonnhap GROUP BY x)as N WHERE A.nhap=N.x) as M LEFT JOIN (SELECT hoadonxuat.id_material as y,SUM(hoadonxuat.quantity) as soluongxuat from hoadonxuat GROUP BY y) as X ON M.xuat=X.y) as K";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getTonKhoByNgay($ngaybd, $ngaykt)
    {
        $sql = "SELECT  * FROM (SELECT  phieunhap.id_pn,phieunhap.ngaynhap,hoadonnhap.id_hdn,hoadonnhap.id_material AS idn, SUM(hoadonnhap.quantity) as Soluongnhap,materials.name_material,materials.donvi FROM `phieunhap`,hoadonnhap,materials WHERE phieunhap.id_pn=hoadonnhap.id_pn and phieunhap.ngaynhap>='$ngaybd' and phieunhap.ngaynhap<='$ngaykt' and materials.id_material=hoadonnhap.id_material GROUP BY hoadonnhap.id_material) AS nhap LEFT JOIN (SELECT phieuxuat.id_px,phieuxuat.ngayxuat,hoadonxuat.id_hdx,hoadonxuat.id_material AS idx, SUM(hoadonxuat.quantity) as Soluongxuat,materials.name_material,materials.donvi FROM `phieuxuat`,hoadonxuat,materials WHERE phieuxuat.id_px=hoadonxuat.id_px and phieuxuat.ngayxuat>='$ngaybd' and phieuxuat.ngayxuat<='$ngaykt' and materials.id_material=hoadonxuat.id_material GROUP BY hoadonxuat.id_material)AS xuat ON  xuat.idx=nhap.idn UNION SELECT * FROM (SELECT  phieunhap.id_pn,phieunhap.ngaynhap,hoadonnhap.id_hdn,hoadonnhap.id_material AS idn, SUM(hoadonnhap.quantity) as Soluongnhap,materials.name_material,materials.donvi FROM `phieunhap`,hoadonnhap,materials WHERE phieunhap.id_pn=hoadonnhap.id_pn and phieunhap.ngaynhap>='$ngaybd' and phieunhap.ngaynhap<='$ngaykt' and materials.id_material=hoadonnhap.id_material GROUP BY hoadonnhap.id_material) as nhap RIGHT JOIN (SELECT phieuxuat.id_px,phieuxuat.ngayxuat,hoadonxuat.id_hdx,hoadonxuat.id_material AS idx, SUM(hoadonxuat.quantity) as Soluongxuat,materials.name_material,materials.donvi FROM `phieuxuat`,hoadonxuat,materials WHERE phieuxuat.id_px=hoadonxuat.id_px and phieuxuat.ngayxuat>='$ngaybd' and phieuxuat.ngayxuat<='$ngaykt' and materials.id_material=hoadonxuat.id_material GROUP BY hoadonxuat.id_material)AS xuat ON nhap.idn=xuat.idx";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }

    function updateQuantityTon($id_material, $quantity)
    {
        $sql = "UPDATE `materials` SET quantity =$quantity,tonthucte=quantity-tonlithuyet WHERE `materials`.`id_material` = '$id_material'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function updateQuantityTonLiThuyet($id_material, $quantity)
    {
        $sql = "UPDATE `materials` SET tonlithuyet= tonlithuyet- '$quantity',tonthucte=quantity-tonlithuyet WHERE `materials`.`id_material` = '$id_material'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
