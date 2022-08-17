@extends('layouts.master')
@section('title','Category')
@section('content')

    <div class="container-fluid px-4">



        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add Category </h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                    @foreach($errors->all() as $errors)
                        <div>{{$errors}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('admin/add-category')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea type="text" name="description" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="img" class="form-control"/>
                    </div>
                    <h6>Status Mode</h6>
                            <div class="col-md-3 mb-3">
                                <label>Enable</label>
                                <input type="checkbox" value="1" name="is_active"/>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label cl>on navbar</label>
                                <input type="checkbox" name="navbar"/>
                            </div>



                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Save Cartegory</button>
                        </div>

                        </div>







                    </div>






                </form>

            </div>
        </div>

    </div>

@endsection
