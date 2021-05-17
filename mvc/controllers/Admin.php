<?php
class Admin extends Controller
{
    public $user, $dh, $kho;
    function __construct()
    {
        $this->user = $this->model("User");
        $this->dh = $this->model("DonHangModel");
        $this->kho = $this->model("KhoModel");
        $this->mt = $this->model("MaterialsModel");
        $this->ctdh = $this->model("ChiTietDonHangModel");
        $this->hdn = $this->model("HoaDonNhapModel");
        $this->hdx = $this->model("HoaDonXuatModel");
        $this->yc = $this->model("YeuCauSanXuatModel");
        $this->kh = $this->model("KhachHangModel");
    }

    function SayHi()
    {
        // $kq = $this->ncc->getListNCC();
        if (!isset($_SESSION['admin'])) {
            session_start();
            header('location: https://hethongquanlisanxuat.herokuapp.com/');
        }

        $this->view(
            "Admin",
            [
                "Page" => "home",
                // "ListNCC" => $kq,

            ]
        );
    }
    function Profile()
    {

        if (isset($_SESSION['admin'])) {
            $kq = $this->m->chitietUser($_SESSION['admin'][1]);
            $this->view(
                "Admin",
                [

                    "Page" => "edit",
                    "User" => $kq
                ]
            );
        }
        //     else{
        //         echo '<script type="text/javascript">
        //         window.location = "http://localhost/Minh/"
        //    </script>';
        //     }


    }
    function CapNhatProfile()
    {
        if (isset($_POST['updateprofile']) && isset($_SESSION['admin'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            $username = $_SESSION['admin'][1];
            if (isset($_FILES['img'])) {
                $img = $_FILES['img'];
                $file_name = $img['name'];
                move_uploaded_file($img['tmp_name'], "./public/images/$file_name");
            }

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
    function addYeuCau($id)
    {

        if (isset($_POST['addYeuCau'])) {
            $id_product = $_POST['sp'];
            $ngay_ht = $_POST['ngaygiao'];
            $ngay_yc = $_POST['ngayyc'];
            $quantity = $_POST['soluong'];

            $id_dh = $_POST['dh'];
            $kq = $this->yc->insertYCSX($id_dh, $id_product, $ngay_yc, $ngay_ht, $quantity);
            echo $kq;
            // var_dump(1);
            // die();
            if ($kq) {


                echo "Thành công";
                echo '<script type="text/javascript">
                window.location = "https://hethongquanlisanxuat.herokuapp.com/YeuCauSanXuat"
           </script>';
            }
        }
        $dh = $this->dh->getListDHByID($id);
        $this->view(
            "Admin",
            [
                "Page" => "yeucausanxuat/addYeuCauSX",
                "dh" => $dh,

            ]
        );
    }
    function QLNV()
    {
        if (!isset($_SESSION['admin'])) {
            session_start();
            header('location: https://hethongquanlisanxuat.herokuapp.com/');
        }
        $listNV = $this->user->getAllNV();
        $this->view(
            "Admin",
            [
                "Page" => "employee",
                "listNV" => $listNV,

            ]
        );
    }
    function QLDonHang()
    {
        if (!isset($_SESSION['admin'])) {
            session_start();
            header('location: https://hethongquanlisanxuat.herokuapp.com/');
        }
        $listDH = $this->dh->getListDH();
        $this->view(
            "Admin",
            [
                "Page" => "donhang/donhang",
                "listDH" => $listDH,

            ]
        );
    }
    function QuanLiKho()
    {
        if (!isset($_SESSION['admin'])) {
            session_start();
            header('location: https://hethongquanlisanxuat.herokuapp.com/');
        }
        $this->view(
            "Admin",
            [
                "Page" => "kho/kho",
                "listKho" => $this->kho->getListKho(),

            ]
        );
    }
    function QuytrinhSX()
    {
        if (!isset($_SESSION['admin'])) {
            session_start();
            header('location: https://hethongquanlisanxuat.herokuapp.com/');
        }
        $this->view(
            "Admin",
            [
                "Page" => "quytrinhsanxuat/quytrinhsanxuat",
                // "listKho" => $this->kho->getListKho(),

            ]
        );
    }
    function EditProfileNV($id)
    {
        if (!isset($_SESSION['admin'])) {
            session_start();
            header('location: https://hethongquanlisanxuat.herokuapp.com/');
        }
        $user = $this->user->chitietUserByID($id);
        if (isset($_POST['updateprofile'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['address'];
            $kq = $this->user->updateUser($id, $name, $email, $sdt, $diachi);
            if ($kq) {
                header("Location: https://hethongquanlisanxuat.herokuapp.com/Admin/QLNV");
            }
        }
        $this->view(
            "Admin",
            [
                "Page" => "editProfile",
                "user" => $user,

            ]
        );
    }
    function ThongKe()
    {
        $this->view(
            "Admin",
            [
                "Page" => "thongke/thongke",
                // "listKho" => $this->kho->getListKho(),

            ]
        );
    }
    function ThongKeTonKho()
    {
        $mangTonKho = [];
        if (isset($_POST['xemTK'])) {
            $ngaybd = $_POST['ngaybd'];
            $ngaykt = $_POST['ngaykt'];
            echo $ngaybd;
            echo $ngaykt;
            $listHDN = $this->kho->getTonKhoByNgay($ngaybd, $ngaykt);
            // $listHDX = $this->hdx->getHDXByNgay($ngaybd, $ngaykt);
            // $mangHDN = [];
            // $mangHDX = [];
            // while ($row1 = mysqli_fetch_array($listHDN)) {
            //     array_push($mangHDN, $row1);
            // }
            // while ($row = mysqli_fetch_array($listHDX)) {
            //     array_push($mangHDX, $row);
            // }

            while ($row = mysqli_fetch_array($listHDN)) {
                $mang = [];

                if ($row['idn'] != NULL && $row['idx'] != NULL) {
                    $mang["id"] = $row['idn'];
                    $mang["name_material"] = $row[5];
                    $mang["donvi"] = $row[6];
                    $mang["Soluongnhap"] = $row['Soluongnhap'];
                    $mang["Soluongxuat"] = $row['Soluongxuat'];
                    $mang["tonkho"] = $row['Soluongnhap'] - $row['Soluongxuat'];
                    array_push($mangTonKho, $mang);
                } else if ($row['idn'] == NULL) {
                    $mang["id"] = $row['idx'];
                    $mang["name_material"] = $row[12];
                    $mang["donvi"] = $row[13];
                    $mang["Soluongnhap"] = 0;
                    $mang["Soluongxuat"] = $row['Soluongxuat'];
                    $mang["tonkho"] = $mang['Soluongnhap'] - $row['Soluongxuat'];
                    array_push($mangTonKho, $mang);
                } else if ($row['idx'] == NULL) {
                    $mang["id"] = $row['idn'];
                    $mang["name_material"] = $row[5];
                    $mang["donvi"] = $row[6];
                    $mang["Soluongxuat"] = 0;
                    $mang["Soluongnhap"] = $row['Soluongnhap'];
                    $mang["tonkho"] = $mang['Soluongnhap'] - $mang['Soluongxuat'];
                    array_push($mangTonKho, $mang);
                }
            }
            // var_dump(1);
            // die();
        }

        $this->view(
            "Admin",
            [
                "Page" => "thongke/thongkehangtonkho",
                "listKho" => $mangTonKho,

            ]
        );
    }
    function ThongKeDonHang()
    {
        $listDH = $this->dh->ThongKeDonHang(2);
        $this->view(
            "Admin",
            [
                "Page" => "thongke/thongkedonhang",
                "listDH" => $listDH,

            ]
        );
    }
    function ThongKeTienDo()
    {
        $listDH = $this->dh->ThongKeDonHang(2);
        $this->view(
            "Admin",
            [
                "Page" => "thongke/thongketiendo",
                "listDH" => $listDH,

            ]
        );
    }
    function AddDonHang()
    {
        if (isset($_POST['addDH'])) {

            $soluong = $_POST['soluong'];
            $ngaygiao = $_POST['ngaygiao'];
            $id_material = $_POST['sp'];
            if (isset($_POST['kh']) && $_POST['kh'] != 0) {
                $id_user = $_POST['kh'];

                $kq = $this->dh->insertDH($id_user, $id_material, $soluong, $ngaygiao);


                if ($kq) {
                    header("Location: https://hethongquanlisanxuat.herokuapp.com/Admin/QLDonHang");
                }
            } else {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $diachi = $_POST['address'];
                $id_user = $this->kh->insertUSer($name, $sdt, $diachi, $email);
                $kq = $this->dh->insertDH($id_user, $id_material, $soluong, $ngaygiao);
                echo $kq;

                if ($kq) {
                    header("Location: https://hethongquanlisanxuat.herokuapp.com/Admin/QLDonHang");
                } else {
                    var_dump(1);
                    die();
                }
            }
        }
        $list = $this->mt->getListMaterialsSP();
        $listKH = $this->user->getAllKH();
        $this->view(
            "Admin",
            [
                "Page" => "donhang/addDonHang",
                "list" => $list,
                "listKH" => $listKH,

            ]
        );
    }
    function ChiTietDonHang($id)
    {
        $list = $this->ctdh->getChiTietDHByID($id);
        $this->view(
            "Admin",
            [
                "Page" => "donhang/chitietDH",
                "listDH" => $list,


            ]
        );
    }
    function XoaDH($id)
    {
        $kq = $this->dh->XoaDH($id);
        if ($kq) {
            header("Location: https://hethongquanlisanxuat.herokuapp.com/Admin/QLDonHang");
        }
    }
}
