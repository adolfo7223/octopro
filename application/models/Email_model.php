<?php
    class Email_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function add_review_email($data) {
            
            //Check if Email Exist
            $this->db->select('id');
            $this->db->where('email_address', $data['email_address']);
            $check = $this->db->get('email')->num_rows();

            if (empty($check)) {
                $this->db->insert('email', $data);
                return $this->db->insert_id();
            } else {
                return false;
            }

        }

        public function update_email($data, $id) {
            $this->db->where('id', $id);
            $this->db->update('email', $data);

            return $this->db->insert_id();
        }

        public function update_email_response_status($id, $data) {
            $this->db->where('id', $id);
            $this->db->update('email', $data);

            if ($this->db->affected_rows()) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function to_be_send_email_follow_up() {
            $this->db->select('*');
            $this->db->where('response_status', null);
            $query = $this->db->get('email');
            return $query->result();
        }

        public function get_customer_details_by_id($id) {
            $this->db->select('*');
            $this->db->where('id', $id);
            $query = $this->db->get('email');
            return $query->row();
        }

        public function get_customer_details_by_email($email) {
            $this->db->select('*');
            $this->db->where('email_address', $email);
            $query = $this->db->get('email');
            return $query->row();
        }

        public function get_customer_details_by_phone($phone) {
            $this->db->select('*');
            $this->db->where('phone', $phone);
            $query = $this->db->get('email');
            return $query->row();
        }

        public function get_customer_list() {
            $this->db->select('*');
            $query = $this->db->get('email');
            return $query->result();
        }
        
        public function count_customer() {
            $this->db->select('*');
            $query = $this->db->get('email');
            return $query->num_rows();
        }

        public function count_customer_responded() {
            $this->db->select('*');
            $this->db->where('response_status', 1);
            $query = $this->db->get('email');
            return $query->num_rows();
        }

        public function get_client_details_select_option($searchTerm) {
            if(!empty($searchTerm)) {   
                $query = $this->db->select('id, name, email_address, phone')
                       ->from('email')
                       ->where("(id LIKE '%". $searchTerm . "%' OR name LIKE '%". $searchTerm . "%' OR email_address LIKE '%". $searchTerm . "%' OR phone LIKE '%". $searchTerm . "%' OR response_status LIKE '%". $searchTerm . "%')", NULL, FALSE)
                       ->get();
                $clients = $query->result_array();
            } else {
                $this->db->select('id, name, email_address, phone');
                $this->db->limit(100);
                $fetched_records = $this->db->get('email');
                $clients = $fetched_records->result_array();
            }
            $client_array = array();

            foreach ($clients as $client) {
                $client_array[]  = array("id" => $client['id'], "text" => $client['name']) ;
            }
            return $client_array;
        }
    }