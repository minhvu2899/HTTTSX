<?php
class Users extends Controller
{
    public $m, $dh;
    function __construct()
    {
        $this->m = $this->model("User");
        $this->dh = $this->model("DonHangModel");
    }
    function SayHi()
    {
        $this->Profile();
        if (isset($_POST['updateprofile']) && isset($_SESSION['user'])) {
            $this->CapNhatProfile();
        }

        // $this->view(
        //     "aodep",
        //     [

        //         "Page"=>"profile",
        //         // "SV"=>$m->SinhVien()
        //     ]);

    }
    function Profile()
    {

        if (isset($_SESSION['user'])) {
            $kq = $this->m->chitietUser($_SESSION['user'][1]);
            $_SESSION['user'] = $kq;
            $this->view(
                "User",
                [

                    "Page" => "profile",
                    "User" => $kq
                ]
            );
        } else {
            echo '<script type="text/javascript">
                window.location = "http://localhost/Minh/"
           </script>';
        }
    }
    function XoaUser($id)
    {
        $this->m->XoaUser($id);
        header('location: https://hethongquanlisanxuat.herokuapp.com/Admin/QLNV');
    }
    function CapNhatProfile()
    {
        if (isset($_POST['updateprofile'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            $username = $_SESSION['user'][1];
            if (isset($_FILES['img'])) {
                $img = $_FILES['img'];
                $file_name = $img['name'];
                move_uploaded_file($img['tmp_name'], "./public/images/$file_name");
            }
            // echo "<script>alert($img)</script>";
            $kq = $this->m->updateUser($username, $name, $email, $sdt, $diachi, $file_name);
            if ($kq) {
                echo "Thành công";
                $_SESSION['updateUser'] = "Bạn đã cập nhật thông tin thành công";
                $this->Profile();
            } else {
                echo "Thất bại";
            }
        }
    }
    function DoiMatKhau()
    {

        $this->view(
            "User",
            [

                "Page" => "doimatkhau",
                // "SV"=>$m->SinhVien()
            ]
        );
        if (isset($_POST['updatePassword']) && isset($_SESSION['user'])) {
            $pass_old = $_POST['password_old'];
            $pass_new = $_POST['password_new'];
            $repass = $_POST['repassword'];
            $user = $this->m->chitietUser($_SESSION['user'][1]);
            if (md5($pass_old) == $user[2]) {
                if ($repass != $pass_new) {
                    echo "<script>alert('Mật khẩu không khớp')</script>";
                } else {
                    $repass = md5($pass_new);
                    if ($this->m->DoiMatKhau($_SESSION['user'][0], $repass)) {
                        echo "<script>alert('Đổi mật khẩu thành công')</script>";
                    }
                }
            }
        }
    }
}
