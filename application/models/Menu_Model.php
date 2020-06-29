<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_Model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";
        return $this->db->query($query)->result_array();
    }

    public function getUserMenu()
    {
        $this->db->where('id !=', 1);
        return $this->db->get('user_menu')->result_array();
    }

    public function getUserSubmenu($submenuId)
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                    WHERE `user_sub_menu`.`id` = $submenuId";
        return $this->db->query($query)->row_array();
    }

    public function addMenu($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function deleteMenu($menuId)
    {
        $this->db->delete('user_menu', ['id' => $menuId]);
    }

    public function addSubMenu($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function deleteSubmenu($submenuId)
    {
        $this->db->delete('user_sub_menu', ['id' => $submenuId]);
    }

    public function getUserAccessMenu($where)
    {
        return $this->db->get_where('user_access_menu', $where);
    }

    public function addUserAccessMenu($data)
    {
        $this->db->insert('user_access_menu', $data);
    }

    public function deleteUserAccessMenu($data)
    {
        $this->db->delete('user_access_menu', $data);
    }
}