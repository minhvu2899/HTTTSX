<?php
class User extends DB
{

    function XoaUser($id)
    {
        $sql = "DELETE FROM `users` WHERE id='$id'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getAllNV()
    {
        $sql = "select * from users where chucvu>2";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    function getAllKH()
    {
        $sql = "select * from khachhang";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    public function checkQuyen($username)
    {
        $sql = "select * from users where username='$username'";
        $query = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_row($query);
        return $row[8];
    }
    public function checkUsername($username)
    {
        $sql = "select * from users where username='$username'";
        $query = mysqli_query($this->con, $sql);
        $row = mysqli_num_rows($query);
        return $row;
    }
    public function chitietUser($username)
    {
        $sql = "select * from users where username='$username'";
        $query = mysqli_query($this->con, $sql);

        $row = mysqli_fetch_row($query);
        return $row;
    }
    public function chitietUserByID($id)
    {
        $sql = "select * from users where id='$id'";
        $query = mysqli_query($this->con, $sql);

        $row = mysqli_fetch_row($query);
        return $row;
    }
    public function checkLogin($username, $password)
    {
        $sql = "select * from users where username = '$username' and password = '$password'";

        $query = mysqli_query($this->con, $sql);

        $num_rows = mysqli_num_rows($query);
        return json_encode($num_rows);
    }
    public function insertUSer($name, $diachi, $sdt, $email)
    {
        $sql = "INSERT INTO `users`(`name`, `diachi`, `sdt`, `email`, `chucvu`) VALUES ('$name','$diachi','$sdt','$email',2)";
        $query = mysqli_query($this->con, $sql);
        return mysqli_insert_id($this->con);
    }
    public function registerShipper($id, $username, $password, $ten, $sdt, $diachi, $quyen)
    {
        $sql = "INSERT INTO users (id,username,password,ten,sdt,diachi,quyen) values ('$id','$username','$password','$ten','$sdt','$diachi','$quyen')";
        $query = mysqli_query($this->con, $sql);
        return json_encode($query);
    }
    public function updateUser($id, $ten, $email, $sdt, $diachi)
    {
        $sql = "UPDATE `users` SET `name`='$ten',`diachi`='$diachi',`sdt`='$sdt',`email`='$email' WHERE id='$id'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
    public function DoiMatKhau($id, $password_new)
    {
        $sql = "update users set
                
                
               
                password='$password_new'
             
              
                where id='$id'";
        $query = mysqli_query($this->con, $sql);
        return $query;
    }
}
