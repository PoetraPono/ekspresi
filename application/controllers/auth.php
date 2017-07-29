<?php
class auth extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->helper('captcha','string');
    }
    
    function index()
    {
        redirect('login');
    }
        
    function login()
    {
        if(isset($_POST['submit']))
        {
            $username   =  $this->input->post('username');
            $password   =  $this->input->post('password');
            $capth        = strtoupper( $this->input->post('kode_aman'));
            $login=  $this->db->get_where('users',array('username'=>$username,'password'=>  md5($password)));
            if($login->num_rows()>0 and $this->session->userdata('mycaptcha')==$capth)
            //if($login->num_rows()>0)
            {
                $r=  $login->row_array();
                $data=array('id_users'=>$r['id_users'],
                            'level'=>$r['level'],
                            'sess_login_absen'=>  substr(waktu(), 0,10),
                            'keterangan'=>$r['keterangan'],
                            'username'=>$username);
                $this->session->set_userdata($data);
                $this->mcrud->update('users',array('last_login'=>  waktu()), 'username',$username);
                redirect('anggota');
            }
            else
            {
            echo $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Username, password, atau captcha anda salah !</strong> Silakan Coba lagi.
                </div>');
			redirect('auth/login');
			}
        }
        else
        {
            $vals = array(
                'img_path'	 => './captcha/',
                'img_url'	 => base_url().'captcha/',
                'img_width'	 => '100',
                'img_height' => 35,
                'word'	=> strtoupper(random_string('alnum', 5)),
                'border' => 0, 
                'expiration' => 7200
            );
            // create captcha image
            $cap = create_captcha($vals); 
            // store image html code in a variable
            $data['image'] = $cap['image'];
            // store the captcha word in a session
            $this->session->set_userdata('mycaptcha', $cap['word']);
			$this->load->view('login',$data);
        }
    }
    
    function logout()
    {
        
        $this->session->sess_destroy();
        redirect('auth/login');
    }

}