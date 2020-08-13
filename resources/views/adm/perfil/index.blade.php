@extends('layouts.adm.main')

@section('css')

@endsection

@section('main')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Perfil</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('perfil.update',['id'=>Auth::id()]) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input required type="text" class="form-control" name="name" placeholder="Nome"
                                    value="{{old('name',Auth::user()->name)}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sobrenome</label>
                                    <input required type="text" class="form-control" name="lastname" placeholder="Sobrenome"
                                    value="{{old('lastname',Auth::user()->lastname)}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >Email</label>
                                    <input required type="email" name="email" class="form-control" value="{{old('email',Auth::user()->email)}}" placeholder="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Foto</label>
                                <div class="input-group form-validation">
                                    <span class="">
                                        <a id="lfm" data-input="thumbnail" data-preview="img-capa"  class="btn choose-file text-white">
                                            <i class="fa fa-picture-o"></i> Escolha
                                        </a>
                                    </span>
                                    <input required value="{{ old('foto',Auth::user()->foto ?? '') }}" readonly  id="thumbnail" class="form-control button-file" type="text" name="foto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-body">
                <p class="card-text">
                    <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="javascript:void(0)">
                            <img id="img-capa" class="avatar" src="{{Auth::user()->foto ?? asset('black-dashboard-master/assets/img/default-avatar.png')}}" alt="...">
                        </a>
                        <p class="description">
                            @if(Auth::user()->isSuperAdmin())
                                Administrador
                            @else
                                Convidado
                            @endif
                        </p>
                    </div>
                </p>
                <div class="card-description">
                    
                </div>
            </div>
            <div class="card-footer">
                <div class="button-container">
                    <button href="javascript:void(0)" class="btn btn-icon btn-round btn-facebook">
                        <i class="fab fa-facebook"></i>
                    </button>
                    <button href="javascript:void(0)" class="btn btn-icon btn-round btn-twitter">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button href="javascript:void(0)" class="btn btn-icon btn-round btn-google">
                        <i class="fab fa-google-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Senha</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('perfil.update.password',['id'=>Auth::id()]) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Senha atual</label>
                                    <input required type="password" class="form-control" name="current" placeholder="Senha atual"
                                    value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nova senha</label>
                                    <input required type="password" class="form-control" name="password" placeholder="Nova senha"
                                    value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >Confirme a senha</label>
                                    <input required type="password" name="password_confirmation" class="form-control" value="" placeholder="Confirme a senha">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

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