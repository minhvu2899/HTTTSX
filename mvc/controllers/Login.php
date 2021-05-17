<?php
class Login extends Controller
{
    public $user;
    public function __construct()
    {
        $this->user = $this->model("User");
    }
    function SayHi()
    {
        $this->LoginUser();
        $this->view(
            "Login",
            [

                "Page" => "login",
                // "SV"=>$m->SinhVien()
            ]
        );
    }
    function LoginUser()
    {

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = trim($_POST['password']);
            if (empty($username)) {
                $_SESSION['errUsername'] = "Vui lòng không để trống username";
                return;
            }

            if (empty($password)) {
                $_SESSION['errPassword'] = "Vui lòng không để trống password";
                return;
            }

            // echo $username;
            // echo $password;
            if ($this->user->checkUsername($username) == 0) {
                echo "<script>alert('Thông tin không đúng! Vui lòng thử lại')</script>";

                echo '<script type="text/javascript">
                window.location = "https://hethongquanlisanxuat.herokuapp.com/"
           </script>';
            } else {
                $user = $this->user->chitietUser($username);
                echo $password;
                echo "<br>";
                // echo $user[2];
                //  var_dump(password_verify("123456",$user[2]));
                //  die();

                if (md5($password) == $user[6]) {

                    if ($this->user->checkQuyen($username) == 1) {

                        $_SESSION['admin'] = $user;
                        header("location:https://hethongquanlisanxuat.herokuapp.com/Admin/");
                    } else if ($this->user->checkQuyen($username) == 2) {

                        $_SESSION['nvk'] = $user;
                        // $_SESSION['shipper'] = $user[0];
                        header("location:https://hethongquanlisanxuat.herokuapp.com/QuanLiKho");
                    } else if ($this->user->checkQuyen($username) == 3) {
                        $_SESSION['nvsx'] = $user;
                        header("location:https://hethongquanlisanxuat.herokuapp.com/QuanLiSX");
                    }
                } else {
                    echo "Thất bại";
                    $_SESSION['errLogin'] = "Mật khẩu bạn nhập chưa đúng vui lòng thử lại!";
                }
                // $kq=$this->user->checkLogin( $username,$password);
                // // echo $tong." ";
                // // $quyen=$this->user->checkQuyen($username);
                // // echo $quyen;

                // if($kq>0){
                //     if($this->user->checkQuyen($username)==1){
                //         $user=$this->user->chitietUser($username);    
                //    $_SESSION['admin']=$user;
                //     header("location:http://localhost/Minh/Admin/");
                //     }
                //     else{
                //         $user=$this->user->chitietUser($username);
                //         $_SESSION['user']=$user;
                //         header("location:http://localhost/Minh/");
                //     }
                // }
                // else{
                //     $_SESSION['errLogin']="Mật khẩu bạn nhập chưa đúng vui lòng thử lại!";
                // }
            }
        }
    }
    function Logout()
    {
        unset($_SESSION['admin']);
        unset($_SESSION['nvk']);
        unset($_SESSION['nvsx']);
        // session_destroy();
        header("location:https://hethongquanlisanxuat.herokuapp.com/");
    }
}
