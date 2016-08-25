@extends('layouts.master')
@section('content')
    <div class="title">
        <h1>Stores
            <ul class="pull-right">
                <li>
                    <a href="{{ URL::to('store/create') }}">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add Store
                    </a>    
                </li>
            </ul>
        </h1>
    </div>
    <div class="table-list">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>address</th>
                    <th></th>
                </tr>    
            </thead>
            <tbody>
                @foreach($stores as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->address }}</td>
                        <td>
<!--                            <a href="#" class="red"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
                            <a href="{{ URL::to('store/' . $value->id . '/edit') }}" class="btn "><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>
@stop    

