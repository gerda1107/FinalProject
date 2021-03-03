<?php

namespace core;

/**
 * Class to connect to database.
 */
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $dbName = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dns = "mysql:host=$this->host;dbname=$this->dbName;";

        $options = [
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->dbh = new \PDO($dns, $this->user, $this->password, $options);
        } catch (\PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Prepare statement
     *
     * @param string $sql
     */
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * Bind values in DB w/given
     *
     * @param [type] $param
     * @param [type] $value
     * @param [type] $type
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Execute prepared and binded statement
     *
     */
    public function execute()
    {
        return $this->stmt->execute();
    }

    /**
     * Return single row of data
     *
     * @return object
     */
    public function singleRow()
    {
        $this->execute();
        return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Return number of rows
     *
     */
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    /**
     * Get results as an array
     *
     * @return array
     */
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}