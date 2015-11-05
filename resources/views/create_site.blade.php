{!! Form::open([ 'route' => 'sites.store', 'method' => 'post', 'role' => 'form', ]) !!}

    <label>Site Name: {!! Form::text('name', null, [ 'placeholder' => 'Site name', ]) !!}</label>
    <label>Site Features: {!! Form::text('features', null, [ 'placeholder' => 'Site features', ]) !!}</label>

    {!! Form::submit('Create Site') !!}

{!! Form::close() !!}
