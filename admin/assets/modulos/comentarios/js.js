$(function() {
    $(document).ready(function(event) {
        $('#text_comentario').froalaEditor({
            toolbarButtons: ['undo', 'redo' , '|', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'outdent', 'indent', 'clearFormatting', 'insertTable', 'html'],
            toolbarButtonsXS: ['undo', 'redo' , '-', 'bold', 'italic', 'underline'],
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
                    $('#respostas').html("<p class='text-center' style='margin:3em;'><i class='fa fa-2x fa-spin fa-repeat align-middle'></i></p>"); 
                },
                complete:function(data){
                    // console.log(data);
                    console.log(data);
                },
                success: function (data) {
                $('#respostas').html("");     
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
                            $('#respostas').append(rendered);
                        }
                        // console.log(data);
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
                    $('#respostas').html("<p class='text-center' style='margin:3em;'><i class='fa fa-2x fa-spin fa-repeat align-middle'></i></p>"); 
                },
                success: function (res) {
                    console.log(res);
                    $('#respostas').html("");     
               
                    var json_obj = res; //parse JSON
                    if(res.sucesso = true) {
                        for (var i in json_obj) { 
                            var template = $('#comentarios-template').html();
                            //Mustache.parse(template); // optional, speeds up future uses
                            var rendered = Mustache.render(template, json_obj[i]);
                            $('.comment-painel').css("display", "block");
                            $('.comment-heading').css("display", "block");
                            $('.comment-body').css("display", "block");
                            $('#respostas').append(rendered);
                        }
                        
                        $('#text_comentario').froalaEditor('html.set', '');
                        toastr.success("Comentário enviado com sucesso!"); 
                    } else {
                        toastr.danger("erro!"); 
                    }
                
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