@if (count($errors) > 0)
    <div class="alert alert-error alert-danger">
        <strong>Error!</strong>&nbsp;

        @if (is_array($errors->all()))
            {{ head($errors->all()) }}
        @else
            {{ $errors->first() }}
        @endif
    </div>
@endif

@if (session('notice'))
    <div class="alert alert-success">
        <strong>Success!</strong>&nbsp;{{{ session('notice') }}}
    </div>
@endif
