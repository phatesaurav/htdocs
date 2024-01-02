<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BlogModel extends CI_Model
{
    public function get_all_blogs()
    {
        $query = $this->db->get('blog');
        return $query->result_array();
    }

    public function get_single_blog($id)
    {
        $query = $this->db->where('id', $id)->get('blog');
        return $query->row();
    }

    public function create_blog($data)
    {
        $this->db->insert('blog', $data);
    }

    public function edit_blog($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('blog', $data);
    }

    public function delete_blog($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('blog');
    }
}
