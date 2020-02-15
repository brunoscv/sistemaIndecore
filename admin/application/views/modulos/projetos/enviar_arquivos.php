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