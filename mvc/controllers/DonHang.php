<?php

class DonHang extends Controller
{
    public $dh;
    function __construct()
    {
        $this->dh = $this->model("DonHangModel");
    }

    function getDonHangByID()
    {
        $id = $_POST['id'];
        $dh = $this->dh->getListDHByID($id);
        $data = "";
        while ($d = mysqli_fetch_array($dh)) {
            $data .= '<div class="form-group">
            <label for="">Chọn sản phẩm</label>
            <select class="form-control" name="sp" id="sp">
                    <option value="' . $d[2] . '">' . $d[9] . '</option>
            </select>
        </div>
        <div class="form-group">
            <label class="bmd-label-floating">Số lượng</label>
            <input type="text" class="form-control" name="soluong" id="soluong" value=' . $d[3] . '>
        </div>
        <div class="form-group">
            <label class="bmd-label-floating">Ngày giao</label>
            <input type="date" class="form-control" name="ngaygiao" id="ngaygiao" value=' . $d[4] . '>
        </div>';
        }




        echo ($data);
    }
    function getDonHang()
    {
        $id = 1;
        $dh = $this->dh->getListDHByID($id);
        $data = "";
        while ($d = mysqli_fetch_array($dh)) {
            $data .= `<div class="form-group">
            <label for="">Chọn sản phẩm</label>
            <select class="form-control" name="sp" id="sp">
                    <option value="$d[2].">$d[9]</option>
            </select>
        </div>
        <div class="form-group">
            <label class="bmd-label-floating">Số lượng</label>
            <input type="text" class="form-control" name="soluong" id="soluong" value=$d[3]>
        </div>
        <div class="form-group">
            <label class="bmd-label-floating">Ngày giao</label>
            <input type="date" class="form-control" name="ngaygiao" id="ngaygiao" value=$d[4]>
        </div>`;
        }

        echo $data;
    }
    function updateStatusByID()
    {
        $status = $_POST['newStatus'];
        $id = $_POST['id'];
        $kq = $this->dh->updateStatusByID($status, $id);
        echo $kq;
    }
}
