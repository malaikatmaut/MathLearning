<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message_Model extends CI_Model
{
    public function insertMessage($data)
    {
        $this->db->insert('guest_message', $data);
    }

    public function getAllMessages()
    {
        return $this->db->get('guest_message')->result_array();
    }

    public function getTotalMessage()
    {
        return count($this->getAllMessages());
    }

    public function getMessage($where)
    {
        return $this->db->get_where('guest_message', $where)->row_array();
    }

    public function readMessage($id, $data)
    {
        $where = ['id' => $id];
        $this->db->update('guest_message', $data, $where);
    }

    public function delete($id)
    {
        $this->db->delete('guest_message', ['id' => $id]);
    }
}