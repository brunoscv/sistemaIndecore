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
                    <div class="panel-body">
						<ul class="nav nav-pills">
                            <li class="active"><a href="#active" status="1" data-toggle="tab">Projeto(s) Ativo(s)</a></li>
                            <li class=""><a href="#done" status="2" data-toggle="tab">Projeto(s) Concluído(s)</a></li>
                            <li class=""><a href="#unactive" status="0" data-toggle="tab">Projeto(s) Inativo(s)</a></li>
                        </ul>
                    </div>
                </div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php foreach ($listaProjetos as $key => $item) { ?>
                    <div class="panel panel-white panel-project-active has-shadow">
                        <div class="panel-heading" style="display:flex; height:75px">
                            <div style="width: 2em; font-size:2em; color: #5cb85c;">
                                <i class="fa fa-folder"></i>
                            </div>
                            <div style="width: calc(100% - 13em);">
                                <div><strong> <?php echo '#' . $item->id . ' - ' . $item->nome_projeto;?></strong></div>
                                <div><span><?php echo 'Ambiente > ' . $item->nome_ambiente;?></span></div>
                            </div>
                            <div style="width: 20em;">
                                <a href="<?php echo base_url().'projetos/gerenciar/'. $item->id;?>" class="btn btn-primary pull-right"><i class="fa fa-gear"></i> Gerenciar</a>
                            </div>
                        </div>
                        <div class="panel-body" style="display: flex;">
                            <div style="min-width:25%"><span><strong>Data envio:</strong> <?php echo date("d/m/Y", strtotime($item->createdAt));?></span></div>
                            <div style="min-width:20%"><strong>Status:</strong> <td><?php echo ($item->status == 1 ? '<span class="label label-success"> Ativo </span>' : '<span class="label label-danger"> Inativo </span>') ?></td></div>
                            <div style="min-width:35%"><strong>Cliente:</strong> <span><?php echo $item->nome_responsavel;?></span></div>
                            <div style="min-width:20%">
                                <ul class="nav navbar-nav">
                                    <li class="presentation" style="margin: 0 0.5em">
                                        <span><a href="" title="anexos"><i class="fa fa-paperclip"></i> <?php echo '(' . $item->qtd_arquivos . ')';?> </a></span>
                                    </li>
                                    <li class="presentation" style="margin: 0 0.5em">
                                    <span><a href="" title="comentários"><i class="fa fa-comment-o"></i> (0) </a></span>
                                    </li>
                                    <li class="presentation" style="margin: 0 0.5em">
                                    <span><a href="" title="projetos"><i class="fa fa-file-pdf-o"></i> (0) </a></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>  
            </div>
        <!-- </div> -->
    <!-- </div>   -->
</section>

<!-- GALERIA DE CATEGORIAS -->
<!-- Script Template Mustache -->
<script id="user-template" type="x-tmpl-mustache">
    <tr id="project_id_{{id}}">
        <td>{{id}}</td>
        <td>{{descricao}}</td>
        <td>{{nome_responsavel}}</td>
        <td>{{{status_btn}}}</td>
        <td>{{createdAt}}</td>
        <td>{{{action_btn}}}</td>
    </tr>	
</script>
<!-- Script Template Mustache -->

<script src="<?php echo base_url(); ?>assets/plugins/parallax/jarallax.min.js"></script>
</body>
</html> 