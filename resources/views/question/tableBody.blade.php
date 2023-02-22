
@foreach ($questions as $question)

<div class="card-body" id="divQus" style="border: 1px solid #000; margin-bottom: 10px;">
    <input type="text" name="question" id="question" class="form-control">
    <div class="col-md-6">
        <div class="card">
            <table>
                {{-- <th></th> --}}
                <tbody id="tbody">
                    @foreach (\App\Models\Option::where('question_id', $question->id)->get() as $option)
                        <tr>
                            <th scope="col">{{ $loop->iteration }}</th>
                            <th scope="row"><input type="text" name="option" id="option"  class="form-control"></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button onclick="addOption({{$question->id}})" class="btn btn-sm btn-secondary">Add option</button>
    </div>
</div>

@endforeach
