<fieldset class="form-group {{ $errors->has('gameid') ? ' has-error' : '' }}">
    {!! Form::label('gameid', 'Steam Game ID', array('class' => 'gameid')) !!}
    {!! Form::text('gameid', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
    @include('errors.below_input', ['inputName' => 'gameid'])
</fieldset>

<fieldset class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Title of the game', array('class' => 'name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    @include('errors.below_input', ['inputName' => 'name'])
</fieldset>

<fieldset class="form-group {{ $errors->has('link') ? ' has-error' : '' }}">
    {!! Form::label('link', 'Link on Steam', array('class' => 'link')) !!}
    {!! Form::text('link', null, ['class' => 'form-control', 'required']) !!}
    @include('errors.below_input', ['inputName' => 'link'])
</fieldset>

<fieldset class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
    {!! Form::label('image', 'Image', array('class' => 'image')) !!}
    {!! Form::text('image', null, ['class' => 'form-control', 'id' => 'imageurl', 'required']) !!}
    @include('errors.below_input', ['inputName' => 'image'])
</fieldset>

<img src="{{ $game->image }}" alt="" class="game_edit_preview center-block" id="game_edit_image_preview">

{{--here should be 2 timestamps--}}

<br>
{!! Form::submit('Update!', ['class' => 'form-control btn btn-primary']) !!}

@push('scripts')

    {{ Html::script('js/jquery.bootstrap-touchspin.js') }}

    <script>
        $(document).ready(function() {
            $("#imageurl").on('keyup change', function() {
                $('#game_edit_image_preview').attr('src', $('#imageurl').val());
            });
        });
    </script>
@endpush