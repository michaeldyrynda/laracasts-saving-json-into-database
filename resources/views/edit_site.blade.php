@extends('master')

@section('content')
    {!! Form::model($site, [ 'route' => [ 'sites.update', $site->id, ], 'method' => 'put', ]) !!}
        <label>Site Name: {!! Form::text('name', null, [ 'placeholder' => 'Site name', ]) !!}</label>
        <label>Site Features: {!! Form::text('features', null, [ 'id' => 'features', 'placeholder' => 'Site features', ]) !!}</label>

        {!! Form::submit('Edit Site') !!}
    {!! Form::close() !!}
@endsection


@section('foot_scripts')
    <script>
        $(document).ready(function() {
            $('#features').select2();
        });
    </script>
@endsection
