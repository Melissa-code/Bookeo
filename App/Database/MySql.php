<?php

namespace App\Database;

use PDO;

// Singleton design pattern
class MySql {

    private string $db_name;
    private string $db_user;
    private string $db_password;
    private string $db_port;
    private string $db_host;
    private ?PDO $pdo = null;
    private static ?MySql $_instance = null;


    /**
     * Private MySql constructor
     */
    private function __construct() {
        $conf = require_once _ROOTPATH_.'/config.php';

        if (isset($conf['db_name'])) {
            $this->db_name = $conf['db_name'];
        }
        if (isset($conf['db_user'])) {
            $this->db_user = $conf['db_user'];
        }
        if (isset($conf['db_password'])) {
            $this->db_password = $conf['db_password'];
        }
        if (isset($conf['db_port'])) {
            $this->db_port = $conf['db_port'];
        }
        if (isset($conf['db_host'])) {
            $this->db_host = $conf['db_host'];
        }
    }

    /**
     * Return an instance or create a new instance
     */
    public static function getInstance(): self
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Mysql();
        }
        return self::$_instance;
    }

    /**
     * Return a new PDO
     */
    public function getPDO(): ?PDO {
        if(is_null($this->pdo)) {
            $this->pdo = new PDO('mysql:dbname=' . $this->db_name . ';charset=utf8;host=' . $this->db_host.':'.$this->db_port, $this->db_user, $this->db_password);
        }
        return $this->pdo;
    }

}