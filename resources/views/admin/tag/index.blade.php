@extends('layouts.master')
@section('title','view tag')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">

            <div class="card-heard">
                <h4>View Tags
                    <a href="{{url('admin/add-tag')}}" class="btn btn-primary float-end">Add tag</a>
                </h4>
            </div>
            <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <table id="myDataTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tag Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tag as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <a href="{{url('admin/edit-tag/'.$item->id)}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{url('admin/delete-tag/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
