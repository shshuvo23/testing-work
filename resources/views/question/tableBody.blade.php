
@foreach ($questions as $question)

<div class="card-body" id="divQus" style="border: 1px solid #000; margin-bottom: 10px;">
    <div class="row">
        <div class="col-md-8">
            <input style="display: inline"; type="text" onchange="updateQuestion({{$question->id}})" name="question" id="question{{$question->id}}" value="{{$question->question}}" class="form-control">
        </div>
        <div class="col-md-4">
            <button onclick="deleteQustion({{$question->id}})"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <table>
                {{-- <th></th> --}}
                <tbody id="tbody">
                    @foreach (\App\Models\Option::where('question_id', $question->id)->get() as $option)
                        <tr>
                            <th scope="col">{{ $loop->iteration }}</th>
                            <th scope="row"><input type="text" onchange="updateOption({{$option->id}},{{$question->id}})" name="option" id="option{{$option->id}}" value="{{$option->option}}" class="form-control"></th>
                            <th><button onclick="deleteOption({{$option->id}})"><i class="fa-solid fa-xmark"></i></button></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button onclick="addOption({{$question->id}})" class="btn btn-sm btn-secondary">Add option</button>
    </div>
</div>

@endforeach
