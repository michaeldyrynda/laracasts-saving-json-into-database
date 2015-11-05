{!! Form::model($site, [ 'route' => [ 'sites.update', $site->id, ], 'method' => 'put', ]) !!}
    <label>Site Name: {!! Form::text('name', null, [ 'placeholder' => 'Site name', ]) !!}</label>
    <label>Site Features: {!! Form::text('features', null, [ 'placeholder' => 'Site features', ]) !!}</label>

    {!! Form::submit('Edit Site') !!}
{!! Form::close() !!}
