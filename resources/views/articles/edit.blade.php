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
        {{ Form::model($article, array('route' => array('article.update', $article->id), 'method' => 'PUT')) }}
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'description') }}
                {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('price', 'Price') }}
                {{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('total_in_shelf', 'Total In Shelf') }}
                {{ Form::text('total_in_shelf', Input::old('name'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('total_in_vault', 'Total In Vault') }}
                {{ Form::text('total_in_vault', Input::old('name'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('store', 'Store') }}
            {{
                Form::select('store', $storeList)
            }}
            </div>
            {{ Form::submit('Create Article', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
@stop