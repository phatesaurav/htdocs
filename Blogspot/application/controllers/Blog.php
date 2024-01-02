<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function index()
    {
        $this->load->model('BlogModel');
        $data['blogs'] = $this->BlogModel->get_all_blogs();
        // $this->load->view('templates/header');
        $this->load->view('blog/index', $data);
        // $this->load->view('templates/footer');
    }

    public function single_blog()
    {
        $id = $this->input->get('id');
        $this->load->model('BlogModel');
        $data['blog'] = $this->BlogModel->get_single_blog($id);
        // $this->load->view('templates/header');
        $this->load->view('blog/single', $data);
        // $this->load->view('templates/footer');
    }

}
