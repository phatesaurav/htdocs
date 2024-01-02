<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeModel extends CI_Model
{

    public function add_data($data)
    {
        // echo "<pre>";
        // print_r($array);
        // $post['name'] = $array['name'];
        // $post['email'] = $array['email'];
        // $post['mobile'] = $array['mobile'];
        // $post['password'] = $array['password'];

        $this->db->insert('crud', $data);
    }

    public function sum()
    {
        $a = 50;
        $b = 20;
        return $a + $b;
    }

    public function sub()
    {
        $a = 50;
        $b = 20;
        return $a - $b;
    }

    public function get_all_data()
    {
        // $query = $this->db->query("SELECT * FROM crud");
        $query = $this->db->get('crud');
        return $query->result_array();
    }

    public function get_single_data()
    {
        // $query = $this->db->query('SELECT * FROM crud where id="3"');
        $query = $this->db->select('name, email')->where('id', 2)->get('crud');
        return $query->row();
    }
}
