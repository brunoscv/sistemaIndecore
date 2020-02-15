<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['Projetos'] = array(
							array(
								'field' => "id",
								'label' => "Cod.",
								'rules' => ""
									),
							array(
								'field' => "nome_projeto",
								'label' => "Projeto",
								'rules' => "required"
									),
							array(
								'field' => "detalhes",
								'label' => "Detalhes",
								'rules' => "required"
									),
							array(
								'field' => "clientes_id",
								'label' => "Clientes",
								'rules' => ""
									),
							array(
								'field' => "status",
								'label' => "Status",
								'rules' => ""
									),
							array(
								'field' => "createdAt",
								'label' => "Criado",
								'rules' => ""
									),
							array(
								'field' => "updatedAt",
								'label' => "Modificado",
								'rules' => ""
									),
);

/* End of file projetos.php */
/* Location: ./system/application/config/form_validation/projetos.php */