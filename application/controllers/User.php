<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $is_upload = $_FILES['image'];

            if ($is_upload) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';
            }

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[3]|matches[newPassword2]');
        $this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[3]|matches[newPassword1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/change-password', $data);
            $this->load->view('templates/footer');
        } else {
            $currentPassword = $this->input->post('currentPassword');
            $newPassword = $this->input->post('newPassword1');

            if (!password_verify($currentPassword, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password.</div>');
                redirect('user/changepassword');
            } else {
                if ($currentPassword == $newPassword) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password can\'t be the same as current password.</div>');
                    redirect('user/changepassword');
                } else {
                    $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $this->db->set('password', $passwordHash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function articles()
    {
        $data['title'] = 'My Articles';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();

        $this->load->model('Article_Model', 'article');
        if ($data['user']['role_id'] == 1) {
            $data['article'] = $this->article->getAllArticles();
        } else {
            $data['article'] = $this->article->getUserArticles($email);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/user-articles', $data);
        $this->load->view('templates/footer');
    }

    public function addArticle()
    {
        $data['title'] = 'Add Article';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();


        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/add-article', $data);
            $this->load->view('templates/footer');
        } else {
            $image_header = 'default.jpg';
            $is_upload = $_FILES['image'];

            if ($is_upload) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/article/header/';
            }

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $image_header = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }

            $data = [
                'title' => $this->input->post('title'),
                'image_header' => $image_header,
                'content' => $this->input->post('content'),
                'author' => $email,
                'date_created' => time(),
                'views' => 0
            ];

            $this->load->model('Article_Model', 'article');
            $this->article->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your article has been submited.</div>');
            redirect('user/articles');
        }
    }

    public function deleteArticle()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $id = $this->input->get('id');

        $this->load->model('Article_Model', 'article');
        if ($data['user']['role_id'] == 1) {
            $where = ['id' => $id];
        } else {
            $where = ['id' => $id, 'author' => $email];
        }
        $article = $this->article->getArticle($where);

        if ($article) {
            $this->article->delete(['id' => $article['id']]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your article has been deleted.</div>');
            redirect('user/articles');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Failed to delete article. Article is invalid.</div>');
            redirect('user/articles');
        }
    }

    public function editArticle()
    {
        $data['title'] = 'Edit Article';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $articleId = $this->input->get('id');

        $this->load->model('Article_Model', 'article');
        if ($data['user']['role_id'] == 1) {
            $where = ['id' => $articleId];
        } else {
            $article = $this->article->getArticle(['id' => $articleId]);
            if ($article['author'] == $email) {
                $where = ['id' => $articleId, 'author' => $email];
            } else {
                redirect('auth/blocked');
            }
        }
        $data['article'] = $this->article->getArticle($where);

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit-article', $data);
            $this->load->view('templates/footer');
        } else {
            $is_upload = $_FILES['image'];

            if ($is_upload) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/article/header/';
            }

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['article']['image_header'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/article/header/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image_header', $new_image);
            } else {
                echo $this->upload->display_errors();
            }

            $this->db->set('title', $this->input->post('title'));
            $this->db->set('content', $this->input->post('content'));
            $this->db->set('date_created', time());
            $this->db->where('id', $articleId);
            $this->db->update('user_article');


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your article has been updated!</div>');
            redirect('user/editarticle?id=' . $articleId);
        }
    }

    public function discussions()
    {
        $data['title'] = 'My Discussions';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();

        $this->load->model('Discussion_Model', 'discussion');
        $data['discussions'] = $this->discussion->getUserDiscussions($email);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/user-discussions', $data);
        $this->load->view('templates/footer');
    }

    public function addQuestion()
    {
        $data['title'] = 'Add Discussion';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();


        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/add-discussion', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'category' => $this->input->post('category'),
                'author' => $email,
                'is_solved' => 0,
                'date_created' => time()
            ];

            $this->load->model('Discussion_Model', 'discussion');
            $this->discussion->add($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success! Your question has been submited.</div>');
            redirect('user/discussions');
        }
    }

    public function deleteQuestion()
    {
        $this->load->model('Discussion_Model', 'discussion');
        $this->discussion->delete($this->input->get('id'));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your question has been removed.</div>');
        redirect('user/discussions');
    }

    public function editQuestion()
    {
        $questionId = $this->input->get('id');
        $data['title'] = 'Edit Discussion';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();

        $this->load->model('Discussion_Model', 'discussion');
        $data['discussion'] = $this->discussion->getDiscussion($questionId);

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit-discussion', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'category' => $this->input->post('category'),
                'author' => $email,
                'is_solved' => 0,
                'date_created' => time()
            ];

            $this->discussion->editQuestion($data, $questionId);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success! Your question has been edited.</div>');
            redirect('user/discussions');
        }
    }

    public function solveQuestion()
    {
        $questionId = $this->input->get('id');
        $this->load->model('Discussion_Model', 'discussion');
        $this->discussion->solveQuestion('1', $questionId);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success! Your question has been mark as solved.</div>');
        redirect('user/discussions');
    }

    public function unsolveQuestion()
    {
        $questionId = $this->input->get('id');
        $this->load->model('Discussion_Model', 'discussion');
        $this->discussion->solveQuestion('0', $questionId);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success! Your question has been mark as unsolved.</div>');
        redirect('user/discussions');
    }
}