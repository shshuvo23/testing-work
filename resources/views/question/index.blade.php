@extends('master')


@section('body')
    <div class="container">
        <div class="row">
            <div id="divQus">

            </div>
            <div>
                <span onclick="addQuestion(true)" class="btn btn-sm btn-primary ">Add qustion</span>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
         function addOption(id){
            $.get('{{route('question.option')}}',{id:id},function(){
                addQuestion(false);
        });
     }
    </script>
    <script>
        addQuestion(false)
         function addQuestion(addQuestion){
            $.get('{{route('question.add')}}',{key:addQuestion},function(daynamic){
           $('#divQus').html(daynamic)
        });
     }
    </script>
@endsection
