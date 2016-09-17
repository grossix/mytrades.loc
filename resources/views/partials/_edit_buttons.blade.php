<div class="{{ $className }} {{ $align == 'pull-right' ? $align : '' }}">
{{--<div class="{{ $className }} {{ $align }}">--}}
    @unless($controllerName == 'ItemsController')
    {!! Form::open([
            'method' => 'DELETE',
            'action' => [$controllerName . '@destroy', $item->id],
            'class' => 'delete_button ' . $align
        ])
    !!}
    {!! Form::button('<i class="fa fa-times"></i>',
        [
            'type' => 'submit',
            'class' => 'link_no_style report_button btn btn-xs btn-danger',
            'onclick' => 'return confirm(\'Do you really want to delete ' . $item->name . '?\')'
        ])
    !!}
    {!! Form::close() !!}
    @endunless
    {{--<a href="#" class="link_no_style report_button btn btn-xs btn-danger pull-right"><i class="fa fa-times"></i></a>--}}
    {{--<a href="{{ action($controllerName . '@edit', $item->id) }}" class="link_no_style report_button btn btn-xs btn-warning pull-right"><i class="fa fa-pencil"></i></a>--}}
    <a href="{{ action($controllerName . '@edit', $item->id) }}" class="link_no_style report_button btn btn-xs btn-warning edit_button {{ $align }}"><i class="fa fa-pencil"></i></a>
    @if($controllerName == 'ItemsController')
        {!! Form::open([
                'method' => 'DELETE',
                'action' => [$controllerName . '@destroy', $item->id],
                'class' => 'delete_button ' . $align
            ])
        !!}
        {!! Form::button('<i class="fa fa-times"></i>',
            [
                'type' => 'submit',
                'class' => 'link_no_style report_button btn btn-xs btn-danger',
                'onclick' => 'return confirm(\'Do you really want to delete ' . $item->name . '?\')'
            ])
        !!}
        {!! Form::close() !!}
    @endif
</div>

{{--'data-toggle' => 'modal',--}}
{{--'data-target' => '.modal-sm'--}}

{{--<div class="modal fade modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">--}}
    {{--<div class="modal-dialog modal-sm" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--123123123--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

