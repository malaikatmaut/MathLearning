<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article_Model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('user_article', $data);
    }

    public function delete($where)
    {
        $this->db->delete('user_article', $where);
    }

    public function getArticle($where)
    {
        return $this->db->get_where('user_article', $where)->row_array();
    }

    public function getUserArticles($email)
    {
        return $this->db->get_where('user_article', ['author' => $email])->result_array();
    }

    public function getAllArticles()
    {
        return $this->db->get('user_article')->result_array();
    }

    public function getTotalArticle()
    {
        return count($this->getAllArticles());
    }

    public function getMoreArticles($id)
    {
        return $this->db->get_where('user_article', ['id!=' => $id])->result_array();
    }

    public function update($data, $where)
    {
        $this->db->update('user_article', $data, $where);
    }

    public function getAllComments($articleId)
    {
        return $this->db->get_where('user_article_comments', ['article_id' => $articleId])->result_array();
    }

    public function insertComment($data)
    {
        $this->db->insert('user_article_comments', $data);
    }
}