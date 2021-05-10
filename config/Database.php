<?php
class Database
{
//DB Params
//private $host = 'localhost';
//private $db_name = 'finalproject';
//private $username = 'root';
//private $password = 'sesame';
//    private $conn;

//public $host = 'frwahxxknm9kwy6c.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
//public $db_name = 'd4plawwz86y7caqa';
//public $username = 'iazm9vbj5xjhy4i3';
// public $password = 'eormls01njyhex6l';


//DB connect
    public function connect()
    {
//    $url = getenv('JAWSDB_URL');
//    $dbparts = parse_url($url);
//
//    $hostname = $dbparts['host'];
//    $username = $dbparts['user'];
//    $password = $dbparts['pass'];
//    $database = ltrim($dbparts['path'], '/');
//
//    $dsn = "mysql:host={$hostname}dbname={$database}";
//    $this->conn = null;
//
//
//    try {
//        $this->conn = new PDO($dsn, $username, $password);
////        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
////        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//}catch(PDOException $e) {
//        echo 'Connection Error: ' . $e->getMessage();
//}
//
//    return $this->conn;
//}


        $dsn = 'ao9moanwus0rjiex.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
        $username = 'ct6rmozpamywgnvd';
        $password = 'vxv18vzsfkg4urzt';


        try {
//        local development server connection
//        if using a $password, add it as 3rd parameter
            $db = new PDO($dsn, $username, $password);

//         Heroku connection
            $db = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            $error = "Database Error: ";
            $error .= $e -> getMessage ();
            include ('view/error.php');
            exit();
        }
    }
}

