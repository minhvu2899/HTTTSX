<?php 
        class ThongKeNCC extends Controller{
        public $ncc,$dh;
        function __construct()
        {
            $this->ncc=$this->model("NhaCungCapModel");
            $this->dh=$this->model("DonHangModel");
        }
        function SayHi(){
            
            $this->view(
                "Admin",
                [
                    "Page"=>"ThongKeNCC",
                    
                    
                ]);

        }
        function ThongKeTheoSoLuongNhap(){
            if(isset($_POST['thongke'])){
                $begin=  $_POST['date-from']   ;
                $end=$_POST['date-to'];
                $_SESSION['date-from']=$begin;
                $_SESSION['date-to']=$end;
                $loaithongke=$_POST['loaithongke'];
                if(empty($loaithongke)){
                    echo "<script>alert('Vui lòng chọn loại thống kê')</script>";
                    $this->view(
                        "Admin",
                        [
                            "Page"=>"ThongKeNCC",
                            
                            
                        ]);
                    return;
                    
                }
                // echo "<script>alert($loaithongke)</script>";
                if($loaithongke==1){
                    $kq=$this->dh->getListDHBySoLuongNhap($begin,$end);
                    $_SESSION['loaiTK']=1;
                  
                }
                else if($loaithongke==2){
                    $kq=$this->dh->getListDHByDoanhThu($begin,$end);
                    $_SESSION['loaiTK']=2;
                  
                  
                }
                $this->view(
                    "Admin",
                    [
                        "Page"=>"TKNCCTheoSoLuong",
                        "ListDH"=>$kq
                        
                    ]);
            }
        }
        function ChiTietTK($id){
            $begin=$_SESSION['date-from'];
            $end=$_SESSION['date-to'];
            $kq=$this->dh->getListDHByID($id,$begin,$end);
          
            $this->view(
                "Admin",
                [
                    "Page"=>"chitietTK",
                    "ListDH"=>$kq
                    
                ]);
        }
    }
?>