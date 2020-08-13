@extends('layouts.adm.main')

@section('css')
    <style>
        .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
            color: #FFF;
        }
    </style>
@endsection

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Mensagem</h4>
                </div>

                <div class="card-body">
                    <div class="col-sm-12 col-12">
                        <a href="#" onclick="document.getElementById('removerAction').submit()" class="btn btn-primary btn-rounded float-right  mt-4"><i class="fa fa-minus"></i>  Remover mensagem</a>
                    </div>

                    <form method="POST" action="" >
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input readonly type="text" class="form-control" value="{{ $contato->nome ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Assunto</label>
                                    <input readonly type="text" class="form-control" value="{{ $contato->assunto ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Codigo</label>
                                    <input readonly type="text" class="form-control" value="{{ $contato->codigo ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input readonly type="text" class="form-control" value="{{ $contato->email ?? ''}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mensagem</label>
                                    <textarea class="form-control" cols="30" rows="10">{{ $contato->mensagem ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" id="removerAction" action="{{route('contato.destroy',['contato'=>$contato->id])}}" >
        @method('DELETE')
        @csrf
    </form>
@endsection

@section('js')

@endsection

