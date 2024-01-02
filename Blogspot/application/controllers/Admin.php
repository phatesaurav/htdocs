<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function create_blog()
    {
        $this->load->helper('form');
        // $this->load->view('templates/header');
        $this->load->view('admin/create_blog');
        // $this->load->view('templates/footer');
    }

    public function create_blog_validation()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('upload');

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('author', 'author', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');

        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $this->upload->initialize($config);

        if ($this->form_validation->run() === true) {
            if (!$this->upload->do_upload('image')) {
                $this->load->view('admin/create_blog');
            } else {
                $image = $this->upload->data();
                $blog_data = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'content' => $this->input->post('content'),
                    'category' => $this->input->post('category'),
                    'author' => $this->input->post('author'),
                    'date' => $this->input->post('date'),
                    'image' => $image['file_name'],
                );

                $this->load->model('blogmodel');
                $this->blogmodel->create_blog($blog_data);
                redirect('admin/blog_list');
            }
        } else {
            $this->load->view('/admin/create_blog');
        }
    }

    public function blog_list()
    {
        $this->load->model('blogmodel');
        $data['blogs'] = $this->blogmodel->get_all_blogs();
        // $this->load->view('templates/header');
        $this->load->view('admin/blog_list', $data);
        // $this->load->view('templates/footer');
    }

    public function delete_blog()
    {
        $id = $this->input->get('id');
        $this->load->model('blogmodel');
        $this->blogmodel->delete_blog($id);
        redirect('admin/blog_list');
    }

    public function edit_blog()
    {
        $id = $this->input->get('id');
        $this->load->model('blogmodel');
        $data['blog'] = $this->blogmodel->get_single_blog($id);

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('upload');

        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('content', 'content', 'required');
            $this->form_validation->set_rules('category', 'category', 'required');
            $this->form_validation->set_rules('author', 'author', 'required');
            $this->form_validation->set_rules('date', 'date', 'required');

            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->upload->initialize($config);

            if ($this->form_validation->run() === true) {
                if (!empty($_FILES['image']['name'])) {
                    if ($this->upload->do_upload('image')) {
                        $upload_data = $this->upload->data();
                        $image = $upload_data['file_name'];
                    } else {
                        $error = $this->upload->display_errors();
                        echo $error;
                        return;
                    }
                } else {
                    $image = $data['blog']->image;
                }

                $update_data = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'content' => $this->input->post('content'),
                    'category' => $this->input->post('category'),
                    'author' => $this->input->post('author'),
                    'date' => $this->input->post('date'),
                    'image' => $image,
                );

                $this->blogmodel->edit_blog($id, $update_data);
                redirect('admin/blog_list');
            }
        }
        $this->load->view('admin/edit_blog', $data);
    }
}
