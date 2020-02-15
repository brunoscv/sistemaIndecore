<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('google');
	}
	
	public function login(){
		$this->data['google_login_url']	= $this->google->get_login_url();

		if( $this->input->post("enviar") !== FALSE ){
			$this->load->model("Usuarios_model");
			if( $usuario = $this->Usuarios_model->getUsuario($this->input->post("usuario")) ){
				if( $this->encrypt->decode($usuario->senha) == $this->input->post("senha", TRUE) ){
					$usuario->perfis = $this->Usuarios_model->getPerfisId($usuario->id);
					#$usuario->setores = $this->Usuarios_model->getSetoresId($usuario->id);
					
					$usuarioLogado = array();
					$usuarioLogado['id'] 	= $usuario->id;
					$usuarioLogado['nome'] 	= $usuario->nome;
					$usuarioLogado['usuario'] 	= $usuario->usuario;
					$usuarioLogado['perfis'] 	= $usuario->perfis;
					$usuarioLogado['setores'] 	= $usuario->setores;
					$usuarioLogado['clientes_id'] = $usuario->clientes_id;
					
					$this->session->set_userdata('userdata',$usuarioLogado);
					
					$urlRedirect = "/";
					if( $this->input->post("r") ){
						$urlRedirect = base64_decode($this->input->post("r",TRUE));	
					}
					
					redirect("projetos/"); 
				} 
			} else {
				$this->data['msg_error'] = "Usuário/Senha incorretos";

			}
		}
		$this->load->view("modulos/auth/login", $this->data);
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect("auth/login");
	}

	public function oauth2callback(){
		$google_data = $this->google->validate();
		
		$session_data = array(
					'name'=> $google_data['name'],
					'email'=> $google_data['email'],
					'source'=> 'google',
					'profile_pic'=> $google_data['profile_pic'],
					'link'=> $google_data['link'],
					'sess_logged_in'=> 1
				);
		$this->session->set_userdata('googleuserdata', $session_data);
		redirect('projetos/');
	}

	public function google_logout(){
		session_destroy();
		unset($_SESSION['access_token']);
		$session_data = array('sess_logged_in'=> 0);
		$this->session->set_userdata('googleuserdata', $session_data);
		redirect('auth/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */