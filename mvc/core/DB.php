<?php
class DB
{

    public $con;
    // protected $servername = "localhost";
    // protected $username = "root";
    // protected $password = "";
    // // protected $dbname = "hethongthongtinquanli";
    // protected $dbname = "htttsx";
    // public function __construct()
    // {
    //     $this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    //     // mysqli_select_db($this->con,$this->dbname)
    //     // mysqli_query($this->con,"SET NAMES 'utf-8'");
    //     if ($this->con->connect_error) {
    //         die("Connection failed: " . $this->con->connect_error);
    //     }
    // }
    protected $cleardb_url;
    protected $cleardb_server;
    protected $cleardb_username;
    protected $cleardb_password;
    protected $cleardb_db;
    protected $active_group = 'default';
    protected $query_builder = TRUE;
    // Connect to DB
    public function __construct()
    {

        $this->cleardb_server = "us-cdbr-east-03.cleardb.com";
        $this->cleardb_username = "b4bf5912ce0703";
        $this->cleardb_password = "0eda57e2";
        $this->cleardb_db = "heroku_3db953d49416605";
        $this->active_group = 'default';
        $this->query_builder = TRUE;
        $this->con = mysqli_connect($this->cleardb_server, $this->cleardb_username, $this->cleardb_password, $this->cleardb_db);
        // mysqli_select_db($this->con,$this->dbname)
        mysqli_query($this->con, "SET NAMES 'utf-8'");
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }
}
