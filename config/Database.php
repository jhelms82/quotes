<?php
class Database
{
//DB Params
private $host = 'localhost';
private $db_name = 'finalproject';
private $username = 'root';
private $password = 'sesame';
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

        $dsn = 'mysql:host=un0jueuv2mam78uv.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=scyddzzkvdymrsrw';
        $username = 'r8kel2jekjdp3v9p';
        $password = 'w798oejyiro3ditm';

//        $dsn = 'mysql:host=localhost;dbname=finalproject';
//        $username = 'root';
//        $password = 'sesame';


        try {
            $this->conn = new PDO($dsn, $username, $password);

        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage ();
        }

        return $this->conn;
    }
}


