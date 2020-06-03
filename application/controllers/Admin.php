<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('User_Model', 'user');
        $this->load->model('Menu_Model', 'menu');
        $this->load->model('Message_Model', 'message');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->user->getUser(['email' => $this->session->userdata('email')]);

        $this->load->model('Article_Model', 'article');
        $this->load->model('Discussion_Model', 'discussion');

        $data['total_user'] = $this->user->getTotalUser();
        $data['total_article'] = $this->article->getTotalArticle();
        $data['total_discussion'] = $this->discussion->getTotalDiscussion();
        $data['total_message'] = $this->message->getTotalMessage();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->user->getUser(['email' => $this->session->userdata('email')]);
        $data['role'] = $this->user->getAllUserRole();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function addrole()
    {
        $this->form_validation->set_rules('id', 'Role Id', 'required|trim');
        $this->form_validation->set_rules('role', 'Role Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to add new role.</div>');
            redirect('admin/role');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'role' => $this->input->post('role')
            ];

            $this->user->addUserRole($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New role has been added.</div>');
            redirect('admin/role');
        }
    }

    public function deleteRole()
    {
        $roleId = $this->input->get('id');
        $this->user->removeUserRole($roleId);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been removed.</div>');
        redirect('admin/role');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->user->getUser(['email' => $this->session->userdata('email')]);

        $data['role'] = $this->user->getUserRole(['id' => $role_id]);

        $data['menu'] = $this->menu->getUserMenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->menu->getUserAccessMenu($data);

        if ($result->num_rows() == 0) {
            $this->menu->addUserAccessMenu($data);
        } else {
            $this->menu->deleteUserAccessMenu($data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed.</div>');
    }

    public function message()
    {
        $data['title'] = 'Message';
        $data['user'] = $this->user->getUser(['email' => $this->session->userdata('email')]);

        $data['message'] = $this->message->getAllMessages();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/message', $data);
        $this->load->view('templates/footer');
    }

    public function readMsg()
    {
        $idMsg = $this->input->get('id');

        $message = $this->message->getMessage(['id' => $idMsg]);
        if ($message) {
            if ($message['is_read'] == 0) {
                $data = ['is_read' => 1];
                $this->message->readMessage($idMsg, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Message is mark as read.</div>');
                redirect('admin/message');
            } else {
                $data = ['is_read' => 0];
                $this->message->readMessage($idMsg, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Message is mark as unread.</div>');
                redirect('admin/message');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Invalid message.</div>');
            redirect('admin/message');
        }
    }

    public function deleteMsg()
    {
        $idMsg = $this->input->get('id');

        $message = $this->message->getMessage(['id' => $idMsg]);
        if ($message) {
            $this->message->delete($idMsg);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The message has been deleted.</div>');
            redirect('admin/message');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Invalid message.</div>');
            redirect('admin/message');
        }
    }
}