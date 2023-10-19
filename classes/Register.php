<?php

include_once 'lib/Database.php';

class Register extends Database
{

    public $db;
    public $error;
    public $success;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fromData($data)
    {

        $name    = $data['name'];
        $email   = $data['email'];
        $phone   = $data['phone'];
        $address = $data['address'];

        if (empty($name)) {
            $this->error = 'Name Not Be Empty!';
            return $this->error;
        }
        if (empty($email)) {
            $this->error = 'Email Not Be Empty!';
            return $this->error;
        }
        if (empty($phone)) {
            $this->error = 'Phone Not Be Empty!';
            return $this->error;
        }
        if (empty($address)) {
            $this->error = 'Address Not Be Empty!';
            return $this->error;
        }

        if (empty($this->error)) {

            $query = "INSERT INTO `registration`(`name`, `email`, `phone`, `address`) VALUES ('$name', '$email', ' $phone', '$address')";

            $result = $this->db->insert($query);

            if ($result) {
                $this->success = 'Success!';
                header('location:index.php');
                return $this->success;
            } else {
                $this->error = 'Unsuccess!';
                return $this->error;
            }
        }
    }

    public function allData()
    {
        $query = "SELECT * FROM `registration`";
        $result = $this->db->select($query);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function allDataById($id)
    {
        $query = "SELECT * FROM `registration` WHERE id = $id";
        $result = $this->db->select($query);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function editfromData($data, $id)
    {

        $name    = $data['name'];
        $email   = $data['email'];
        $phone   = $data['phone'];
        $address = $data['address'];

        if (empty($name)) {
            $this->error = 'Name Not Be Empty!';
            return $this->error;
        }
        if (empty($email)) {
            $this->error = 'Email Not Be Empty!';
            return $this->error;
        }
        if (empty($phone)) {
            $this->error = 'Phone Not Be Empty!';
            return $this->error;
        }
        if (empty($address)) {
            $this->error = 'Address Not Be Empty!';
            return $this->error;
        }

        if (empty($this->error)) {

            $query = "UPDATE `registration` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address' WHERE id = $id";

            $result = $this->db->insert($query);

            if ($result) {
                $this->success = 'Success!';
                header('location:index.php');
                return $this->success;
            } else {
                $this->error = 'Unsuccess!';
                return $this->error;
            }
        }
    }

    public function deleteData($id)
    {
        $query = "DELETE FROM `registration` WHERE id = $id";
        $result = $this->db->delete($query);

        if ($result) {
            $this->success = 'Success!';
            header('location:index.php');
            return $this->success;
        } else {
            return false;
        }
    }
}
