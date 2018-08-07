<?php
class User_model extends CI_Model{
    public function __construct(){
        $this->load->Database();
    }
    public function register($password){
        // User data array filter into htmlspecialchars
        $uname = htmlspecialchars($this->input->post('username'));
        $data = array(
            'username' => $uname,
            'password' => $password
        );

        return $this->db->insert('users', $data);
    }
    public function login($username, $password){

        $sql = ("SELECT * FROM users WHERE username = ?");
        $myquery = $this->db->query($sql, array($username));

        if($myquery->num_rows() == 1){
            $pwhash = $myquery->row(0)->password;
            if(password_verify($password, $pwhash)){
                return $myquery->row(0)->username;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function statusChange($status){
        if (NULL !== ($this->session->userdata('username'))){
            $username = $this->session->userdata('username');
            $sql = ("SELECT id FROM users WHERE username = ?");
            $query = $this->db->query($sql, $username);
            $userIDresult = $query->result_array();
            $userID = $userIDresult[0];     //get the first row of result
            $realID = $userID['id'];        //get only the ID from the row.

            $data = array(
                'user_status' => $status,
                'username' => $username
            );

            $sql = ("UPDATE users SET status = ? WHERE username = ?");
            $query = $this->db->query($sql, $data);

            $command = escapeshellcmd("/var/www/html/II1302---G3/BluetoothServer.py ".$realID." s");
            exec($command . " > /dev/null &");

        }
    }
    public function getStatus(){
        if (NULL !== ($this->session->userdata('username'))){
            $username = $this->session->userdata('username');
            $this->db->select('status')->from('users');
            $this->db->where('username', $username);
            $query=$this->db->get();
            $result=$query->result_array();
            return $result[0];
        }
    }
}

?>
