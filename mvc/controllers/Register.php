<?php
class Register extends Controller
{
    public $user;
    public function __construct()
    {
        $this->user = $this->model("User");
    }
    function SayHi()
    {
        $this->view(
            "Login",
            [

                "Page" => "register",
                // "SV"=>$m->SinhVien()
            ]
        );
    }

    function RegisterUser()
    {

        if (isset($_POST['register'])) {
            $ten = $this->test_input($_POST['name']);
            $username = $this->test_input($_POST['username']);
            $password = trim($_POST['password']);
            $password = md5($password);
            if (empty($ten)) {
                $_SESSION['errTen'] = "Vui lòng không để trống ten";
                return;
            }
            if (empty($username)) {
                $_SESSION['errUsername'] = "Vui lòng không để trống username";
                return;
            }
            if (empty($password)) {
                $_SESSION['errPassword'] = "Vui lòng không để trống password";
                return;
            }

            if ($this->user->checkUsername($username) == 0) {
                $kq = $this->user->insertUSer($username, $password, $ten);
                if ($kq) {
                    echo '<script type="text/javascript">
                            alert("Bạn đã đăng kí thành công!");
                             </script>';
                    echo '<script type="text/javascript">
                             window.location = "https://hethongquanlisanxuat.herokuapp.com/Login"
                        </script>';
                }
            } else {
                $_SESSION['errRegister'] = "Tên tài khoản đã tồn tại!";
            }
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
