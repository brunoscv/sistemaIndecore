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
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-form/js/jquery-form.js"></script>
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
                <div class="panel panel-white has-shadow">
                    <div class="panel-heading">
						<h4>Envio de Arquivos</h4>
                    </div>
                    <div class="panel-body">
                        <form id="myForm" enctype="multipart/form-data" action="<?php echo base_url().'projetos/salvar_arquivos';?>" method="post">
                            <input type="file" name="files[]" multiple required="required"/>
                            <div id="upload-img"><i class="fa fa-download"></i></div>
                            <div id="upload-title">
                                <h3>Não temos arquivos escolhidos nessa pasta :(</h3>
                                <h4>Arraste seus arquivos aqui ou clique nessa área para escolher seus arquivos!</h4>
                            </div>
                            <div class="progress">
                                <div class="bar"></div >
                                <div class="percent">0%</div >
                            </div>
                            <div id="status"></div>
                            <div id="upload-button">
                                <input type="submit" class="btn btn-primary" name="enviar" id="enviar" value="Enviar Arquivo(s)"/>	
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div>   -->
</section>

<script type="text/javascript">
$(document).ready(function(){  
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
        $('#myForm').ajaxForm({
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
                toastr.success("Ação Completada com Sucesso"); 
            }, 
            complete: function(xhr) {
                status.html(xhr.responseText);
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
<!-- GALERIA DE CATEGORIAS -->

<script src="<?php echo base_url(); ?>assets/plugins/parallax/jarallax.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/plugins/theme/js/script.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/plugins/gallery/script.js"></script> -->
<style type="text/css">
form{
  border: 4px dashed #ddd;
}
form input[type="file"] {
    margin: 0;
    padding: 0;
    width: calc(100% - 5em);
    height: 18em;
    outline: none;
    opacity: 0;
    position: absolute;
}
form div#upload-img {
    text-align:center;
    font-size: 10em;
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
    border-radius: 3px;
    margin: 0 auto;
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
</body>
</html> 