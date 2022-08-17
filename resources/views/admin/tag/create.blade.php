@extends('layouts.master')
@section('title','Tag')
@section('content')

    <div class="container-fluid px-4">



        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add tag </h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $errors)
                            <div>{{$errors}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('admin/add-tag')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-3">
                        <label for="">Tag Name</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save Tag</button>
                    </div>

            </div>







        </div>






        </form>

    </div>
    </div>

    </div>

@endsection
