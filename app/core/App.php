<?php
class App
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDataComics($keyword = null)
    {
        if (is_null($keyword)) {
            $this->db->query("SELECT * FROM komik");
        } else {
            $this->db->query("SELECT * FROM komik WHERE judul LIKE :judul");
            $this->db->bind(':judul', "%$keyword%");
        }
        return $this->db->result_array();
    }

    public function getDetailDataComic($slug)
    {
        $this->db->query("SELECT * FROM komik WHERE slug=:slug");
        $this->db->bind(':slug', $slug);
        return $this->db->row_array();
    }
}
