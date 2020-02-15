$(function() {
    $(document).ready(function(event) {
        $('#text_comentario').froalaEditor({
            toolbarButtons: ['undo', 'redo' , '|', 'bold', 'italic', 'underline', 'strikeThrough', 'formatOL', 'formatUL', 'html'],
            toolbarButtonsXS: ['undo', 'redo' , '-', 'bold', 'italic', 'underline'],
            quickInsertTags:[],
            height: 130,
            language: 'pt_br'
        });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var funcionalidade = $(e.target).attr("funcionalidade"); //activated tab
            var projeto_id = $(e.target).attr("projeto_id"); //activated tab
            $.ajax({
                url:  base_url + 'projetos/get_' + funcionalidade + '/' + projeto_id,
                type: 'GET',
                context: this,
                dataType:"json",
                data: {funcionalidade: funcionalidade, projeto_id : projeto_id},
                beforeSend:function(){
                    $('#conteudo_'+ funcionalidade).html("<p class='text-center' style='margin:3em;'><i class='fa fa-2x fa-spin fa-repeat align-middle'></i></p>"); 
                },
                complete:function(data){
                    // console.log(data);
                    console.log(data);
                },
                success: function (data) {
                $('#conteudo_'+ funcionalidade).html("");     
                // $('#teste').html(""); 
                var json_obj = data.result; //parse JSON
                    if(data.result.sucesso = true) {
                        for (var i in json_obj) { 
                            var template = $('#' + funcionalidade + '-template').html();
                            //Mustache.parse(template); // optional, speeds up future uses
                            var rendered = Mustache.render(template, json_obj[i]);
                            $('.comment-painel').css("display", "block");
                            $('.comment-heading').css("display", "block");
                            $('.comment-body').css("display", "block");
                            $('#conteudo_'+ funcionalidade).append(rendered);
                        }
                        console.log(data);
                    } 
                    else { toastr.error("Ação não pode ser executada");}  
                }
            });
        });
        $("#form_comentarios").on('submit', function(e) {
            e.preventDefault();
            var form = $("#form_comentarios");
            var projeto_id = $("#btn_comentar").attr("projeto_id");
            $.ajax({
                url:  base_url + 'projetos/set_comentarios/' + projeto_id,
                type: 'post',
                // context: this,
                dataType: "json",
                data: form.serialize(),
                beforeSend:function(){
                    //$('#respostas').html("<p class='text-center' style='margin:3em;'><i class='fa fa-2x fa-spin fa-repeat align-middle'></i></p>"); 
                },
                success: function (res) {
                    console.log(res);
                    if(res.sucesso == false) {
                        $(".print-error-msg").css('display','block');
                        $(".print-error-msg").html(res.falha);
                        $('#conteudo_comentarios').append(res.comentarios);

                    } else {
                        $('#conteudo_comentarios').html("");
                        var json_obj = res.comentarios; //parse JSON
                        for (var i in json_obj) { 
                            var template = $('#comentarios-template').html();
                            //Mustache.parse(template); // optional, speeds up future uses
                            var rendered = Mustache.render(template, json_obj[i]);
                            // $('.comment-painel').css("display", "block");
                            // $('.comment-heading').css("display", "block");
                            // $('.comment-body').css("display", "block");
                            $('#conteudo_comentarios').append(rendered);
                        }
                        $('#text_comentario').froalaEditor('html.set', '');
                        toastr.success("Comentário adicionado com sucesso!")
                    }
                }, 
                complete: function (res){
                    //console.log(res);
                }
            });
        });
        
        $("#form_arquivos").on('submit', function(e) {
            //<?php echo site_url(). 'projetos/set_arquivos/' . $resultProjeto[0]->id;?>
            e.preventDefault();
            var form = $("#form_arquivos");
            var projeto_id = $("#enviar").attr("projeto_id");
                
                $.ajax({
                    url:  base_url + 'projetos/set_arquivos/' + projeto_id,
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend:function(){
                        //$('#respostas').html("<p class='text-center' style='margin:3em;'><i class='fa fa-2x fa-spin fa-repeat align-middle'></i></p>"); 
                    },
                    success: function (res) {
                        console.log(res);
                        if(res.sucesso == true) {
                            $('#conteudo_arquivos').html("");
                            var json_obj = res.arquivos; //parse JSON
                            for (var i in json_obj) { 
                                var template = $('#arquivos-template').html();
                                //Mustache.parse(template); // optional, speeds up future uses
                                var rendered = Mustache.render(template, json_obj[i]);
                                // $('.comment-painel').css("display", "block");
                                // $('.comment-heading').css("display", "block");
                                // $('.comment-body').css("display", "block");
                                $('#conteudo_arquivos').append(rendered);
                            }
                            $('#form_arquivos #files').val(null);
                            toastr.success("Arquivo adicionado com sucesso!")
                        }
                    }, 
                    complete: function (res){
                        //console.log(data);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    }
                });
        });
        $("#input").on('change', function(e) {
            var form = $(this);
            var projeto_id = $("#btn_comentar").attr("projeto_id");
            $.ajax({
                url:  base_url + 'projetos/set_comentarios/' + projeto_id,
                type: 'post',
                // context: this,
                dataType: "json",
                data: form.serialize(),
                beforeSend:function(){
                    //$('#respostas').html("<p class='text-center' style='margin:3em;'><i class='fa fa-2x fa-spin fa-repeat align-middle'></i></p>"); 
                },
                success: function (res) {
                    console.log(res);
                    if(res.sucesso == false) {
                        $(".print-error-msg").css('display','block');
                        $(".print-error-msg").html(res.falha);
                        $('#conteudo_comentarios').append(res.comentarios);

                    } else {
                        $('#conteudo_comentarios').html("");
                        var json_obj = res.comentarios; //parse JSON
                        for (var i in json_obj) { 
                            var template = $('#comentarios-template').html();
                            //Mustache.parse(template); // optional, speeds up future uses
                            var rendered = Mustache.render(template, json_obj[i]);
                            // $('.comment-painel').css("display", "block");
                            // $('.comment-heading').css("display", "block");
                            // $('.comment-body').css("display", "block");
                            $('#conteudo_comentarios').append(rendered);
                        }
                        $('#text_comentario').froalaEditor('html.set', '');
                        toastr.success("Comentário adicionado com sucesso!")
                    }
                }, 
                complete: function (res){
                    //console.log(res);
                }
            });
        });
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });
});