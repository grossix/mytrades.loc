<fieldset class="form-group {{ $errors->has('link') ? ' has-error' : '' }}">
    {!! Form::label('link', 'Link to the game', array('class' => 'link')) !!}
    {!! Form::url('link', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
    @include('errors.below_input', ['inputName' => 'link'])
</fieldset>

<br>
{!! Form::submit('Post!', ['class' => 'form-control btn btn-primary']) !!}