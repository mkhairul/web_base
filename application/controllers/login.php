<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('backend/login', $this->data);
    }
    
    public function enter()
    {
        $response = array();
        
        $this->load->library('Authlib');
        if($this->authlib->login())
        {
            // Check if first time.
            $this->load->model('user_model','user');
            $response['status'] = 'success';
            $response['url'] = site_url('dashboard');
            //redirect('dashboard');
        }
        else
        {
            $this->session->set_flashdata('error', $this->auth->error);
            //redirect('login');
            $response['status'] = 'error';
        }
        echo json_encode($response);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Login.php */