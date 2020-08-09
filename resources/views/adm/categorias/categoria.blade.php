@extends('layouts.adm.main')

@section('css')
    <link href="{{ asset('datatable-plugins/datatables.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Categorias</h4>
                </div>

                <div class="card-body">
                    <div class="col-sm-12 col-12  m-b-20">
                        <a href="#" data-toggle="modal" data-target="#create" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i>  Nova categoria</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="row alinhar-filtro">
                <div class="col-sm-3 col-sm-offset-3">
                    <label>Filtro por nome</label>
                    <input type="text" class="form-control filternome" />
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-border table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create">Cadastrar nova categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('categoria.store')}}" >
                    @method('POST')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nome</label>
                            <input required type="text" name="nome" type="text" autofocus="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input required type="text" name="slug" id="slug" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="remover" tabindex="-1" role="dialog" aria-labelledby="remover" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="remover">Remover <span class="nome-cat"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" id="removerAction" action="" >
                    @method('DELETE')
                    @csrf
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('datatable-plugins/datatables.js')}} "></script>
    <script>

        $('#slug').on('input', function (event) { 
            this.value = (this.value.replace(/[^a-z0-9-/ /]/g, '')).replace(/ /g,"-");
        });

        let table;
        let searchAjax = true;
        function fetch_data(){
            table = $('.table').DataTable({
                processing: true,
                serverSide: true,
                "ajax" : {
                    url:"{{ route('categoria.index') }}",
                    type:"GET",
                    data: {
                        'nome': function(){ return $(".filternome").val(); },
                    },
                },
                columns: [
                    {data: 'nome', name: 'nome'},
                    {data: 'action', name: 'action', class:"text-right"},
                ],
                responsive: false,
                "order": [[ 0, "ASC" ]],
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [6, 25, 50, -1],
                    [6, 25, 50, "All"]
                ],
                "language": {
                    "url": "{{asset('datatable-plugins/pt-br.json')}}"
                }
            });
        }
       
        $('.filternome').on('keyup',function(){
            if(searchAjax){
                searchAjax=false;
                table.ajax.reload(()=>{
                    searchAjax=true;
                });
            }
        });

        $(document).ready(function() {
            fetch_data();
        });
       
        function remover(e)
        {
            $(".nome-cat").html($(e).data('nome'))
            $("#removerAction").attr('action',$(e).data('src'))
        }
    </script>
@endsection

