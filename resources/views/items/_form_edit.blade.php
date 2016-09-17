<fieldset class="form-group {{ $errors->has('condition_id') ? ' has-error' : '' }}">
{{--    {!! Form::label('item_list[]', 'Item', array('class' => 'item_id')) !!}--}}
    {!! Form::label('condition_id', 'Condition', array('class' => 'condition_id')) !!}
{{--    {!! Form::select('item_list[]', $itemz, $trade->item->id, ['class' => 'form-control']) !!}--}}
    {!! Form::select('condition_id', $conditions, $item->condition->id, ['class' => 'form-control item_edit_condition_select', 'autofocus']) !!}
    @include('errors.below_input', ['inputName' => 'condition_id'])
</fieldset>

<fieldset class="form-group {{ $errors->has('quality_id') ? ' has-error' : '' }}">
    {{--    {!! Form::label('item_list[]', 'Item', array('class' => 'item_id')) !!}--}}
    {!! Form::label('quality_id', 'Quality', array('class' => 'quality_id')) !!}
    {{--    {!! Form::select('item_list[]', $itemz, $trade->item->id, ['class' => 'form-control']) !!}--}}
    {!! Form::select('quality_id', $qualities, $item->quality->id, ['class' => 'form-control item_edit_quality_select']) !!}
    @include('errors.below_input', ['inputName' => 'quality_id'])
</fieldset>

<fieldset class="form-group {{ $errors->has('type_id') ? ' has-error' : '' }}">
    {{--    {!! Form::label('item_list[]', 'Item', array('class' => 'item_id')) !!}--}}
    {!! Form::label('type_id', 'Type', array('class' => 'type_id')) !!}
    {{--    {!! Form::select('item_list[]', $itemz, $trade->item->id, ['class' => 'form-control']) !!}--}}
    {!! Form::select('type_id', $types, $item->type->id, ['class' => 'form-control item_edit_type_select']) !!}
    @include('errors.below_input', ['inputName' => 'type_id'])
</fieldset>

<fieldset class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
    {!! Form::label('price', 'Price', array('class' => 'price')) !!}
    {!! Form::text('price', null, ['class' => 'form-control', 'required']) !!}
    @include('errors.below_input', ['inputName' => 'price'])
</fieldset>

<fieldset class="form-group {{ $errors->has('keys') ? ' has-error' : '' }}">
    {!! Form::label('keys', 'Keys', array('class' => 'keys')) !!}
    {!! Form::text('keys', null, ['class' => 'form-control']) !!}
    @include('errors.below_input', ['inputName' => 'keys'])
</fieldset>

<fieldset class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name', array('class' => 'name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @include('errors.below_input', ['inputName' => 'name'])
</fieldset>

<fieldset class="form-group {{ $errors->has('link') ? ' has-error' : '' }}">
    {!! Form::label('link', 'Link', array('class' => 'link')) !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
    @include('errors.below_input', ['inputName' => 'link'])
</fieldset>

<fieldset class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
    {!! Form::label('image', 'Image', array('class' => 'image')) !!}
    {!! Form::text('image', $item->image, ['class' => 'form-control', 'id' => 'imageurl']) !!}
{{--    {!! Form::text('image', $item->fullImage, ['class' => 'form-control', 'ng-model' => 'imageurl']) !!}--}}
    @include('errors.below_input', ['inputName' => 'image'])
</fieldset>

<img src="{{ $item->image }}" alt="" class="item_edit_preview" id="item_edit_image_preview" width="200" height="200">
{{--<img src="@{{imageurl}}" alt="" class="item_edit_preview" width="200" height="200">--}}

{{--here should be 2 timestamps--}}

<br>
{!! Form::submit('Update!', ['class' => 'form-control btn btn-primary']) !!}


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {{ Html::script('js/jquery.bootstrap-touchspin.js') }}

    <script>
        $(document).ready(function() {

            $(".item_edit_condition_select").select2();

            $(".item_edit_quality_select").select2();

            $(".item_edit_type_select").select2();

            $("input[name='price']").TouchSpin({
                min: 0.01,
                max: 250.00,
                step: 0.01,
                decimals: 2,
                prefix: '<i class="fa fa-dollar"></i>'
            });

            $("input[name='keys']").TouchSpin({
                min: 1,
                max: 99,
                step: 1,
                prefix: '<i class="fa fa-key"></i>'
            });

            $("#imageurl").on('keyup change', function() {
//                alert(228);
                $('#item_edit_image_preview').attr('src', $('#imageurl').val());
            });
        });
    </script>
@endpush