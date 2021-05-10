<?php
class Database {
//DB Params
//private $host = 'localhost';
//private $db_name = 'finalproject';
//private $username = 'root';
//private $password = 'sesame';
private $conn;

//     $host = 'frwahxxknm9kwy6c.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
// $db_name = 'd4plawwz86y7caqa';
//$username = 'iazm9vbj5xjhy4i3';
// $password = 'eormls01njyhex6l';
//$conn;


//DB connect
public function connect () {
    $url = getenv('mysql://ct6rmozpamywgnvd:vxv18vzsfkg4urzt@ao9moanwus0rjiex.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/gfblgpih5c369zyg');
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'], '/');

    $dsn = "mysql:host={$hostname}dbname={$database}";
    $this->conn = null;


    try {
        $this->conn = new PDO($dsn, $username, $password);
//        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
//        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
}

    return $this->conn;
}
}