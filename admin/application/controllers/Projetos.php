<?php
class Projetos extends MY_Controller {
	public $data;	
	function __construct(){
		parent::__construct();
		$this->_auth();
		
		$this->load->model("Projetos_model");
		$this->load->model("Ambientes_model");
		
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
		//Motivo 1 = Envio de arquivo(s) por: Cliente
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
							->join("clientes AS c", "p.clientes_id = c.id")
							->join("arquivos AS arq", "arq.projetos_id = p.id")
							->join("formularios AS f", "f.projetos_id = p.id")
							->join("ambientes AS a", "f.ambientes_id = a.id")
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
						->select("p.id, p.nome_projeto, p.status, p.createdAt, f.id as formularios_id, f.detalhes, f.observacoes, c.nome_responsavel, 
						a.descricao AS nome_ambiente, count(arq.id) AS qtd_arquivos")
						->from("projetos AS p")
						->join("clientes AS c", "p.clientes_id = c.id")
						->join("arquivos AS arq", "arq.projetos_id = p.id")
						->join("formularios AS f", "f.projetos_id = p.id")
						->join("ambientes AS a", "f.ambientes_id = a.id")
						->group_by("p.id")
						->order_by("p.createdAt", "DESC")
						->limit($perPage,$offset)
						->get();
		
		$this->data['listaProjetos'] = $resultProjetos->result();
		//arShow($this->data['listaProjetos']); exit;
		
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
		$ambientes = $this->Ambientes_model->get_ambientes();
		$this->data['listaAmbientes'] = array();
		$this->data['listaAmbientes'][''] = 'Selecione um Ambiente';
		foreach ($ambientes as $ambiente) {
			$this->data['listaAmbientes'][$ambiente->id] = $ambiente->descricao;
		}
		//fim Campos relacionados

		if($this->input->post('enviar')){		
			if( $this->form_validation->run('Projetos') === FALSE || !empty($this->data['msg_error']) ){
				$this->data['msg_error'] = (!empty($this->data['msg_error'])) ? $this->data['msg_error'] : validation_errors("<p>","</p>");
			} else {
				$projeto	= array();
				$projeto['nome_projeto'] 			= $this->input->post('nome_projeto', TRUE);
				$projeto['clientes_id'] 			= 1;
				$projeto['status'] 					= 1;
				$projeto['createdAt'] 				= date("Y-m-d H:i:s");
				
				$this->db->insert("projetos", $projeto);
				$projeto_id = $this->db->insert_id();

				$this->salvar_formularios($projeto_id);
				$this->salvar_arquivos($projeto_id);
			}
		}
		// $this->load->view("modulos/projetos/criar", $this->data);
	}
	
	
    
	public function editar(){
		$id = $this->uri->segment(3);
		
		//Campos relacionados
		//caso seja necessario adicione os relacionamento aqui
		//fim Campos relacionados
		
		$projeto = $this->db->from("projetos AS m")->where("id", $id)->get()->row();

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

	public function gerenciar() {
		$projeto_id = $this->uri->segment(3);

		$result = $this->db->from("projetos as p")->where("id", $projeto_id)->get()->row();

		if(!$result) {
			$this->session->set_flashdata("msg_error", "Registro não encontrado!");
			redirect('projetos/index');
		} else {
			$projeto = array();
			$projeto = $this->db
				->select("p.id, p.nome_projeto, p.status, p.createdAt, f.id as formularios_id, f.detalhes, f.observacoes, c.nome_responsavel, 
				a.descricao AS nome_ambiente, count(arq.id) AS qtd_arquivos")
				->from("projetos AS p")
				->join("clientes AS c", "p.clientes_id = c.id")
				->join("arquivos AS arq", "arq.projetos_id = p.id")
				->join("formularios AS f", "f.projetos_id = p.id")
				->join("ambientes AS a", "f.ambientes_id = a.id")
				->where("p.id", $projeto_id)
				->group_by('p.id')
				->get();
			$this->data['resultProjeto'] = $projeto->result();

			//arShow($this->data['resultProjeto']);

			$projetoArquivos = $this->db
				->select("a.id, a.descricao as nome_arquivo, a.status, a.createdAt, p.id AS projetos_id")
				->from("arquivos AS a")
				->join("projetos AS p", "a.projetos_id = p.id")
				->where("p.id", $projeto_id)
				->get();
			$this->data['resultProjetoArquivos'] = $projetoArquivos->result();
			// arShow($this->data['resultProjetoArquivos']);

			// $this->load->view("modulos/projetos/gerenciar", $this->data);
		}
	}
	
	public function delete(){
		$id = $this->uri->segment(3);
		
		$projeto = $this->db->from("projetos AS m")->where("id", $id)->get()->row();
		$this->data['item'] = $projeto;
		
		if( !$projeto ){
			$this->session->set_flashdata("msg_error", "Registro não encontrado!");
			redirect('projetos/index');
		} else {
			$this->data['item'] = $projeto;
			
			if( $this->input->post("enviar") ){
				$this->db->where("id", $projeto->id);
				$this->db->delete("projetos");
				
				$this->session->set_flashdata("msg_success", "Registro excluido com sucesso!");
				redirect('projetos/index');
			}
		}
	}

	/** Related Functions **/
	public function salvar_formularios($projeto_id) {
		$projetoForm	= array();
		$projetoForm['detalhes'] 	 = $this->input->post('detalhes', TRUE);
		$projetoForm['observacoes']  = $this->input->post('observacoes', TRUE);
		$projetoForm['ambientes_id'] = $this->input->post('ambientes_id', TRUE);
		$projetoForm['projetos_id']  = $projeto_id;
		$projetoForm['clientes_id']  = 1;
		$projetoForm['status'] 		 = 1;
		$projetoForm['createdAt'] 	 = date("Y-m-d H:i:s");
		
		$this->db->insert("formularios", $projetoForm);
	}
	public function salvar_pastas($projeto_id) {
		$projetoPasta	= array();
		$projetoPasta['motivos_id']   = 1;
		$projetoPasta['projetos_id']  = $projeto_id;
		$projetoPasta['clientes_id']  = 1;
		$projetoPasta['status'] 	  = 1;
		$projetoPasta['createdAt'] 	  = date("Y-m-d");
		
		$this->db->insert("pastas", $projetoPasta);
	}
	
	public function salvar_arquivos($projeto_id) {
		$data = array();
		if(isset($_FILES['files']['name']) && !empty($_FILES['files']['name'])){
			$filesCount = count($_FILES['files']['name']);
			for($i = 0; $i < $filesCount; $i++){
				$_FILES['file']['name']     = $_FILES['files']['name'][$i];
				$_FILES['file']['type']     = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error']    = $_FILES['files']['error'][$i];
				$_FILES['file']['size']     = $_FILES['files']['size'][$i];
				
				$config['upload_path'] = FCPATH . '/public/uploads/arquivos/' . date("Ymd");
				if( !is_dir($config['upload_path']) ){
					mkdir($config['upload_path'], 0777, TRUE);
				}
				$config['allowed_types'] 	= 'jpg|jpeg|png|pdf';
				$config['max_size']				= 2*1024;
				$config['encrypt_name'] 	= TRUE;
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if($this->upload->do_upload('file')){
					$fileData = $this->upload->data();
					$projectsFile[$i]['descricao']		= $fileData['file_name'];
					$projectsFile[$i]['tamanho'] 		= $fileData['file_size'];
					$projectsFile[$i]['tipo'] 			= $fileData['file_type'];
					$projectsFile[$i]['caminho'] 		= base_url() . 'public/uploads/arquivos/' . date("Ymd") . '/';
					$projectsFile[$i]['data_envio'] 	= date("Y-m-d H:i:s");
					$projectsFile[$i]['projetos_id']	= $projeto_id;
					$projectsFile[$i]['clientes_id']	= 1;
					$projectsFile[$i]['status'] 		= 1;
					$projectsFile[$i]['createdAt']		= date("Y-m-d H:i:s");
					if(!empty($projectsFile)){
						$this->db->insert("arquivos", $projectsFile[$i]);
					}
				}
			}
		}
	}

	public function get_comentarios($projeto_id){
		$projeto_id = $this->uri->segment(3);
		
		$projeto = $this->db->from("projetos AS m")->where("id", $projeto_id)->get()->row();
		
		$result = array();

		if( !$projeto ){
			$this->session->set_flashdata("msg_error", "Registro não encontrado!");
			$result['sucesso'] = false;
			redirect('projetos/');
		} else {
			
			$result['sucesso'] = true;
			
			$comentarios = array();	
			$comentarios = $this->db
				->select("co.id, co.comentario, co.status, DATE_FORMAT(co.createdAt, '%d/%m/%Y às %Hh%i') AS data_criado, c.nome_responsavel")
				->from("comentarios AS co")
				->join("clientes AS c", "co.clientes_id = c.id")
				->join("projetos AS p", "co.projetos_id = p.id")
				->order_by("co.createdAt", "DESC")
				->where("co.projetos_id", $projeto_id)
				->get();
			$this->data['listaComentarios'] = $comentarios->result();
			
			$result['result'] = $this->data['listaComentarios'];
		}
		header('Content-Type: application/json');
		echo json_encode($result);
		exit;
	}

	public function set_comentarios($projeto_id){
		
		$comentarios = $this->db->from("comentarios AS c")->where("projetos_id", $projeto_id)->get()->result();
		$clientes_id = $this->session->userdata('userdata')["id"];

		$result = array();

		$this->form_validation->set_rules('text_comentario', 'Comentario', 'required');
		if( $this->form_validation->run('Comentarios') === FALSE ){
			$result['falha'] = validation_errors();	
			$result['sucesso'] = false;
			$result['comentarios'] = $comentarios;
		} else {
			$data = array(
				'projetos_id' => $projeto_id,
				"comentario" => $this->input->post("text_comentario", TRUE),
				"clientes_id" => $clientes_id,
				"is_superuser" => 0,
				"status" => 1,
				"createdAt" => date("Y-m-d H:i:s")
			);
			$sql = $this->db->insert("comentarios", $data);
			
			if (!$sql) {
				$result['falha'] = "Não foi possível fazer o comentário! Verifique possíveis erros de digitação no campo abaixo e tente novamente!";	
				$result['sucesso'] = false;
			} else {
				$result['sucesso'] = true;
				$comentarios = array();	
				$comentarios = $this->db
					->select("co.id, co.comentario, co.status, DATE_FORMAT(co.createdAt, '%d/%m/%Y às %Hh%i') AS data_criado, c.nome_responsavel")
					->from("comentarios AS co")
					->join("clientes AS c", "co.clientes_id = c.id")
					->join("projetos AS p", "co.projetos_id = p.id")
					->where("co.projetos_id", $projeto_id)
					->order_by("co.createdAt", "DESC")
					->get();
				$this->data['listaComentarios'] = $comentarios->result();
				$result['comentarios'] = $this->data['listaComentarios'];
			}
		}
		
		header('Content-Type: application/json');
		echo json_encode($result);
		exit;
	}

	public function get_arquivos($projeto_id){
		$projeto_id = $this->uri->segment(3);
		$projeto = $this->db->from("projetos AS m")->where("id", $projeto_id)->get()->row();
		
		$result = array();

		if( !$projeto ){
			$this->session->set_flashdata("msg_error", "Registro não encontrado!");
			$result['sucesso'] = false;
			redirect('projetos/');
		} else {
			
			$result['sucesso'] = true;
			
			$arquivos = array();	
			$arquivos = $this->db
				->select("a.id, a.descricao AS nome_arquivo, a.tamanho, a.tipo, a.caminho, a.status, DATE_FORMAT(a.createdAt, '%d/%m/%Y às %Hh%i') AS data_criado, c.nome_responsavel")
				->from("arquivos AS a")
				->join("clientes AS c", "a.clientes_id = c.id")
				->join("projetos AS p", "a.projetos_id = p.id")
				->order_by("a.createdAt", "DESC")
				->where("a.projetos_id", $projeto_id)
				->get()	;
			$this->data['listaArquivos'] = $arquivos->result();
			
			$result['result'] = $this->data['listaArquivos'];
			//arShow($result); exit;
		}
		header('Content-Type: application/json');
		echo json_encode($result);
		exit;
	}

	public function set_arquivos($projeto_id){
		$projeto_id = $this->uri->segment(3);
		$projeto = $this->db->from("projetos AS m")->where("id", $projeto_id)->get()->row();
		
		$result = array();

		if( !$projeto ){
			$result['sucesso'] = false;
		} else {
			$data = array();
			if(isset($_FILES['files']['name']) && !empty($_FILES['files']['name'])){
				$filesCount = count($_FILES['files']['name']);
				for($i = 0; $i < $filesCount; $i++){
					$_FILES['file']['name']     = $_FILES['files']['name'][$i];
					$_FILES['file']['type']     = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error']    = $_FILES['files']['error'][$i];
					$_FILES['file']['size']     = $_FILES['files']['size'][$i];

					
					$config['upload_path'] = FCPATH . '/public/uploads/arquivos/' . date("Ymd");
					if( !is_dir($config['upload_path']) ){
						mkdir($config['upload_path'], 0777, TRUE);
					}
					$config['allowed_types'] 	= 'jpg|jpeg|png|pdf';
					$config['max_size']				= 2*1024;
					$config['encrypt_name'] 	= TRUE;
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					
					if($this->upload->do_upload('file')){
						$fileData = $this->upload->data();
						$projectsFile[$i]['descricao']		= $fileData['file_name'];
						$projectsFile[$i]['tamanho'] 		= $fileData['file_size'];
						$projectsFile[$i]['tipo'] 			= $fileData['file_type'];
						$projectsFile[$i]['caminho'] 		= base_url() . 'public/uploads/arquivos/' . date("Ymd") . '/';
						$projectsFile[$i]['data_envio'] 	= date("Y-m-d H:i:s");
						$projectsFile[$i]['projetos_id']	= $projeto_id;
						$projectsFile[$i]['clientes_id']	= 1;
						$projectsFile[$i]['status'] 		= 1;
						$projectsFile[$i]['createdAt']		= date("Y-m-d H:i:s");
						if(!empty($projectsFile)){
							$this->db->insert("arquivos", $projectsFile[$i]);
						}
					}
				}
				
				$arquivos = array();	
				$arquivos = $this->db
				->select("a.id, a.descricao AS nome_arquivo, a.tamanho, a.tipo, a.caminho, a.status, DATE_FORMAT(a.createdAt, '%d/%m/%Y às %Hh%i') AS data_criado, c.nome_responsavel")
				->from("arquivos AS a")
				->join("clientes AS c", "a.clientes_id = c.id")
				->join("projetos AS p", "a.projetos_id = p.id")
				->order_by("a.createdAt", "DESC")
				->where("a.projetos_id", $projeto_id)
				->get()->result();
				$result['sucesso'] = true;
				$result['arquivos'] = $arquivos;
			}
		}
		header('Content-Type: application/json');
		echo json_encode($result);
		exit;
	}
	/** Related Functions **/
}

/* End of file Projetoses.php */
/* Location: ./system/application/controllers/Projetoses.php */