<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Discussion_Model extends CI_Model
{
    public function getAllDiscussions()
    {
        return $this->db->get('user_discussion')->result_array();
    }

    public function getTotalDiscussion()
    {
        return count($this->getAllDiscussions());
    }

    public function getUserDiscussions($email)
    {
        return $this->db->get_where('user_discussion', ['author' => $email])->result_array();
    }

    public function getDiscussion($id)
    {
        return $this->db->get_where('user_discussion', ['id' => $id])->row_array();
    }

    public function add($data)
    {
        $this->db->insert('user_discussion', $data);
    }

    public function delete($discussionId)
    {
        $this->db->delete('user_discussion', ['id' => $discussionId]);
    }

    public function editQuestion($data, $discussionId)
    {
        $this->db->update('user_discussion', $data, ['id' => $discussionId]);
    }

    public function getAllAnswers($discussionId)
    {
        return $this->db->get_where('user_answers', ['discussion_id' => $discussionId])->result_array();
    }

    public function addAnswer($data)
    {
        $this->db->insert('user_answers', $data);
    }

    public function solveQuestion($key, $questionId)
    {
        $this->db->set('is_solved', $key);
        $this->db->where('id', $questionId);
        $this->db->update('user_discussion');
    }
}