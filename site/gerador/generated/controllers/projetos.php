<?php
class Projetos extends MY_Controller {
	public $data;	
	function __construct(){
		parent::__construct();
		$this->_auth();
		
		$this->load->model("Projetos_model");
		
		//adicione os campos da busca
				$camposFiltros["p.id"] = "Cod.";
				$camposFiltros["p.nome_projeto"] = "Projeto";
				$camposFiltros["p.clientes_id"] = "Clientes";
				$camposFiltros["p.status"] = "Status";
				$camposFiltros["p.createdAt"] = "Criado";
				$camposFiltros["p.updatedAt"] = "Modificado";
		
		$this->data['campos']    = $camposFiltros;
	}
	
	function index(){
		$perPage = '10';
		$offset = ($this->input->get("per_page")) ? $this->input->get("per_page") : "0";

		if( !is_null($this->input->get('busca')) ){
			$campo = $this->input->get('filtro_field', true);
			$valor = $this->input->get('filtro_valor', true);

			if($campo && $valor){
				if( array_key_exists($campo, $this->data['campos']) ){
					$this->db->where("{$campo} LIKE","%".$valor."%");
				}
			}
		}
		$countProjetos = $this->db
							->select("count(p.id) AS quantidade")
							->from("projetos AS p")
							->get()->row();
		$quantidadeProjetos = $countProjetos->quantidade;
		
		if( !is_null($this->input->get('busca')) ){
			$campo = $this->input->get('filtro_field', true);
			$valor = $this->input->get('filtro_valor', true);

			if($campo && $valor){
				if( array_key_exists($campo, $this->data['campos']) ){
					$this->db->where("{$campo} LIKE","%".$valor."%");
				}
			}
		}
		
		$resultProjetos = $this->db
									->select("*")
									->from("projetos AS p")
									->limit($perPage,$offset)
									->get();
		
		$this->data['listaProjetos'] = $resultProjetos->result();
		
		$this->load->library('pagination');
		$config['base_url'] = site_url("projetos/index")."?";
		$config['total_rows'] = $quantidadeProjetos;
		$config['per_page'] = $perPage;
		
		$this->pagination->initialize($config);
		
		$this->data['paginacao'] = $this->pagination->create_links(); 
	}
    
    function criar(){
		$this->data['item'] = new stdClass();
		
		//Campos relacionados
		//caso seja necessario adicione os relacionamento aqui
		//fim Campos relacionados
		
		
		if($this->input->post('enviar')){
			
			if( $this->form_validation->run('Projetos') === FALSE || !empty($this->data['msg_error']) ){
				$this->data['msg_error'] = (!empty($this->data['msg_error'])) ? $this->data['msg_error'] : validation_errors("<p>","</p>");
			} else {
				
				//Preenche objeto com as informações do formulário
								
				$projeto	= array();
													$projeto['id'] 		= $this->input->post('id', TRUE);
																	$projeto['nome_projeto'] 		= $this->input->post('nome_projeto', TRUE);
																	$projeto['clientes_id'] 		= $this->input->post('clientes_id', TRUE);
																	$projeto['status'] 		= $this->input->post('status', TRUE);
																	$projeto['createdAt'] 		= $this->input->post('createdAt', TRUE);
																	$projeto['updatedAt'] 		= $this->input->post('updatedAt', TRUE);
												$this->db->insert("projetos", $projeto);
	
				$this->data['msg_success'] = $this->session->set_flashdata("msg_success", "Registro adicionado com sucesso!");
				redirect('projetos/index');
			}
		} 
    	
    }
    
	public function editar(){
		$id = $this->uri->segment(3);
		
		//Campos relacionados
		//caso seja necessario adicione os relacionamento aqui
		//fim Campos relacionados
		

		$projeto = $this->db
						->from("projetos AS m")
						->where("id", $id)->get()->row();

		if(!$projeto){
			$this->session->set_flashdata("msg_error", "Registro não encontrado!");
			redirect('projetos/index');
		} else {
			$this->data['item'] = $projeto;
			if( $this->input->post('enviar') ){
				if( $this->form_validation->run('Projetos') === FALSE ){
					$this->data['msg_error'] = (!empty($this->data['msg_error'])) ? $this->data['msg_error'] : validation_errors("<p>","</p>");
				} else {
					
					$projeto	= array();
											$projeto['id']	= $this->input->post('id', true);
											$projeto['nome_projeto']	= $this->input->post('nome_projeto', true);
											$projeto['clientes_id']	= $this->input->post('clientes_id', true);
											$projeto['status']	= $this->input->post('status', true);
											$projeto['createdAt']	= $this->input->post('createdAt', true);
											$projeto['updatedAt']	= $this->input->post('updatedAt', true);
					
					$this->db->where("id",$id);
					$this->db->update("projetos",$projeto);
				
					$this->data['msg_success'] = $this->session->set_flashdata("msg_success", "Registro <b>#{$projeto->id}</b> atualizado!");
					redirect('projetos/index');
				}
			}
		}
	}
	
	public function delete($id){
		$id = $this->uri->segment(3);
		
		$projeto = $this->db
						->from("projetos AS m")
						->where("id", $id)->get()->row();
		$this->data['item'] = $projeto;
		
		if( !$projeto ){
			$this->data['msg_error'] = $this->session->set_flashdata("msg_error", "Registro não encontrado!");
			redirect('projetos/index');
		} else {
			$this->data['item'] = $projeto;
			
			if( $this->input->post("enviar") ){
				$this->db->where("id", $projeto->id);
				$this->db->delete("projetos");
				
				$this->data['msg_success'] = $this->session->set_flashdata("msg_success", "Registro excluido com sucesso!");
				redirect('projetos/index');
			}
		}
	}
}

/* End of file Projetoses.php */
/* Location: ./system/application/controllers/Projetoses.php */