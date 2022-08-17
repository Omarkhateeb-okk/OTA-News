@extends('layouts.master')
@section('title','view post')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">

        <div class="card-heard">
            <h4>View Posts
                <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Post</a>
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
                        <th>Post Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>tags</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>
                            <img src="{{asset('uploads/post/'. $item->img)}}" width="50px" height="50px" alt="img">
                        </td>
                        <td>
                            @if (!blank($item->tag))
                            @foreach($item->tag as $it)
                            <form action={{ asset('admin/get-post-by-tags/'.$it["id"]) }} method="GET">
                                <input type="submit" value="{{$it['name']}}" />
                            </form>
                            @endforeach
                            @endif
                        </td>
                        <td>{{$item->status =='1'? 'hidden':'visible'}}</td>
                        <td>
                            <a href="{{url('admin/post/'.$item->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{url('admin/delete-post/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
