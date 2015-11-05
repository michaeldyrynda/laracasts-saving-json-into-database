@extends('master')

@section('content')
    {!! Form::open([ 'route' => 'sites.store', 'method' => 'post', 'role' => 'form', ]) !!}

        <label>Site Name: {!! Form::text('name', null, [ 'placeholder' => 'Site name', ]) !!}</label>
        <label>Site Features: {!! Form::text('features', null, [ 'id' => 'features', 'placeholder' => 'Site features', ]) !!}</label>

        {!! Form::submit('Create Site') !!}

    {!! Form::close() !!}
@endsection

@section('foot_scripts')
    <script>
        $(document).ready(function() {
            $('#features').select2({ tags: [], });
        });
    </script>
@endsection
