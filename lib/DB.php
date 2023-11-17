<?php

class DB
{
    // private $host = 'localhost';
    public $user = 'root';
    public $pass = '123456';
    public $dbname = 'test';

    public $link;
    public $error;

    public function __construct(private string $host = 'localhost')
    {
        // $this->host = $host;
        $this->connectDB();
    }

    private function connectDB()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->link) {
            $this->error = "Connection fail" . $this->link->connect_error;
            return false;
        }
    }

    public function select($query)
    {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function insert($query)
    {
        $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            return false;
        }
    }
}
