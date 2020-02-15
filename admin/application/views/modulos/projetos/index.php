
<!-- GALERIA DE CATEGORIAS -->
    <!-- <div class="row"> -->
        <!-- <div class="container"> -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2em">
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