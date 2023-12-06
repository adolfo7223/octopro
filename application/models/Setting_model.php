<?php
    class Setting_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function get_settings() {
            $this->db->select('*');
            $this->db->where('id', 1);
            $query = $this->db->get('settings');

            return $query->row();
        }

        public function insert_settings($data){
            $this->db->insert('settings', $data);
        }

        public function update_settings($id, $data) {
            $this->db->where('id', $id);
            $this->db->update('settings', $data);
        }

        public function check_settings_by_id($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('settings');

            return $query->row();
        }
        
    }