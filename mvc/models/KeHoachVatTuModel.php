

<?php
class KeHoachVatTuModel extends DB
{

    function insertKHVT($id_ycsx, $id_material, $soluongcan, $soluongthieu)
    {
        $sql = "INSERT INTO `kehoachvattu`( `id_ycsx`, `id_material`, `soluongcan`, `soluongconthieu`) VALUES ('$id_ycsx','$id_material','$soluongcan','$soluongthieu')";
        $query = mysqli_query($this->con, $sql);
        return json_encode($query);
    }
    function getKHVTByID($id_ycsx)
    {
        $sql = "SELECT kehoachvattu.*,materials.id_material,materials.name_material,materials.donvi,materials.type FROM `kehoachvattu`,`materials` WHERE kehoachvattu.id_material=materials.id_material AND kehoachvattu.id_ycsx='$id_ycsx' ORDER BY kehoachvattu.`id_material` ASC";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getVatTuCanSX($id_ycsx)
    {
        $sql = "SELECT kehoachvattu.*,materials.id_material,materials.name_material,materials.donvi,materials.type FROM `kehoachvattu`,`materials` WHERE kehoachvattu.id_material=materials.id_material AND kehoachvattu.id_ycsx='$id_ycsx' and materials.type!=0 ORDER BY kehoachvattu.`id_material` ASC";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }

    function getAllKHVT()
    {
        $sql = "SELECT kehoachvattu.*,materials.id_material,materials.name_material,materials.donvi FROM `kehoachvattu`,`materials` WHERE kehoachvattu.id_material=materials.id_material ORDER BY kehoachvattu.`id_ycsx` ASC";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }

    function updateQuantityPhanBo($id_ycsx, $id_material, $quantity)
    {
        $sql = "UPDATE `kehoachvattu` SET soluongphanbo=soluongphanbo+'$quantity', soluongconthieu=soluongcan-soluongphanbo WHERE id_ycsx='$id_ycsx' AND id_material='$id_material'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function updateQuantityDuocPhanBo($id_ycsx, $id_material, $quantity)
    {
        $sql = "UPDATE `kehoachvattu` SET soluongcan=soluongcan-'$quantity', soluongconthieu=soluongcan-soluongphanbo WHERE id_ycsx='$id_ycsx' AND id_material='$id_material'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function updateQuantityCan($id_ycsx, $id_material, $quantity)
    {
        $sql = "UPDATE `kehoachvattu` SET soluongcan=soluongcan+'$quantity',soluongconthieu=soluongconthieu+'$quantity' WHERE id_ycsx='$id_ycsx' AND id_material='$id_material'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
