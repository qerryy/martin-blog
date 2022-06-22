<?php

class UserModel {

    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $query = "INSERT INTO ". $this->table ." (nama, username, password) VALUES (:nama, :username, :password)";
        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function login($username, $password)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE username=:username');
        $this->db->bind('username', $username);

        $row = $this->db->single();
        // die(var_dump($row));
        $hashPassword = $row['password'];

        if (password_verify($password, $hashPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    public function getAllUsers()
    {
        $this->db->query('SELECT * FROM '. $this->table .' ORDER BY id_user DESC');
        return $this->db->resultSet();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE id_user=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function updateWithoutPass($data)
    {
        $query = "UPDATE ". $this->table ." SET nama=:nama, username=:username WHERE id_user=:id";

        $this->db->query($query);
        $this->db->bind('id', $data['id_user']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateWithPass($data)
    {
        $query = "UPDATE ". $this->table ." SET nama=:nama, username=:username, password=:password WHERE id_user=:id";

        $this->db->query($query);
        $this->db->bind('id', $data['id_user']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}