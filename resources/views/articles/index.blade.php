@extends('layouts.master')
@section('content')
<div class="title">
    <h1>Stores
        <ul class="pull-right">
            <li>
                <a href="{{ URL::to('article/create') }}">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add Article
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
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Total in Shelf</th>
            <th>Total in Vault</th>
            <th>Store</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>
            <td>$ {{ $value->price }}</td>
            <td>{{ $value->total_in_shelf }}</td>
            <td>{{ $value->total_in_vault }}</td>
            <td>{{ $value->store->name }}</td>
<!--            <td>{{ $value->address }}</td>-->
            <td>
                <a href="{{ URL::to('article/' . $value->id . '/edit') }}" class="btn "><i class="fa fa-pencil" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop