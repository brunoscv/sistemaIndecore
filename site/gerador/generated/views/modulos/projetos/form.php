<div id="main-wrapper" class="container">
	<div class="row" data-container="all">
        <div class="col-md-12">
			<div class="panel panel-white has-shadow">
				<div class="panel-heading clearfix">
					<h4 class="panel-title">Projetos / <?php echo (@$item->id) ? "Editar" : "Adicionar"?> </h4>
					<a href="<?php echo site_url("projetos/");?>" class="btn btn-primary pull-right"><span class="fa fa-list"></span> Ir para a Listagem</a>
				</div>
				<div class="panel-body" style="margin-top:10px;">
					<?php $this->load->view('layout/messages.php'); ?>
					<form id="form_projetos" action="<?php echo current_url(); ?>" class="form-horizontal" method="post">
																				<div class="form-group">
								<label class="col-sm-2 control-label" for="id">Cod.</label>
								<div class="col-sm-10">
									<input name="id" type="text" id="id" class="form-control" value="<?php echo set_value("id", @$item->id) ?>" />
								<?php echo form_error('id'); ?>
								</div>
							</div>
																											<div class="form-group">
								<label class="col-sm-2 control-label" for="nome_projeto">Projeto</label>
								<div class="col-sm-10">
									<input name="nome_projeto" type="text" id="nome_projeto" class="form-control" value="<?php echo set_value("nome_projeto", @$item->nome_projeto) ?>" />
								<?php echo form_error('nome_projeto'); ?>
								</div>
							</div>
																											<div class="form-group">
								<label class="col-sm-2 control-label" for="clientes_id">Clientes</label>
								<div class="col-sm-10">
									<input name="clientes_id" type="text" id="clientes_id" class="form-control" value="<?php echo set_value("clientes_id", @$item->clientes_id) ?>" />
								<?php echo form_error('clientes_id'); ?>
								</div>
							</div>
																											<div class="form-group">
								<label class="col-sm-2 control-label" for="status">Status</label>
								<div class="col-sm-10">
									<input name="status" type="text" id="status" class="form-control" value="<?php echo set_value("status", @$item->status) ?>" />
								<?php echo form_error('status'); ?>
								</div>
							</div>
																											<div class="form-group">
								<label class="col-sm-2 control-label" for="createdAt">Criado</label>
								<div class="col-sm-10">
									<input name="createdAt" type="text" id="createdAt" class="form-control" value="<?php echo set_value("createdAt", @$item->createdAt) ?>" />
								<?php echo form_error('createdAt'); ?>
								</div>
							</div>
																											<div class="form-group">
								<label class="col-sm-2 control-label" for="updatedAt">Modificado</label>
								<div class="col-sm-10">
									<input name="updatedAt" type="text" id="updatedAt" class="form-control" value="<?php echo set_value("updatedAt", @$item->updatedAt) ?>" />
								<?php echo form_error('updatedAt'); ?>
								</div>
							</div>
																			
						<div class="form-actions">
							<div class="col-sm-10 col-offset-2">
								<input type="submit" name="enviar" class="btn btn-primary" value="Salvar" />
								<a href="<?php echo site_url("projetos"); ?>" class="btn">
									Cancelar
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/modulos/projetos/js.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/modulos/projetos/validate.js"></script>