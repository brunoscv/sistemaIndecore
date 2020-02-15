<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['Comentarios'] = array(
							array(
								'field' => "id",
								'label' => "Cod.",
								'rules' => ""
									),
							array(
								'field' => "text_comentario",
								'label' => "Comentário",
								'rules' => "required"
									),
							array(
								'field' => "clientes_id",
								'label' => "Clientes",
								'rules' => ""
                                    ),
                            array(
                                'field' => "projetos_id",
                                'label' => "Projeto",
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

/* End of file comentarios.php */
/* Location: ./system/application/config/form_validation/comentarios.php */