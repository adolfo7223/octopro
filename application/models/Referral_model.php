<?php
    class Referral_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function insert_referral($data) {
            $this->db->insert('referral', $data);

            return $this->db->insert_id();
        }

        public function update_refferal_status_is_used_by_code($code) {
            $this->db->where('referral_code', $code);
            $this->db->update('referral', array('is_used' => 1));
        }

        public function get_referral_details() {
            $this->db->select('a.*, b.name as referred_by_name, b.email_address as referred_by_email_address');
            $this->db->from('referral a');
            $this->db->join('email b', 'b.id = a.referred_by', 'left');
            $query = $this->db->get();
            return $query->result();
        }

        public function count_referrals() {
            $this->db->select('*');
            $query = $this->db->get('referral');
            return $query->num_rows();
        }

        public function get_referral_by_reffered_by($client_id) {
            $this->db->select('*');
            $this->db->where('referred_by', $client_id);
            $query = $this->db->get('referral');
            return $query->result();
        }
        
    }