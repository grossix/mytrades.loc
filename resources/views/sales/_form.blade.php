<fieldset class="form-group {{ $errors->has('game_id') ? ' has-error' : '' }}">
    {!! Form::label('game_id', 'Game', array('class' => 'game_id')) !!}
    {!! Form::select('game_id', $games, null, [
        'class' => 'sale_game_select',
        'placeholder' => 'Select a game',
        'style' => 'width: 100%',
        'required',
        'autofocus'])
    !!}
    @include('errors.below_input', ['inputName' => 'game_id'])
</fieldset>

<fieldset class="form-group {{ $errors->has('profit') ? ' has-error' : '' }}">
    {!! Form::label('profit', 'Profit', array('class' => 'profit')) !!}
{{--    {!! Form::number('profit', '0.02', ['class' => 'form-control', 'min' => '0.01', 'max' => '1', 'step' => '0.01']) !!}--}}
    {!! Form::text('profit', '0.02', ['class' => 'form-control', 'required']) !!}
    @include('errors.below_input', ['inputName' => 'profit'])
</fieldset>

<fieldset class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Description of the operation', array('class' => 'description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2']) !!}
    @include('errors.below_input', ['inputName' => 'description'])
</fieldset>

<br>
{!! Form::submit('Post!', ['class' => 'form-control btn btn-primary']) !!}

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {{ Html::script('js/jquery.bootstrap-touchspin.js') }}

    <script>
        $(document).ready(function() {
            $(".sale_game_select").select2({
                placeholder: "Select a game"
            });

            $("input[name='profit']").TouchSpin({
                min: 0.01,
                max: 1,
                step: 0.01,
                decimals: 2,
                prefix: '$'
            });
        });
    </script>
@endpush

