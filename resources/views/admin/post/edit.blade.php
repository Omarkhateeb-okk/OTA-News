@extends('layouts.master')
@section('title','Edit post')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-heard">
            <h4>Edit Posts
                <a href="{{url('admin/posts')}}" class="btn btn-primary float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $errors)
                <div>{{$errors}}</div>
                @endforeach
            </div>
            @endif
            <form action="{{url('admin/update-post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" value="{{$post->name}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Category</label>
                    <select name="category_id" required class="form-control">
                        <option disabled>-- select Category--</option>
                        @foreach($category as $item)
                        <option value="{{$item->id}}" {{$post->categroy_id==$item->id ? 'selected':''}}>
                            {{$item->name}}
                        </option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" name="img" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea type="text" name="description" class="form-control">{!! $post->description !!}</textarea>
                    <div class="form-group">
                        <strong>tags:</strong>
                        <input type="text" class="form-control" id="tags_name" readonly>
                        <input type="text" hidden class="form-control" id="select_tags_ids" name="tags_ids" readonly>
                        <input type="text" hidden id="tag_ids">
                        <select name="tags" class="form-control" id="tags">
                            <option value=""></option>
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h4>Status</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Hidden</label>
                                <input type="checkbox" name="status" {{$post->status=='1' ? 'checked' : ''}}/>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="md-3">
                                <button type="submit" class="btn btn-primary float-end">Update Post</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
