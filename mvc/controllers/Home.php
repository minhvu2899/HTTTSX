<?php
class Home extends Controller
{
    function __construct()
    {
    }
    function SayHi()
    {
        // $kq = $this->ncc->getListNCC();


        $this->view(
            "Login",
            [
                "Page" => "login",
                // "ListNCC" => $kq,

            ]
        );
    }
}
