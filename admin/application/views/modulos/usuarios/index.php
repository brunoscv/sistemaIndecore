<div id="main-wrapper" class="container" style="margin-top: 2em; height: 100vh;">
	<div class="row" data-container="all">
        <div class="col-md-12">
            <div class="panel panel-white has-shadow"> 
				<div class="panel-heading clearfix">
					<h4 class="panel-title">Usuários do Sistema</h4>
					<a href="<?php echo site_url("usuarios/criar");?>" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Novo</a>
				</div>
				<div class="panel-body" style="margin-top:10px;">
					<?php $this->load->view("layout/messages"); ?>
					<div class="table-responsive">
						<?php $this->load->view('layout/search.php'); ?>
						<table class="display table table-hover mg-top-20">
							<thead>
								<tr>
									<th>#</th>
									<th>Nome</th>
									<th>Usuário</th>
									<th>Email</th>
									<th>Criado</th>
									<th class="td-actions"></th>
								</tr>
							</thead>
							<tbody id="projects_open">
								<?php if(@$listaUsuarios) { ?>
									<?php foreach($listaUsuarios as $item): ?>
										<tr id="project_id_<?php echo $item->id; ?>">
											<td><?php echo $item->id; ?></td>	
											<td><?php echo $item->nome; ?></td>
											<!-- <td><?php echo (($item->status == 1) ? '<span class="label label-primary"> Ativo </span>' : (($item->status == 2) ? '<span class="label label-success"> Concluído </span>' : '<span class="label label-danger"> Inativo </span>')); ?></td> -->
											<!-- (($condition_1) ? "output_1" : (($condition_2) ?  "output_2" : "output_3")); -->
											<td><?php echo $item->usuario; ?></td>
											<td><?php echo $item->email; ?></td>
											<td><?php echo date("d/m/Y", strtotime($item->createdAt)); ?></td>
											<td class="td-actions">
												<button type="button" 
														class="btn btn-default fa fa-ellipsis-v" 
														id="myPopover" 
														data-toggle="popover"
														data-anamation="true"
														data-html="true"
														data-content="<a href='<?php echo site_url("usuarios/editar/".$item->id); ?>' class='editar_info'>
																		<p><i class='btn-icon-only fa fa-pencil'></i></span> Editar</p>
																		<a href='<?php echo site_url("usuarios/delete/". $item->id); ?>' class='delete_info'>
																		<p><i class='btn-icon-only fa fa-trash'></i></span> Excluir</p> "
														data-placement="bottom">
												</button>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php } else { ?>
									<tr id="presenca_consulta">
										<td><p> <i>Nenhuma consulta encontrada. </i></p></td>
										<td>.</td>
										<td>.</td>
										<td>.</td>
										<td>.</td>
										<td class="text-center"></td>   
									</tr>		
								<?php } ?>
							</tbody>
						</table>
						<div class="paginate">
							<?php echo (isset($paginacao)) ? $paginacao : ''; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function(event) {
        $('[data-toggle="popover"]').popover(); 
    });
</script>
<script src="<?php echo base_url(); ?>assets/plugins/parallax/jarallax.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/plugins/theme/js/script.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/plugins/gallery/script.js"></script> -->