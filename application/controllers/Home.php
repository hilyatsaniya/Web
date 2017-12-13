<?php 

/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->helper('html');
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Model');
	}
	
	public function Index()
	{
		$this->load->view('Home');
	}

	public function Indeks()
	{
		$this->load->view('Indeks');
	}

	public function user_login()
    {
     //   $this->load->view('header');
     //   $this->load->view('heade');
        $this->load->view('Login');

     //   $this->load->view('footer');
    }
    public function user_login_process() {

        $val_login = array(
                            array(
                                'field' => 'username',
                                'label' => 'username',
                                'rules' => 'required',
                                 'errors' => array('required' =>'Anda harus mengisi %s.'),
                            ),
                            array(
                                'field' => 'password',
                                'label' => 'password',
                                'rules' => 'required',
                                'errors' => array('required' =>'Anda harus mengisi %s.'),
                            ),
  
                    );
        $this->form_validation->set_rules($val_login);

        if ($this->form_validation->run() == FALSE) {
                
            $this->load->view('Login');
           
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
                );
            $result = $this->Model->login($data);
            if ($result == true) {
                $username = $this->input->post('username');
                $result = $this->Model->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->username,
                        'email' => $result[0]->email,
                  //      var_dump($result)
                        );
                    // Add user data in session
                   $this->session->set_userdata($session_data);
                    if ($this->session->userdata('username') == 'admin') {
                  //  	redirect('Home/Admin');
                    	$this->load->view('Admin');
                    }else{	
                    //	redirect('Home/Index');
                    	$this->load->view('Home');
                    }
                }
            } else {
/*                $data = array('message_display' => 'Nama Pengguna atau Password Salah');
                
                $this->session->set_userdata( $data );
*/
                echo '<script>alert("Username dan Password anda tidak cocok");</script>';
                redirect('Home/user_login','refresh');
            }
        }
    }
    public function user_registration() 
    {
//        $this->load->view('header');
        $this->load->view('Register');
//        $this->load->view('footer');
	}

	public function reg_user()
	{
        $val_reg = array(
                            array(
                                'field' => 'username',
                                'label' => 'Username',
                                'rules' => 'required|is_unique[user.username]',
                                 'errors' => array('required' =>'Anda harus mengisi %s.',
                                                    'is_unique' => '%s sudah dipakai'),
                            ),
                            array(
                                'field' => 'password',
                                'label' => 'Password',
                                'rules' => 'required|min_length[6]',
                                'errors' => array('required' =>'Anda harus mengisi %s.',
                                                    'min_length' => '%s minimal 6 karakter'),
                            ),
                            array(
                                'field' => 'cpassword',
                                'label' => 'Konfirmasi Password',
                                'rules' => 'required|matches[password]',
                                'errors' => array('required' =>'Anda harus mengisi %s.',
                                                    'matches' => '%s tidak sesuai dengan password'),
                            ),
                    
                            array(
                                'field' => 'email',
                                'label' => 'Email',
                                'rules' => 'required|is_unique[user.email]',
                                 'errors' => array('required' =>'Anda harus mengisi %s.',
                                                    'is_unique' => '%s sudah dipakai'),
                            ),
  
                    );

        $this->form_validation->set_rules($val_reg);


	    if ($this->form_validation->run() == FALSE) {
//	        $this->load->view('header');
	        $this->load->view('Register');
//	        $this->load->view('footer');
	    }else{
	        $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')) ,
                'email' =>$this->input->post('email') 
                ); 

	        $this->Model->new_user($data);
	        echo '<script>alert("Anda telah berhasil Register!  Silahkan Login");</script>';
	        redirect('Home/user_login','refresh');
//	        $this->load->view('Login');
	    }
	}
	
	public function Admin()
	{
		
		$this->load->view('Admin');
	}
	public function Admin2()
	{
		$this->load->view('Admin2');
	}
	public function Upload()
	{
		$path = './assets/pict/';
		chmod($path,0777);
		$val_file = array(
			array(
				'field' => 'nama',
				'label' => 'Judul',
				'rules' => 'required',
				'errors' => array('required' => 'Anda belum mengisi %s.'),
			),
			array(
				'field' => 'Deskripsi',
				'label' => 'Deskripsi',
				'rules' => 'required',
				'errors' => array('required' => 'Anda belum mengisi %s.'),
			),
		);

		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 2048;
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		
		$this->form_validation->set_rules($val_file);
		$this->load->library('upload');
		$this->upload->initialize($config);

		if($this->form_validation->run()==FALSE){
			$this->load->view('Admin');
		}else{
			$this->upload->do_upload('images');
			$data_upload=$this->upload->data();
			/*echo "<pre>";
			print_r($_FILES);
			echo "</pre>";
			
			echo "<pre>";
			print_r($data_upload);
			echo "</pre>";*/
			$image_path=$data_upload['full_path'];
			
			$data = array(
					'Gambar' =>$image_path ,
					'Judul'=>$this->input->post('nama'),
					'Deskripsi'=>$this->input->post('Deskripsi'),
					 );
			$data1 = array(
					'Judul' => $this->input->post('nama'),
					'n_kategori' => $this->input->post('kategori'),
			);
			
			$this->Model->insert_kategori($data1);
			$this->Model->Upload($data);
			$this->load->view('Admin2');
		}
		
	}

	public function Upload2()
	{
		$path = './assets/pict';
		chmod($path, 0777);
		$val_file2 = array(
			array(
				'field' => 'nama',
				'label' => 'Judul',
				'rules' => 'required',
				'errors' => array('required' => 'Anda belum mengisi %s.'),
			),
		);

//		$config['upload_path'] = $path;
		$config['allowed_types'] = 'pdf|docx';
		$config['max_size'] = 2048;
		$config['max_width'] = 0;
		$config['max_height'] = 0;

		//$judul=$this->input->post('nama');

		$this->form_validation->set_rules($val_file2);

		$this->load->library('upload');
		$this->upload->initialize($config);

		if($this->form_validation->run()==FALSE){
			$this->load->view('Admin2');
		}
		else{
			$judul = $this->input->post('nama');
			$up_id = $this->Model->get_id($judul);
			$id_up = $up_id[0]->id;

			$this->upload->do_upload('file');
			$data_upload1=$this->upload->data();
			$file_path=$data_upload1['full_path'];
			$data=array(
						'id' =>$id_up,
						'Judul' => $judul,
						'File'=>$file_path,
						);
			/*echo "<pre>";
			var_dump($data);
			echo "</pre>";
			die();*/
			$this->Model->Upload2($data);
			redirect('index');
		}
		
	}

	public function show_all()
	{
		$data['books']=$this->Model->Indeks();
		$this->load->view('Indeks',$data);
		//var_dump($data);


	}

	public function logout()
	{
		$this->session->sess_destroy();
		echo '<script>alert("Anda telah berhasil Log Out");</script>';
		redirect('Home/Index','refresh');
	//	$this->load->view('Home');

	}

	public function search()
    {
        $keyword    =   $this->input->post('search');
        $data['books']    =   $this->Model->search($keyword);
        
        //var_dump($data);

        $this->load->view('Indeks',$data);

    }


}

 ?>