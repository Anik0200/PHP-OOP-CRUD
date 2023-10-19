<?php

include 'config/config.php';

class Database
{
    public $host     = HOST;
    public $user     = USER;
    public $password = PASSWORD;
    public $database = DATBASE;

    public $link;
    public $error;

    public function __construct()
    {
        $this->dbConnect();
    }

    public function dbConnect()
    {

        $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if (!$this->link) {
            $this->error = die('Connection Error');
            return false;
        }
    }

    // Insert
    public function insert($query)
    {
        $result = mysqli_query($this->link, $query) or die('Insert Error');

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    // Delete
    public function delete($query)
    {
        $result = mysqli_query($this->link, $query) or die('Delete Error');

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    //Select
    public function select($query)
    {
        $result = mysqli_query($this->link, $query) or die('Select Error');

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }
}
