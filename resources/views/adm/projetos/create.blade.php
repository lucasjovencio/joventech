@extends('layouts.adm.main')

@section('css')
    <link href="{{ asset('css/jquery.datetimepicker.css') }}" rel="stylesheet" />
@endsection

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Novo projeto</h4>
                </div>
            </div>
        </div>
    </div>
    
    <form action="{{ route('projeto.store') }}" method="post" class="publicacaoForm">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img id="img-capa" style="max-height: 250px" class="img-responsive" src="{{ old('imagem_destaque') ?? asset('imgs/artistic-5379496_640.jpg') }}" alt="foto de capa">
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group form-validation">
                            <label>Título</label>
                            <input data-rule="required" data-msg="Informe o título do projeto" name="titulo" type="text" class="form-control" 
                                placeholder="Título do projeto" value="{{ old('titulo') }}">
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group form-validation">
                            <label>Slug</label>
                            <input data-rule="required" data-msg="Informe o slug da publicação" name="slug" id="slug" type="text" class="form-control" 
                                placeholder="Slug" value="{{old('slug')}}">
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Imagem de capa</label>
                        <div class="input-group form-validation">
                            <span class="">
                                <a id="lfm" data-input="thumbnail" data-preview="img-capa"  class="btn choose-file text-white">
                                    <i class="fa fa-picture-o"></i> Escolha
                                </a>
                            </span>
                            <input value="{{ old('imagem_destaque') }}" data-rule="image" readonly data-msg="Informe a capa do projeto"  id="thumbnail" class="form-control button-file" type="text" name="imagem_destaque">
                        </div>
                        <div id="validation-image" class="validation"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group form-validation">
                            <label>Link externo</label>
                            <input data-rule="required" data-msg="Informe o link externo" name="titulo_externo" type="url" class="form-control" 
                                placeholder="Link externo" value="{{ old('link_externo') }}">
                            <div class="validation"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group form-validation">
                            <label>Data do projeto</label>
                            <input data-rule="required" data-msg="Informe data de publicação" type="text" class="form-control"
                                value="{{ old('publicado_em') }}" placeholder="d/m/Y H:m"  name="publicado_em" id="publicado_em">
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group form-validation">
                            <label for="visibilidade">Visibilidade</label>
                            <select data-rule="required" data-msg="Informe a visibilidade" name="visibilidade" id="visibilidade" class="form-control">
                                <option value="">Selecione...</option>
                                <option selected value="1">Visivel</option>
                                <option value="0">Privado</option>
                            </select>
                            <div class="validation"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-validation">
                                        <label for="resumo">Resumo</label>
                                        <textarea data-rule="minlen:1" data-msg="Informe o resumo" id="resumo" name="resumo" class="form-control my-editor">{!! old('resumo') !!}</textarea>
                                        <div class="validation"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-validation">
                                        <label for="conteudo">Conteudo</label>
                                        <textarea data-rule="minlen:1" data-msg="Informe o conteudo" id="conteudo" name="conteudo" class="form-control my-editor">{!! old('conteudo') !!}</textarea>
                                        <div class="validation"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">Publicar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('js/jquery.datetimepicker.js')}} "></script>
    <script src="{{ asset('js/publicacaoForm.js?v='.time())}} "></script>
    <script>
        jQuery(function($){
            $.datetimepicker.setLocale('pt-BR');
            $('#publicado_em').datetimepicker({
                format:'d/m/Y H:i',
                value:{{ old('publicado_em') ?? "new Date()" }},
                lang:'pt-BR'
            }); 
            $("#slug").val((($("#slug").val().toLowerCase().replace(/[^a-z0-9-/ /]/g, '')).replace(/ /g,"-")))
        });

        $('#slug').on('input', function (event) { 
            this.value = (this.value.replace(/[^a-z0-9-/ /]/g, '')).replace(/ /g,"-");
        });
    </script>
    <script>
        const route_prefix = "/filemanager";
        const editor_config_conteudo = 
        {
            path_absolute : "",
            selector: "#conteudo",
            relative_urls: false,
            height: 500,
            resize: true,
            plugins: [
                " advlist anchor autolink codesample fullscreen help image imagetools ",
                " lists link media noneditable  preview",
                " searchreplace table visualblocks wordcount"
            ],
            toolbar:
                    "insertfile a11ycheck undo redo | bold italic | forecolor backcolor | template codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image ",
            file_browser_callback : function(field_name, url, type, win) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
        
                let cmsURL = editor_config_conteudo.path_absolute + route_prefix + '?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }
        
                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        const editor_config_resumo = 
        {
            selector: "#resumo",
            height: 150,
            resize: false,
            toolbar:
            "undo redo | bold italic | alignleft aligncenter alignright alignjustify",
        };

        tinymce.init(editor_config_conteudo);
        // tinymce.init(editor_config_resumo);

        (function( $ )
        {
            $.fn.filemanager = function(type, options) {
                type = type || 'file';

                this.on('click', function(e) {
                    const route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
                    let target_input = $('#' + $(this).data('input'));
                    let target_preview = $('#' + $(this).data('preview'));
                    window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
                    window.SetUrl = function (items) {
                        const file_path = items.map(function (item) {
                            return item.url;
                        }).join(',');

                        // set the value of the desired input to image url
                        target_input.val('').val(file_path).trigger('change');

                        // clear previous preview
                        target_preview.html('');

                        // set or change the preview image src
                        items.forEach(function (item) {
                            console.log(item)
                            console.log(target_preview)
                            target_preview.attr('src',item.url);
                        });

                        // trigger change event
                        target_preview.trigger('change');
                    };
                    return false;
                });
            }
        })(jQuery);

        $('#lfm').filemanager('image', {prefix: route_prefix});

        const lfm = function(id, type, options) 
        {
            const button = document.getElementById(id);
            button.addEventListener('click', function () {
                const route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
                let target_input = document.getElementById(button.getAttribute('data-input'));
                let target_preview = document.getElementById(button.getAttribute('data-preview'));

                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = function (items) {
                    const file_path = items.map(function (item) {
                        return item.url;
                    }).join(',');

                    // set the value of the desired input to image url
                    target_input.value = file_path;
                    target_input.dispatchEvent(new Event('change'));

                    // clear previous preview
                    target_preview.innerHtml = '';

                    // set or change the preview image src
                    items.forEach(function (item) {
                        const img = document.createElement('img')
                        img.setAttribute('style', 'height: 5rem')
                        img.setAttribute('src', item.thumb_url)
                        target_preview.appendChild(img);
                    });

                    // trigger change event
                    target_preview.dispatchEvent(new Event('change'));
                };
            });
        };

        lfm('lfm2', 'file', {prefix: route_prefix});
    </script>
@endsection

