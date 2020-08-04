@extends('layouts.adm.main')

@section('css')
    <link href="{{ asset('css/jquery.datetimepicker.css') }}" rel="stylesheet" />
@endsection

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Novo depoimento</h4>
                </div>
            </div>
        </div>
    </div>
    
    <form action="{{ route('depoimento.update',['depoimento'=>$depoimento->id]) }}" method="post" class="publicacaoForm">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img id="img-capa" style="max-height: 250px" class="img-responsive" src="{{ $depoimento->imagem_destaque ?? asset('imgs/artistic-5379496_640.jpg') }}" alt="foto de capa">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Imagem de capa</label>
                        <div class="input-group form-validation">
                            <span class="">
                                <a id="lfm" data-input="thumbnail" data-preview="img-capa"  class="btn choose-file text-white">
                                    <i class="fa fa-picture-o"></i> Escolha
                                </a>
                            </span>
                            <input value="{{ $depoimento->imagem_destaque ?? asset('imgs/artistic-5379496_640.jpg') }}" data-rule="image" readonly data-msg="Informe a capa da publicação"  id="thumbnail" class="form-control button-file" type="text" name="imagem_destaque">
                        </div>
                        <div id="validation-image" class="validation"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group form-validation">
                            <label>De</label>
                            <input data-rule="required" data-msg="Informe o nome do autor" name="titulo" type="text" class="form-control" 
                                placeholder="De" value="{{ old('titulo',$depoimento->titulo) }}">
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group form-validation">
                            <label>Data do depoimento</label>
                            <input data-rule="required" data-msg="Informe data do depoimento" type="text" class="form-control"
                            value="{{ $depoimento->publicado_em }}"  placeholder="d/m/Y H:m"  name="publicado_em" id="publicado_em">
                            <div class="validation"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group form-validation">
                            <label for="visibilidade">Visibilidade</label>
                            <select data-rule="required" data-msg="Informe a visibilidade" name="visibilidade" id="visibilidade" class="form-control">
                                <option value="">Selecione...</option>
                                <option @if($depoimento->visibilidade == 'Publico') selected @endif value="1">Visivel</option>
                                <option @if($depoimento->visibilidade == 'Privado') selected @endif value="0">Privado</option>
                            </select>
                            <div class="validation"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-validation">
                                    <label for="resumo">Depoimento</label>
                                    <textarea data-rule="minlen:1" data-msg="Informe o depoimento" id="resumo" name="resumo" class="form-control my-editor">{!! old('resumo',$depoimento->resumo ?? '') !!}</textarea>
                                    <div class="validation"></div>
                                </div>
                            </div>
                        </div>
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
    <script src="{{ asset('js/jquery.datetimepicker.js')}} "></script>
    <script src="{{ asset('js/publicacaoForm.js?v='.time())}} "></script>
    <script>
        jQuery(function($){
            $.datetimepicker.setLocale('pt-BR');
            $('#publicado_em').datetimepicker({
                format:'d/m/Y H:i',
                formatDate:'Y-m-d H:i',
                value:{{ old('publicado_em') ?? "new Date()" }},
                lang:'pt-BR'
            }); 
        });
    </script>
    <script>
        const route_prefix = "/filemanager";
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

