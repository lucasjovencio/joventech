@extends('layouts.adm.main')

@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: rgba(255, 255, 255, 0.8);
        }
        .choose-file{
            z-index: 3;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            border: 1px solid transparent;
            padding: .46rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            margin: -1px -1px 0px 0px;
        }
        .choose-file:hover{
            box-shadow: none !important;
            transform: initial!important;
            -webkit-transform: initial!important;
        }
        .button-file{
            font-size: 1rem;
            line-height: 1.5;
            background-image: none;
            background-clip: padding-box;
            -ms-flex: 1 1 auto;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
        }
    </style>
@endsection

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Nova publicação</h4>
                </div>
            </div>
        </div>
    </div>
    
    <form action="{{ route('publicacao.update',['publicacao'=>$publicacao->id]) }}" method="post">
        @method('PUT')
        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img id="img-capa" style="max-height: 250px" class="img-responsive" src="{{ $publicacao->imagem_destaque ?? asset('imgs/artistic-5379496_640.jpg') }}" alt="foto de capa">
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Título</label>
                            <input name="titulo" type="text" class="form-control" 
                                placeholder="Título da publicação" value="{{ $publicacao->titulo ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Imagem de capa</label>
                        <div class="input-group">
                            <span class="">
                                <a id="lfm" data-input="thumbnail" data-preview="img-capa"  class="btn choose-file text-white">
                                    <i class="fa fa-picture-o"></i> Escolha
                                </a>
                            </span>
                            <input readonly id="thumbnail" class="form-control button-file" type="text" name="imagem_destaque" value="{{ $publicacao->imagem_destaque ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Data da publicação</label>
                            <input type="date" name="publicado_em" class="form-control" placeholder=""
                                value="{{ \Carbon\Carbon::parse($publicacao->publicado_em)->format('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="visibilidade">Visibilidade</label>
                            <select name="visibilidade" id="visibilidade" class="form-control">
                                <option @if($publicacao->visibilidade == 'Publico') selected @endif value="1">Visivel</option>
                                <option @if($publicacao->visibilidade == 'Privado') selected @endif value="0">Privado</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tipo de publicação</label>
                            <select class="select2 select2-ajax-tipo-categorias" data-placeholder="Tipo de publicação" name="tipo_publicacao">
                                <option value="{{ $publicacao->tipo_publicacao }}">{{ $publicacao->tipo->nome }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Categorias</label>
                            <div id="categorias"><p>Selecione um tipo de publicação</p></div>
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
                                    <div class="form-group">
                                        <label for="resumo">Resumo</label>
                                        <textarea id="resumo" name="resumo" class="form-control my-editor">{!! old('resumo',$publicacao->resumo) !!}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="conteudo">Conteudo</label>
                                        <textarea id="conteudo" name="conteudo" class="form-control my-editor">{!! old('conteudo',$publicacao->conteudo) !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">Atualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('js/select2.min.js')}} "></script>

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
        tinymce.init(editor_config_resumo);

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
                            
                            // append(
                            //     $('<img>').css('height', '5rem').attr('src', item.thumb_url)
                            // );
                        });

                        // trigger change event
                        target_preview.trigger('change');
                    };
                    return false;
                });
            }

            $('.select2-ajax-tipo-categorias').select2({
                ajax: {
                    url: "{{route('tipo.categoria.select2')}}",
                    dataType: 'json',
                    processResults: function (data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
                        return {
                            results: data.data
                        };
                    },
                    cache: true
                }
            });
            $('.select2-ajax-tipo-categorias').on('select2:select', function (e) { 
                createCategorias(e.params.data.id);
            });

            $.ajax({
                url: "{{ route('publicacao.categoria.json',['id'=>$publicacao->id]) }}",
                type: 'GET',
                data: {
                    '_token':'{{csrf_token()}}',
                },
                success:function(data){
                    console.log(data)
                    createCategorias({{ $publicacao->tipo_publicacao }},data)
                },
                error:function(data){
                    console.log(data)
                }
            });
            
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

        function createCategorias(id,selecionados = [])
        {
            $.ajax({
                url: "{{ route('categoria.json') }}/"+id,
                type: 'GET',
                data: {
                    '_token':'{{csrf_token()}}',
                },
                success:function(data){
                    $("#categorias").html('');
                    if(data.length==0){
                        $("#categorias").append('<p>Tipo de publicação não tem categoria ainda.</p>');
                    }
                    for(key in data)
                    {
                        const categoria = data[key];
                        let checked = (selecionados.find(selecionado => selecionado.categorias_id === categoria.id)) ? 'checked' : '';
                        $("#categorias").append(`
                            <div class="ml-3">
                                <input ${checked} type="checkbox" id="categoria${categoria.id}" value="${categoria.id}" name="categorias[]">
                                <label for="categoria${categoria.id}">${categoria.nome}</label>
                                <div id="sub${categoria.id}"></div>
                            </div>
                        `);
                        for(key2 in categoria.subcategoria)
                        {
                            const subcategoria = categoria.subcategoria[key2];
                            checked = (selecionados.find(selecionado => selecionado.categorias_id === subcategoria.id)) ? 'checked' : '';
                            $("#sub"+categoria.id).append(`
                                <div class="ml-3">
                                    <input ${checked} type="checkbox" id="categoria${subcategoria.id}" value="${subcategoria.id}" name="categorias[]">
                                    <label for="categoria${subcategoria.id}">${subcategoria.nome}</label>
                                </div>
                            `); 
                        }
                    }
                },
                error:function(data){
                    console.log(data)
                }
            });
        }

        
       
    </script>
@endsection

