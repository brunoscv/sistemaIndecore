    <!-- <div class="row"> -->
        <!-- <div class="container"> -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:2em">
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
<!-- <script src="<?php echo base_url(); ?>assets/plugins/parallax/jarallax.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/modulos/projetos/js.js"></script>
<script src="<?php echo base_url(); ?>assets/modulos/comentarios/validate.js"></script>