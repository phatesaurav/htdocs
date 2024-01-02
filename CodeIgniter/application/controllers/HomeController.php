<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

    public function index()
    {
        $this->load->helper('form');
        $this->load->view('form');
    }

    public function formFunction()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'required|trim|alpha');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('mobile', 'mobile', 'required|trim|numeric|exact_length[10]');
        $this->form_validation->set_rules('password', 'password', 'required|trim');

        if ($this->form_validation->run() == true) {
            // echo "success";

            $config['upload_path'] = './images';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $file_data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'mobile' => $this->input->post('mobile'),
                    'image' => $upload_data['file_name'], // Save the file name in the database
                    'date' => $this->input->post('date'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                );
                $this->load->model('homemodel');
                $this->homemodel->add_data($file_data);

                echo "Form submitted successfully!";
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $this->load->view('form');
            // echo validation_errors();
        }
    }

    // public function index()
    // {
    //     $data['int'] = 5;
    //     $data['string'] = "hello";
    //     $data['array'] = array("Volvo", "BMW", "Toyota");
    //     $this->load->view('homepage', $data);
    // }

    // public function myFunction()
    // {
    //     $this->load->view("myfunctionpage.php");
    //     echo "from myFunction</br>";
    // }

    // public function urlFunction($urlVariable = 1)
    // {
    //     $data['urlVar'] = $urlVariable;
    //     $this->load->view('urlpage', $data);
    // }

    // public function homeModelFunction()
    // {
    //     $this->load->model('HomeModel');
    //     $data['sum'] = $this->HomeModel->sum();
    //     $data['sub'] = $this->HomeModel->sub();
    //     $this->load->view('homemodelpage', $data);
    // }

    public function display_data()
    {
        $this->load->model('HomeModel');
        $data['results'] = $this->HomeModel->get_all_data();
        $data['result'] = $this->HomeModel->get_single_data();
        $this->load->view('HomeView', $data);
    }
}
