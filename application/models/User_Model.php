<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function getUser($where)
    {
        return $this->db->get_where('user', $where)->row_array();
    }

    public function getTotalUser()
    {
        return count($this->db->get('user')->result_array());
    }

    public function getAllUserRole()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function getUserRole($where)
    {
        return $this->db->get_where('user_role', $where)->row_array();
    }

    public function addUserRole($data)
    {
        $this->db->insert('user_role', $data);
    }

    public function removeUserRole($roleId)
    {
        $this->db->delete('user_role', ['id' => $roleId]);
    }
}