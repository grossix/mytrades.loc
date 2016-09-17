<fieldset class="form-group {{ $errors->has('item_id') ? ' has-error' : '' }}">
{{--    {!! Form::label('item_list[]', 'Item', array('class' => 'item_id')) !!}--}}
    {!! Form::label('item_id', 'Item', array('class' => 'item_id')) !!}
{{--    {!! Form::select('item_list[]', $itemz, $trade->item->id, ['class' => 'form-control']) !!}--}}
    {!! Form::select('item_id', $itemz, $trade->item->id, ['class' => 'form-control trade_edit_item_select', 'autofocus']) !!}
    @include('errors.below_input', ['inputName' => 'item_id'])
</fieldset>

<fieldset class="form-group {{ $errors->has('keys') ? ' has-error' : '' }}">
    {!! Form::label('keys', 'Keys', array('class' => 'keys')) !!}
    {!! Form::text('keys', null, ['class' => 'form-control']) !!}
    @include('errors.below_input', ['inputName' => 'keys'])
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {{ Html::script('js/jquery.bootstrap-touchspin.js') }}

    <script>
        $(document).ready(function() {
            $(".trade_edit_item_select").select2();

            $("input[name='keys']").TouchSpin({
                min: 0,
                max: 99,
                step: 1,
                prefix: '<i class="fa fa-key"></i>'
            });

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