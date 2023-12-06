<?php
    class Configuration_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function configure_auto_email_by_id($id) {
            $this->db->select('*');
            $this->db->where('id', $id);
            $query = $this->db->get('email_template');
            return $query->row();
        }

        public function get_email_templates() {
            $this->db->select('*');
            $query = $this->db->get('email_template');
            return $query->result();
        }

        public function get_sms_templates() {
            $this->db->select('*');
            $query = $this->db->get('sms_template');
            return $query->result();
        }

        public function get_rating_list() {
            $this->db->select('*');
            $query = $this->db->get('rating_template');
            return $query->result();
        }

        public function get_email_template_by_id($id) {
            $this->db->select('*');
            $this->db->where('id', $id);
            $query = $this->db->get('email_template');
            return $query->row();
        }

        public function get_sms_template_by_id($id) {
            $this->db->select('*');
            $this->db->where('id', $id);
            $query = $this->db->get('sms_template');
            return $query->row();
        }

        public function get_email_template_by_steps($steps) {
            $this->db->select('*');
            $this->db->where('steps', $steps);
            $query = $this->db->get('email_template');
            return $query->row();
        }

        public function get_rating_template_by_id($id) {
            $this->db->select('*');
            $this->db->where('id', $id);
            $query = $this->db->get('rating_template');
            return $query->row();
        }

        public function insert_rating_template($data) {
            $this->db->insert('rating_template', $data);
        }

        public function insert_email_template($data, $id) {
            $this->db->where('id', $id);
            $this->db->insert('email_template', $data);
        }

        public function insert_sms_template($data, $id) {
            $this->db->where('id', $id);
            $this->db->insert('sms_template', $data);
        }

        public function update_email_template($data, $id) {
            $this->db->where('id', $id);
            $this->db->update('email_template', $data);

            if ($this->db->affected_rows()) {
                return true;
            } else {
                return false;
            }
        }

        public function update_sms_template($data, $id) {
            $this->db->where('id', $id);
            $this->db->update('sms_template', $data);

            if ($this->db->affected_rows()) {
                return true;
            } else {
                return false;
            }
        }

        public function update_rating_template($data, $id) {
            $this->db->where('id', $id);
            $this->db->update('rating_template', $data);

            if ($this->db->affected_rows()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete_email_configuration($id) {
            $this->db->where('id', $id);
            $this->db->delete('email_template');
        }

        public function delete_sms_configuration($id) {
            $this->db->where('id', $id);
            $this->db->delete('sms_template');
        }

        public function delete_customer($id) {
            $this->db->where('id', $id);
            $this->db->delete('email');
        }

        public function delete_referred_customer($id) {
            $this->db->where('id', $id);
            $this->db->delete('referral');
        }

        public function delete_rating($id) {
            $this->db->where('id', $id);
            $this->db->delete('rating_template');
        }
    }