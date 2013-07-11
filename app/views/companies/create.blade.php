@extends('layouts.scaffold')

@section('main')

<h1>Create Company</h1>

{{ Form::open(array('route' => 'companies.store')) }}
    <ul>
        <li>
            {{ Form::label('brand', 'Brand:') }}
            {{ Form::text('brand') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::textarea('email') }}
        </li>

        <li>
            {{ Form::label('menus', 'Menus:') }}
            {{ Form::textarea('menus') }}
        </li>

        <li>
            {{ Form::label('phone', 'Phone:') }}
            {{ Form::textarea('phone') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


