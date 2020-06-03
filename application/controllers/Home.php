<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Article_Model', 'article');
		$this->load->model('Discussion_Model', 'discussion');
	}

	public function index()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required|trim');
		$this->form_validation->set_rules('message', 'Message', 'required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Home';
			$data['article'] = $this->article->getAllArticles();

			$data['menu_login'] = $this->isLogin();

			$this->load->view('templates/home-header', $data);
			$this->load->view('home/index', $data);
			$this->load->view('templates/home-footer');
		} else {
			$this->sendMessage();
		}
	}

	private function sendMessage()
	{
		$data = [
			'name' => htmlspecialchars($this->input->post('name', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'subject' => $this->input->post('subject'),
			'message' => $this->input->post('message'),
			'date_created' => time(),
			'is_read' => 0
		];
		$this->load->model('Message_Model', 'message');
		$this->message->insertMessage($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Thank you for the message. We will contact you soon!</div>');
		redirect('home#contact-section');
	}

	public function articles()
	{
		$data['title'] = 'Articles';
		$data['menu_login'] = $this->isLogin();

		$data['articles'] = $this->article->getAllArticles();

		$this->load->view('templates/home-header', $data);
		$this->load->view('home/articles', $data);
		$this->load->view('templates/home-footer');
	}

	public function article()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('message', 'Message', 'required|trim');

		if ($this->form_validation->run() == false) {
			$articleId = $this->input->get('id');
			$data['article'] = $this->article->getArticle(['id' => $articleId]);
			$data['title'] = $data['article']['title'];
			$data['author'] = $this->db->get_where('user', ['email' => $data['article']['author']])->row_array();

			$data['more_article'] = $this->article->getMoreArticles($articleId);
			$data['comments'] = $this->article->getAllComments($articleId);

			$data['total_comments'] = count($data['comments']);

			$email = $this->session->userdata('email');
			$data['menu_login'] = $this->isLogin();
			$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();

			$this->load->view('templates/home-header', $data);
			$this->load->view('home/view-article', $data);
			$this->load->view('templates/home-footer');
		} else {
			$this->sendComment();
		}
	}

	private function sendComment()
	{
		$articleId = $this->input->get('id');
		$data = [
			'article_id' => $articleId,
			'name' => htmlspecialchars($this->input->post('name', true)),
			'user_email' => htmlspecialchars($this->input->post('email', true)),
			'message' => $this->input->post('message'),
			'date_created' => time()
		];
		$this->article->insertComment($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Succes, your comment has been submitted. Thank you for the comment.</div>');
		redirect('article?id=' . $articleId);
	}

	public function discussions()
	{
		$data['title'] = 'Discussion';
		$data['menu_login'] = $this->isLogin();

		$data['discussions'] = $this->discussion->getAllDiscussions();

		$this->load->view('templates/home-header', $data);
		$this->load->view('home/discussions', $data);
		$this->load->view('templates/home-footer');
	}

	public function discussion()
	{
		$discussionId = $this->input->get('id');
		$email = $this->session->userdata('email');
		$this->form_validation->set_rules('answer', 'Answer', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['discussion'] = $this->discussion->getDiscussion($discussionId);
			$data['title'] = $data['discussion']['title'];
			$data['author'] = $this->db->get_where('user', ['email' => $data['discussion']['author']])->row_array();

			$data['answers'] = $this->discussion->getAllAnswers($discussionId);

			$data['total_answers'] = count($data['answers']);

			$data['menu_login'] = $this->isLogin();
			$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();

			$this->load->view('templates/home-header', $data);
			$this->load->view('home/view-discussion', $data);
			$this->load->view('templates/home-footer');
		} else {
			if ($email) {
				$data = [
					'discussion_id' => $discussionId,
					'user_email' => $email,
					'answer' => $this->input->post('answer'),
					'date_created' => time()
				];
				$this->discussion->addAnswer($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Succes, your answer has been submitted. Thank you for the answer.</div>');
				redirect('discussion?id=' . $discussionId);
			} else {
				redirect('auth');
			}
		}
	}

	public function isLogin()
	{
		if ($this->session->userdata('email')) {
			return 'Account';
		} else {
			return 'Login';
		}
	}
}