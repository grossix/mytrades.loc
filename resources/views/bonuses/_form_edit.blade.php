<fieldset class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Description', array('class' => 'description')) !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'autofocus']) !!}
    @include('errors.below_input', ['inputName' => 'description'])
</fieldset>

<fieldset class="form-group {{ $errors->has('profit') ? ' has-error' : '' }}">
    {!! Form::label('profit', 'Profit', array('class' => 'profit')) !!}
    {!! Form::text('profit', null, ['class' => 'form-control', 'required']) !!}
    @include('errors.below_input', ['inputName' => 'profit'])
</fieldset>

{{--here should be 2 timestamps--}}

<br>
{!! Form::submit('Update!', ['class' => 'form-control btn btn-primary']) !!}

@push('scripts')

    {{ Html::script('js/jquery.bootstrap-touchspin.js') }}

    <script>
        $(document).ready(function() {
            $("input[name='profit']").TouchSpin({
                min: -10.00,
                max: 99.99,
                step: 0.01,
                decimals: 2,
                prefix: '<i class="fa fa-dollar"></i>'
            });
        });
    </script>
@endpush