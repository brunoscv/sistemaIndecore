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
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" type="text/css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/modern.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toastr.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/froala-editor/css/froala_editor.pkgd.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/froala-editor/css/froala_style.css" type="text/css">
        
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
    <script src="<?php echo base_url(); ?>assets/plugins/markdown/js/commonmark.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/froala-editor/js/froala_editor.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/froala-editor/js/lang/pt_br.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-form/js/jquery-form.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validate/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validate/jquery.validate.rules.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/dropdown/js/script.min.js"></script>
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
                    Brand
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
                <?php $this->load->view('layout/messages.php'); ?>
                <div class="panel panel-white has-shadow">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-archive"></i> Projetos</h3>
                        <a href="<?php echo site_url("projetos/criar");?>" class="btn btn-primary pull-right"><span class="fa fa-clipboard"></span> Novo Projeto</a>
                    </div>
                    <div class="panel-body"></div>
                </div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-white panel-project-active has-shadow">
                    <div class="panel-heading" style="display:flex; height:75px">
                        <div style="width: 2em; font-size:2em; color: #5cb85c;">
                            <i class="fa fa-folder"></i>
                        </div>
                        <div style="width: calc(100% - 13em);">
                            <div><strong> <?php echo '#' . $resultProjeto[0]->id . ' - ' . $resultProjeto[0]->nome_projeto;?></strong></div>
                            <div><span><?php echo 'Ambiente > ' . $resultProjeto[0]->nome_ambiente;?></span></div>
                        </div>
                        <div style="width: 20em;">
                            <a class="btn btn-primary pull-right" href="<?php echo base_url().'projetos';?>"><i class="fa fa-arrow-left"></i> Voltar</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-danger print-error-msg" style="display:none"></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:flex; margin: 1em 0;">
                            <ul class="nav nav-tabs" style="width:100%;">
                                <li class="active"><a href="#detalhes" funcionalidade="detalhes" projeto_id="<?php echo $resultProjeto[0]->id;?>" data-toggle="tab"><i class="fa fa-clipboard"></i> Detalhe(s)</a></li>
                                <li class=""><a href="#comentarios" funcionalidade="comentarios" projeto_id="<?php echo $resultProjeto[0]->id;?>" data-toggle="tab"><i class="fa fa-comment-o"></i> Comentário(s)</a></li>
                                <li class=""><a href="#arquivos" funcionalidade="arquivos" projeto_id="<?php echo $resultProjeto[0]->id;?>" data-toggle="tab"><i class="fa fa-paperclip"></i> Arquivo(s)</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="detalhes">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:flex; margin: 1em 0;">
                                    <div style="min-width:35%"><strong>Cliente:</strong> <span><?php echo $resultProjeto[0]->nome_responsavel;?></span></div>
                                    <div style="min-width:25%"><span><strong>Data envio:</strong> <?php echo date("d/m/Y", strtotime($resultProjeto[0]->createdAt));?></span></div>
                                    <div style="min-width:20%"><strong>Status:</strong> <td><?php echo ($resultProjeto[0]->status == 1 ? '<span class="label label-success"> Ativo </span>' : '<span class="label label-danger"> Inativo </span>') ?></td></div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-width:100%; margin: 1em 0;">
                                    <div style=""><strong>Detalhes: </strong> <span><?php echo $resultProjeto[0]->detalhes;?></span></div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-width:100%; margin: 1em 0;">
                                    <div style=""><strong>Observações: </strong> <span><?php echo $resultProjeto[0]->observacoes;?></span></div>
                                </div>
                            </div>
                            <div class="tab-pane" id="comentarios">
                                <form id="form_comentarios" class="form-horizontal" method="post">
							        <input name="id" type="hidden" id="id" class="form-control" value="<?php echo set_value("id", @$resultProjeto[0]->id) ?>" />
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <textarea name="text_comentario" placeholder="Escreva seu comentário aqui ..." 
                                            class="form-control" rows="5" id="text_comentario"></textarea>
                                            <?php echo form_error('text_comentario'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button id="btn_comentar" type="submit" class="btn btn-primary pull-right" projeto_id="<?php echo $resultProjeto[0]->id;?>"> Comentar </button>
                                        </div>
                                    </div>
                                </form>
                                <div id="conteudo_comentarios"></div>
                            </div>
                            <div class="tab-pane" id="arquivos">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div id="upload_field">
                                        <form id="form_arquivos" class="form-horizontal" enctype="multipart/form-data" method="post">
                                            <input name="id" type="hidden" id="id" class="form-control" value="" />
                                            <input type="file" name="files[]" multiple required="required" id="files"/>
                                            <div id="upload-img"><i class="fa fa-download"></i></div>
                                                <div id="upload-title">
                                                    <p>Arraste seus arquivos aqui ou clique nessa área para escolhe-los!</p>
                                                </div>
                                                <div class="progress">
                                                    <div class="bar"></div >
                                                    <div class="percent">0%</div >
                                                </div>
                                                <div id="status"></div>
                                                <div id="upload-button">
                                                    <!-- <button id="btn_enviar" type="submit" class="btn btn-primary" projeto_id="<?php echo $resultProjeto[0]->id;?>"> Enviar Arquivos </button> -->
                                                    <input type="submit" class="btn btn-primary" name="enviar" id="enviar" projeto_id="<?php echo $resultProjeto[0]->id;?>" value="Enviar Projeto"/>	
                                                </div>
                                            </div>
                                            <?php echo form_error('file'); ?>
                                        </form>
                                    </div>
                                    <div id="conteudo_arquivos"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div>   -->
    <style type="text/css">
	#upload_field{
        background-color: #f5f6f7;
        padding: 0.8em;
        margin: 0.8em 0;
	}
	#form_arquivos input[type="file"] {
		margin: 0;
		padding: 0;
		width: calc(100% - 3em);
		height: 6.5em;
		outline: none;
		opacity: 0;
        position: absolute;
        cursor: pointer;
	}
	#form_arquivos div#upload-img {
		text-align:center;
		font-size: 3em;
		margin: 0 auto;
		color:#ddd;
	}
	#form_arquivos div#upload-title {
		text-align: center;
		color: #A9A9A9;
	}
	#form_arquivos div#upload-button {
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
</section>

<!-- GALERIA DE CATEGORIAS -->
<!-- Script Template Mustache -->
<script id="comentarios-template" type="x-tmpl-mustache">
    <div class="painel painel-default comment-painel">
        <div class="painel-heading comment-heading">
            <span class="painel-title"><strong>{{nome_responsavel}}</strong></span>
            <span class="pull-right">{{data_criado}}</span>
        </div>
        <div class="painel-body comment-body">
                <!--use triple curly braces if you want to output html. Ex:{{{html}}} -->
                <p>{{{comentario}}}</p>
        </div>
    </div>
</script>
<!-- Script Template Mustache -->
<!-- Script Template Mustache -->
<script id="arquivos-template" type="x-tmpl-mustache">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-white panel-project-active has-shadow">
            <div class="panel-body" style="display: flex;">
                <div style="min-width:15%"><span><img class="arquivos" src="{{caminho}}{{nome_arquivo}}" width="50" height="50" /></div>
                <div style="min-width:30%; padding-top:3em;"><p><strong>Ambiente > Sala</strong></p></div>
                <div style="min-width:15%; padding-top:2em;"><p><strong>Tamanho</strong></p><span>256Kb</span></div>
                <div style="min-width:15%; padding-top:2em;"><p><strong>Tipo</strong></p><span>PNG</span></div>
                <div style="min-width:15%; padding-top:2em;"><p><strong>Data Envio</strong></p><span>25/02/2019</span></div>
                <div style="min-width:10%; padding-top:3em;">
                    <ul class="nav navbar-nav">
                        <li class="presentation" style="margin: 0 0.5em">
                            <span><a class="btn btn-primary" href="{{caminho}}{{nome_arquivo}}" title="anexos"><i class="fa fa-download"></i></a></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</script>
<!-- Script Template Mustache -->
<script src="<?php echo base_url(); ?>assets/plugins/parallax/jarallax.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modulos/projetos/js.js"></script>
<script src="<?php echo base_url(); ?>assets/modulos/comentarios/validate.js"></script>
<style type="text/css">
    .arquivos {
        width: 7em;
        height: 5em;
        margin: 1em 1em 0.5em auto;
    }
</style>
</body>
</html> 