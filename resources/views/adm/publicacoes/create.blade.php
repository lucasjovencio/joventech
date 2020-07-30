@extends('layouts.adm.main')

@section('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

    
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

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-5 pr-md-1">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" class="form-control" 
                                        placeholder="Título da publicação" value="">
                                </div>
                            </div>
                            <div class="col-md-3 px-md-1">
                                <div class="form-group">
                                    <label>Data da publicação</label>
                                    <input type="date" class="form-control" placeholder=""
                                        value="">
                                </div>
                            </div>
                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Visibilidade</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="resumo">Resumo</label>
                                    <textarea type="text" id="resumo" class="form-control" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="conteudo">Conteudo</label>
                                    <textarea type="text" id="conteudo" class="form-control" placeholder=""></textarea>
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
        <div class="col-md-4">
            <div class="card">
                <img class="img-responsive" src="https://timeline.canaltech.com.br/100805.1400/como-salvar-imagens-mais-leves-e-compactas-para-web-no-photoshop.jpg" alt="...">
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('datatable-plugins/datatables.js')}} "></script>
    <script src="https://cdn.tiny.cloud/1/wvs1p16lgeo1om9fdbrxnn40nadqu8h1fw2hze00rty6jecl/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        $(document).ready(function() {
   
            const resumo = {
                selector: "textarea#resumo",
                height: 200,
                resize: false,
                autosave_ask_before_unload: false,
                powerpaste_allow_local_images: false,
                toolbar:
                    "undo redo | bold italic | alignleft aligncenter alignright alignjustify",
            };

            const publicacao = {
                selector: "textarea#conteudo",
                height: 500,
                resize: true,
                autosave_ask_before_unload: false,
                powerpaste_allow_local_images: true,
                plugins: [
                    "a11ychecker advcode advlist anchor autolink codesample fullscreen help image imagetools tinydrive",
                    " lists link media noneditable powerpaste preview",
                    " searchreplace table tinymcespellchecker visualblocks wordcount"
                ],
                toolbar:
                    "insertfile a11ycheck undo redo | bold italic | forecolor backcolor | template codesample | alignleft aligncenter alignright alignjustify | bullist numlist | link image tinydrive",
                    content_css: '//www.tiny.cloud/css/codepen.min.css',
                    spellchecker_dialog: true,
                    spellchecker_whitelist: ['Ephox', 'Moxiecode'],
                    tinydrive_demo_files_url: '/docs/demo/tiny-drive-demo/demo_files.json',
                    tinydrive_token_provider: function (success, failure) {
                        success({ token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJqb2huZG9lIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.Ks_BdfH4CWilyzLNk8S2gDARFhuxIauLa8PwhdEQhEo' });
                    }
            };

            tinymce.init(resumo);
            tinymce.init(publicacao);
        });
    </script>
@endsection

