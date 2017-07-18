<div class="boxed sticky push-down-30">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <div class="widget-author__content">
                <h4>{{ $title or '' }}</h4>
                <form enctype="multipart/form-data" id="upload_form" role="form" method="POST" action="" >
                    <div class="form-group">
                        <label for="catagry_name">Name</label>
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <input type="text" class="form-control" id="catagry_name" placeholder="Name" name="name">
                        <p class="invalid">Enter Catagory Name.</p>
                    </div>
                    <div class="form-group">
                        <label for="catagry_name">Logo</label>
                        <input type="file" name="logo" class="form-control" id="catagry_logo">
                        <p class="invalid">Enter Catagory Logo.</p>
                    </div>
                </form>
                <div class="modelFootr">
                    <button type="button" class="addbtn">Add</button>
                    <button type="button" class="cnclbtn">Reset</button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('head_scripts')
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
@endsection

@section('app_scripts')
    @parent
    <script>
        $(function() {
            $(".addbtn").click(function(){
                $.ajax({
                    url:'',
                    data: new FormData($("#upload_form")[0]),
                    dataType:'html',
                    type:'post',
                    processData: false,
                    contentType: false,
                    success:function(response){
                        if (response == 'OK') {
                            alert('Файл успешно загружен');
                        } else {
                            alert('Неудача');
                        }
                    }
                });
            });
        });

        /*
         new FormData($("#upload_form")[0]),
         */
    </script>
@endsection
