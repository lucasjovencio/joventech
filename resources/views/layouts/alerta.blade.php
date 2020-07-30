{{-- showNotification: function(from, align, msg , color , icon)  --}}
@if(session('success'))
        <script type="text/javascript">
            $(document).ready(function() {
                demo.showNotification('top','center','{{session('success')}}', 'success' ,' fa fa-check-circle')
            });
        </script>
@endif
@if(session('danger'))
        <script type="text/javascript">
            $(document).ready(function() {
                demo.showNotification('top','center','{{session('danger')}}', 'danger' ,' fa fa-times')
            });
        </script>
@endif

<script type="text/javascript">
    $(function(){
        $('form').submit(function(){
            let isOk = true;
            const maxSize = parseInt(2048, 10)
            $('input[type=file]').each(function(){
                if(typeof this.files[0] !== 'undefined'){
                    const size = this.files[0].size;
                    isOk = maxSize > (size/1000);
                    if (!isOk){
                        $(this).css({ 
                            "border": "2px solid red" 
                        });
                        demo.showNotification('top','center','Arquivo muito grande. Selecione um arquivo de tamanho até 2 MB.', 'danger' ,' fa fa-times')
                    }else{
                        $(this).css({ 
                            "border": "1px solid #dbdbdb" 
                        });
                    }
                    return isOk;
                }
            });
            return isOk;
        });

        $('input[type=file]').change(function(){
            let isOk = true;
            const maxSize = parseInt(2048, 10)
            $('input[type=file]').each(function(){
                if(typeof this.files[0] !== 'undefined'){
                    const size = this.files[0].size;
                    isOk = maxSize > (size/1000);
                    if (!isOk){
                        $(this).css({ 
                            "border": "2px solid red" 
                        });
                        demo.showNotification('top','center','Arquivo muito grande. Selecione um arquivo de tamanho até 2 MB.', 'danger' ,' fa fa-times')
                    }else{
                        $(this).css({ 
                            "border": "1px solid #dbdbdb" 
                        });
                    }
                    return isOk;
                }
            });
            return isOk;
        });
    });
</script>