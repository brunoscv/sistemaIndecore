<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/icone_simbolo.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Projeto Eventos</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/dropdown/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/theme/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/gallery/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select-picker/css/bootstrap-select.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toastr.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" type="text/css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/modern.css" type="text/css">
        
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    
    <![endif]-->
   
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
    </script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-form/js/jquery-form.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/dropdown/js/script.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/select-picker/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validate/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validate/jquery.validate.rules.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/mustache/mustache.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/toastr.js"></script>
</head>
<body>
  <section class="menu cid-r1uW0hkCRd" once="menu" id="menu2-0">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <!-- <img alt="Brand" src="<?php echo site_url().'assets/images/icone_simbolo.png';?>"> -->
                    Indecore
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<li role="presentation"><a href="javascript:;" class=""><i class="menu-icon fa fa-dashboard"> </i><span>  Dashboard </span></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
							<i class=" fa fa-cogs"></i> 
							<span>  Configurações</span>
								<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="fa fa fa-list"></i> Menus</a></li>
							<li><a href="#"><i class="fa fa fa-group"></i> Perfis de Acesso</a></li>
							<li><a href="#"><i class="fa fa fa-user"></i> Usuarios</a></li>
						</ul>                
					</li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gears"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo site_url("auth/logout"); ?>"><i class="fa fa-sign-out m-r-xs"></i>Sair</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>

<!-- GALERIA DE CATEGORIAS -->
<section class="categoriesCards" style="min-height:100vh;margin-top:5em; background-color:#eee">
    <!-- <div class="row"> -->
        <!-- <div class="container"> -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
											<h5>Não temos arquivos escolhidos nessa pasta :(</h5>
											<h5>Arraste seus arquivos aqui ou clique nessa área para escolhe-los!</h5>
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
</section>
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
		padding:2em;
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