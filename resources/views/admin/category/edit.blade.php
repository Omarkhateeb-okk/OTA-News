@extends('layouts.master')
@section('title','Category')
@section('content')

    <div class="container-fluid px-4">


        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Edit Category </h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $errors)
                            <div>{{$errors}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('admin/update-category/'.$category->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" name="name" value="{{$category->name}}" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea type="text" name="description" rows="5"
                                  class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control"/>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="col-md-3 mb-3">
                        <label>Enable</label>
                        <input type="checkbox" name="is_active"/>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label cl>on navbar</label>
                        <input type="checkbox" name="navbar"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Cartegory</button>
                </form>
            </div>
        </div>
    </div>

@endsection
