<fieldset class="form-group {{ $errors->has('item_id') ? ' has-error' : '' }}">
    {!! Form::label('item_id', 'Select traded item', array('class' => 'item_id')) !!}
    {!! Form::select('item_id', $itemz, null, [
        'class' => 'form-control trade_item_select',
        'style' => 'width:100%',
        'placeholder' => 'Choose an item',
        'required',
        'autofocus'])
    !!}
    @include('errors.below_input', ['inputName' => 'item_id'])
</fieldset>

<fieldset class="form-group {{ $errors->has('profit') ? ' has-error' : '' }}">
    {!! Form::label('profit', 'Sold by', array('class' => 'profit')) !!}
{{--    {!! Form::number('profit', '2.70', ['class' => 'form-control', 'min' => '0.01', 'max' => '99', 'step' => '0.01']) !!}--}}
    {!! Form::text('profit', '2.70', ['class' => 'form-control']) !!}
    @include('errors.below_input', ['inputName' => 'profit'])
</fieldset>

<br>
{!! Form::submit('Post!', ['class' => 'form-control btn btn-primary']) !!}


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    {{ Html::script('js/jquery.bootstrap-touchspin.js') }}

    <script>
        $(document).ready(function() {
            $(".trade_item_select").select2({
                placeholder: "Select an item"
            });

            $("input[name='profit']").TouchSpin({
                min: 2.50,
                max: 100.00,
                step: 0.01,
                decimals: 2,
                prefix: '$'
            });
        });
    </script>
@endpush

