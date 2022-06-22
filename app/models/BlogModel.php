<?php

class BlogModel {

    private $table = 'artikel';
    private $table_comment = 'komentar';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllArtikel()
    {
        $this->db->query('SELECT * FROM '. $this->table .' ORDER BY id_artikel DESC');
        return $this->db->resultSet();
    }

    public function insertArtikel($data)
    {
        $query = "INSERT INTO ". $this->table ." (judul, deskripsi, gambar) VALUES (:judul, :deskripsi, :gambar )";

        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getArtikelById($id)
    {
        $this->db->query('SELECT * FROM '. $this->table .' WHERE id_artikel=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function getImageArtikelById($id)
    {
        $this->db->query('SELECT gambar FROM '. $this->table .' WHERE id_artikel=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }


    public function updateArtikel($data)
    {
        $query = "UPDATE ". $this->table ." SET judul=:judul, deskripsi=:deskripsi, gambar=:gambar WHERE id_artikel=:id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    

    public function deleteArtikel($id)
    {
        $query = "DELETE FROM ". $this->table ." WHERE id_artikel=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    /* 
     * Komentar
     */
    public function storeComment($data)
    {
        $query = "INSERT INTO ". $this->table_comment ." (id_artikel, id_user, koment) VALUES (:id_artikel, :id_user, :comment)";
        $this->db->query($query);

        $this->db->bind('id_artikel', $data['id_artikel']);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('comment', $data['comment']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllCommentByArtikelId($id)
    {
        $query = "SELECT users.username, komentar.koment FROM ". $this->table_comment ." JOIN users on komentar.id_user=users.id_user WHERE komentar.id_artikel=:id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }
}