    <!-- <div class="row"> -->
        <!-- <div class="container"> -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2em">
                <div class="panel panel-white has-shadow">
                    <div class="panel-heading">
					<h4 class="panel-title">Projeto / <?php echo (@$item->id) ? "Editar" : "Adicionar"?> </h4>
					<a href="<?php echo site_url("projetos/");?>" class="btn btn-primary pull-right"><span class="fa fa-list"></span> Todos </a>
                    </div>
                    <div class="panel-body" style="margin-top:10px;">
						<form id="form_projetos" action="<?php echo current_url(); ?>" class="form-horizontal" method="post">
							<input name="id" type="hidden" id="id" class="form-control" value="<?php echo set_value("id", @$item->id) ?>" />
							<div class="form-group">
								<label class="col-sm-2 control-label" for="nome_projeto">Nome do Projeto: </label>
								<div class="col-sm-10">
									<input name="nome_projeto" type="text" placeholder="Ex: Reforma da cozinha do apartamento." id="nome_projeto" class="form-control" value="<?php echo set_value("nome_projeto", @$item->nome_projeto) ?>" />
								<?php echo form_error('nome_projeto'); ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="ambientes_id">Ambiente: </label>
								<div class="col-sm-10">
									<?php echo form_dropdown('ambientes_id', $listaAmbientes, set_value('ambientes_id', @$item->ambientes_id), 
									'data-size="7" data-live-search="true" class="form-control fill_select btn_in own_selectbox" id="ambientes" required=""'); ?>
									<?php echo form_error('ambientes_id'); ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="detalhes">Detalhes: </label>
								<div class="col-sm-10">
									<textarea name="detalhes" placeholder="Ex: Descreva aqui os detalhes sobre o(s) ambiente(s) que você deseja modificar." 
									value="<?php echo set_value("detalhes", @$item->detalhes);?>" class="form-control" rows="5" id="detalhes"></textarea>
									<?php echo form_error('detalhes'); ?>
								</div>
							</div> 
							<div class="form-group">
								<label class="col-sm-2 control-label" for="observacoes">Observações: </label>
								<div class="col-sm-10">
									<textarea name="observacoes" placeholder="Ex: Descreva aqui as observações sobre cada ambiente que você deseja modificar." 
									value="<?php echo set_value("observacoes", @$item->observacoes);?>" class="form-control" rows="5" id="observacoes"></textarea>
									<?php echo form_error('observacoes'); ?>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label" for="file"> Arquivos: </label>
								<div class="col-sm-10">
									<div id="upload_field">
										<input type="file" name="files[]" multiple required="required"/>
										<div id="upload-img"><i class="fa fa-download"></i></div>
										<div id="upload-title">
											<h4>Não temos arquivos escolhidos nessa pasta :(</h4>
											<h4>Arraste seus arquivos aqui ou clique nessa área para escolhe-los!</h4>
										</div>
										<div class="progress">
											<div class="bar"></div >
											<div class="percent">0%</div >
										</div>
										<div id="status"></div>
									</div>
									<?php echo form_error('file'); ?>
								</div>
							</div>
							
                            <div id="upload-button">
                                <input type="submit" class="btn btn-primary" name="enviar" id="enviar" value="Enviar Projeto"/>	
								<a href="<?php echo site_url("projetos"); ?>" class="btn">
									Cancelar
								</a>
                            </div>
						</form>
					</div>
				</div>
			</div>
		<!-- </div> -->
	<!-- </div>   -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/modulos/projetos/js.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/modulos/projetos/validate.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$("#ambientes").selectpicker();
		$('form input').change(function () {
        	$('form h3').text(this.files.length + " arquivo(s) selecionado(s)");
        	$('.progress').css('display', 'block');
    	});
	});
</script>
<script>
    $(function() { 
        var bar = $('.bar'); 
        var percent = $('.percent'); 
        var status = $('#status');
        $('#form_projetos').ajaxForm({
            beforeSend: function() { 
                status.empty(); 
                var percentVal = '0%'; 
                bar.width(percentVal); 
                percent.html(percentVal); 
            }, 
            uploadProgress: function(event, position, total, percentComplete) { 
                var percentVal = percentComplete + '%'; 
                bar.width(percentVal); 
                percent.html(percentVal); 
                //console.log(percentVal, position, total); 
            }, 
            success: function() { 
                var percentVal = '100%'; 
                bar.width(percentVal); 
                percent.html(percentVal);
				
            }, 
            complete: function(xhr) {
				//status.html(xhr.responseText);
                $("#enviar").attr("disabled", true);
				toastr.success("Ação Completada com Sucesso"); 
				setTimeout(() => {
					window.location = "<?php echo site_url().'projetos';?>";
				}, 2000);
                //console.log(xhr);
            } 
        }); 
    });
</script>
<style type="text/css">
	#upload_field{
		background-color: #f5f6f7;
	}
	form input[type="file"] {
		margin: 0;
		padding: 0;
		width: calc(100% - 5em);
		height: 85%;
		outline: none;
		opacity: 0;
		position: absolute;
	}
	form div#upload-img {
		text-align:center;
		font-size: 5em;
		margin: 0 auto;
		color:#ddd;
	}
	form div#upload-title {
		text-align: center;
		color: #A9A9A9;
	}
	form div#upload-button {
		text-align:center;
		margin: 2em;
	}
	.progress  {
		display: none;
		position:relative;
		height: 25px;
		width:400px; 
		border: 1px solid #ddd; 
		padding: 1px; 
		border-radius: 0px;
		margin: 0.8em auto;
		color: #A9A9A9;
	}
	.bar { 
		background-color: #B4F5B4; 
		width:0%; 
		height:21px; 
		border-radius: 3px; 
	}
	.percent { 
		position:absolute; 
		display:inline-block; 
		top:3px; 
		left:48%; 
	}
</style>