@if($errors->any())
    {{--Warning, this block has id, if there will be 2 or more on 1 page - error--}}
    <div class="alert alert-danger form-errors-list">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif