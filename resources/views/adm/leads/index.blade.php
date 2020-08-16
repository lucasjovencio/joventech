@extends('layouts.adm.main')

@section('css')
    <link href="{{ asset('datatable-plugins/datatables.css') }}" rel="stylesheet" />
@endsection

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Leads</h4>
                </div>

                <div class="card-body">
                    <div class="col-sm-12 col-12  m-b-20">
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
                            <th>Assunto</th>
                            <th>Email</th>
                            <th>Enviado em</th>
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
    <div class="modal fade" id="remover" tabindex="-1" role="dialog" aria-labelledby="remover" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="remover">Remover <span class="nome-mes"></span></h5>
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
        
        let table;
        let searchAjax = true;
        function fetch_data(){
            table = $('.table').DataTable({
                processing: true,
                serverSide: true,
                "ajax" : {
                    url:"{{ route('lead.index') }}",
                    type:"GET",
                    data: {
                        'nome': function(){ return $(".filternome").val(); },
                    },
                },
                columns: [
                    {data: 'nome', name: 'nome'},
                    {data: 'assunto', name: 'assunto'},
                    {data: 'email', name: 'email'},
                    {data: 'enviado', name: 'enviado'},
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
        
        $(document).ready(function() {
            fetch_data();
        });

        $('.filternome').on('keyup',function(){
            if(searchAjax){
                searchAjax=false;
                table.ajax.reload(()=>{
                    searchAjax=true;
                });
            }
        });

        function remover(e)
        {
            $(".nome-mes").html($(e).data('nome'))
            $("#removerAction").attr('action',$(e).data('src'))
        }
    </script>

    
@endsection

