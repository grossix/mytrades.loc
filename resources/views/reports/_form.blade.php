<fieldset class="form-group {{ $errors->has('keys') ? ' has-error' : '' }}">
    {!! Form::label('keys', 'Amount of keys', array('class' => 'keys')) !!}
    {!! Form::text('keys', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
    @include('errors.below_input', ['inputName' => 'keys'])
</fieldset>

<fieldset class="form-group {{ $errors->has('money') ? ' has-error' : '' }}">
    {!! Form::label('money', 'Amount of money', array('class' => 'money')) !!}
    {!! Form::text('money', null, ['class' => 'form-control', 'required']) !!}
    @include('errors.below_input', ['inputName' => 'money'])
</fieldset>

<fieldset class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Description', array('class' => 'description')) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
    @include('errors.below_input', ['inputName' => 'description'])
</fieldset>

{{--here should be 2 timestamps--}}

<br>
{!! Form::submit('Update!', ['class' => 'form-control btn btn-primary']) !!}


@push('scripts')

    {{ Html::script('js/jquery.bootstrap-touchspin.js') }}

    <script>
        $(document).ready(function() {
            $("input[name='keys']").TouchSpin({
                min: 0,
                max: 99,
                step: 1,
                prefix: '<i class="fa fa-key"></i>'
            });

            $("input[name='money']").TouchSpin({
                min: 0.00,
                max: 2.48,
                step: 0.01,
                decimals: 2,
                prefix: '<i class="fa fa-dollar"></i>'
            });
        });
    </script>
@endpush