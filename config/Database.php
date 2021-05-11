<?php
class Database
{
//DB Params
//private $host = 'localhost';
//private $db_name = 'finalproject';
//private $username = 'root';
//private $password = 'sesame';
    private $conn;






//DB connect
    public function connect()
    {
//        $url = getenv('JAWSDB_MARIA_URL');
//        $dbparts = parse_url($url);
//
//        $hostname = $dbparts['host'];
//        $username = $dbparts['user'];
//        $password = $dbparts['pass'];
//        $database = ltrim($dbparts['path'], '/');
//
//        $dsn = "mysql:host={$hostname}dbname={$database}";
//        $this->conn = null;

        $host = 'un0jueuv2mam78uv.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
        $db = 'scyddzzkvdymrsrw';
        $username = 'r8kel2jekjdp3v9p';
        $password = 'w798oejyiro3ditm';
        $charset = 'utmf8md4';
        $dsn = 'mysql:host=$host;dbname=$db;charset=$charset';

        try {
            $this->conn = new PDO($dsn, $username, $password);

        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage ();
        }

        return $this->conn;
    }
}


