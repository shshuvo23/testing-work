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

    <script>
        function updateQuestion(id){
            $('#question'+ id).val();
            // console.log($('#question'+ id).val());

            let question = $('#question'+ id).val();
            // console.log(question);
            $.ajax({
            url: '{{route('question.create')}}',
            type: 'get',
            data: {
                id: id,
                question: question
            },
            success: function(data) {
                console.log(data);
            }
        });
        }
    </script>

    <script>
        function updateOption(id){
            $('#option' + id).val();
            // console.log($('#option' + id).val());
            // alert(qid); to see question id->function updateOption(id, qid) pass qid on the funtion

            let option = $('#option' + id).val();
            // console.log(option);

            $.ajax({
            url: '{{route('option.create')}}',
            type: 'get',
            data: {
                id: id,
                option: option
            },
            success: function(data) {
                console.log(data);
            }
        });

        }
    </script>

    <script>
        function deleteOption(id){
           let option = $('#option' + id).val();

           $.ajax({
            url: '{{route('option.delete')}}',
            type: 'get',
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                addQuestion(false);
            }
        });

        }
    </script>

    <script>
        function deleteQustion(id){
            let question = $('#question'+ id).val();

            $.ajax({
            url: '{{route('question.delete')}}',
            type: 'get',
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
                addQuestion(false);

            }
        });
        }
    </script>
@endsection
