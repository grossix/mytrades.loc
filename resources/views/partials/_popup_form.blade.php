<button class="btn btn-info pull-right spoiler collapsed" data-toggle="collapse" data-target="#collapseExample">
    {{ $buttonName }}
</button>
<br><br>
<div class="collapse {{ $errors->any() ? 'in' : '' }}" id="collapseExample">
    {!! Form::open(array('url' => action($controllerName . '@store'))) !!}

    @include($formFolder . '._form')

    {!! Form::close() !!}
    <br>
{{--    @include('errors.list')--}}
</div>

<br><br><br>