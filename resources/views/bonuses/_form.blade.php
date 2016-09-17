<fieldset class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Description of the bonus', array('class' => 'description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2', 'autofocus', 'required']) !!}
    @include('errors.below_input', ['inputName' => 'description'])
</fieldset>

<fieldset class="form-group {{ $errors->has('profit') ? ' has-error' : '' }}">
    {!! Form::label('profit', 'Profit', array('class' => 'profit')) !!}
{{--    {!! Form::number('profit', null, ['class' => 'form-control']) !!}--}}
    {!! Form::text('profit', '0.10', ['class' => 'form-control']) !!}
    @include('errors.below_input', ['inputName' => 'profit'])
</fieldset>

<br>
{!! Form::submit('Post!', ['class' => 'form-control btn btn-primary']) !!}

@push('scripts')
    {{ Html::script('js/jquery.bootstrap-touchspin.js') }}

    <script>
        $(document).ready(function() {
            $("input[name='profit']").TouchSpin({
                min: -2.00,
                max: 10.00,
                step: 0.01,
                decimals: 2,
                prefix: '$'
            });
        });
    </script>
@endpush