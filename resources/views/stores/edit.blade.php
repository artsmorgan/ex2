@extends('layouts.master')
@section('content')
<div class="title">
    <h1>Create Stores
        <ul class="pull-right">
            <li>
                <a href="{{ URL::to('store') }}">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i> Back
                </a>
            </li>
        </ul>
    </h1>
</div>
<div class="form-wrapper">
    {{ Html::ul($errors->all()) }}
    {{ Form::model($store, array('route' => array('store.update', $store->id), 'method' => 'PUT')) }}
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::textarea('address', Input::old('address'), array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Create Store', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
</div>
@stop