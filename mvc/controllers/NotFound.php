<?php
class NotFound extends Controller
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

                "Page" => "notFound",
                // "SV"=>$m->SinhVien()
            ]
        );
    }
}
