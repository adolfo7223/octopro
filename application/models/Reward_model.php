<?php
    class Reward_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function insert_reward($data) {
            $this->db->insert('rewards', $data);
        }

        public function update_reward($id, $data) {
            $this->db->where('id', $id);
            $this->db->update('rewards', $data);
        }

        public function delete_reward($id) {
            $this->db->where('id', $id);
            $this->db->delete('rewards');
        }

        public function get_client_rewards() {
            $this->db->select('a.*, b.name as client_name');
            $this->db->from('rewards a');
            $this->db->join('email b', 'b.id = a.client_id', 'left');
            $query = $this->db->get();

            return $query->result();
        }

        public function get_client_rewards_by_client_id($client_id) {
            $this->db->select('*');
            $this->db->where('client_id', $client_id);
            $query = $this->db->get('rewards');

            return $query->result();
        }

        public function get_client_rewards_by_id($id) {
            $this->db->select('a.*, b.name as client_name');
            $this->db->from('rewards a');
            $this->db->join('email b', 'b.id = a.client_id', 'left');
            $this->db->where('a.id', $id);
            $query = $this->db->get();

            return $query->row();
        }
        
    }