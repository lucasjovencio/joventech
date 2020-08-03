@if( $errors->any() )
    <div class="col-lg-12">
        <div class="row" @if( $errors->any() ) style="padding-top:15px;" @endif>
            @if ($errors->any())
            <div class="col-lg-12">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
@endif