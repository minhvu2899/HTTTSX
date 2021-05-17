<?php class KhachHangModel extends DB
{
    public function insertUSer($name, $diachi, $sdt, $email)
    {
        $sql = "INSERT INTO `khachhang`(`name`, `diachi`, `sdt`, `email`) VALUES ('$name','$diachi','$sdt','$email')";
        $query = mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
    }
}
