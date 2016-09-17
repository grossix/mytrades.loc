<fieldset class="form-group {{ $errors->has('game_id') ? ' has-error' : '' }}">
{{--    {!! Form::label('item_list[]', 'Item', array('class' => 'item_id')) !!}--}}
    {!! Form::label('game_id', 'Game', array('class' => 'game_id')) !!}
{{--    {!! Form::select('item_list[]', $itemz, $trade->item->id, ['class' => 'form-control']) !!}--}}
    {!! Form::select('game_id', $games, $sale->game->id, ['class' => 'form-control sale_edit_game_select', 'autofocus']) !!}
    @include('errors.below_input', ['inputName' => 'game_id'])
</fieldset>

<fieldset class="form-group {{ $errors->has('profit') ? ' has-error' : '' }}">
    {!! Form::label('profit', 'Profit', array('class' => 'profit')) !!}
    {!! Form::text('profit', null, ['class' => 'form-control', 'required']) !!}
    @include('errors.below_input', ['inputName' => 'profit'])
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {{ Html::script('js/jquery.bootstrap-touchspin.js') }}

    <script>
        $(document).ready(function() {
            $(".sale_edit_game_select").select2();

            $("input[name='profit']").TouchSpin({
                min: 0.01,
                max: 1.00,
                step: 0.01,
                decimals: 2,
                prefix: '<i class="fa fa-dollar"></i>'
            });
        });
    </script>
@endpush