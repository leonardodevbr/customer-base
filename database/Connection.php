<?php

namespace Database;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Connection
{
    private $hostname = "localhost";
    private $database = "database";
    private $username = "root";
    private $password = "";

    /**
     * @return \PDO|null
     */
    public function start()
    {
        try {
            $connection = new \PDO("mysql:dbname=$this->database;host=$this->hostname", $this->username, $this->password);
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (\PDOException $e) {
            $log = new Logger('logger');
            $log->pushHandler(new StreamHandler('logs/connection.log', Logger::ALERT));
            $log->error("Connection failed: " . $e->getMessage());
            return null;
        }
    }
}
