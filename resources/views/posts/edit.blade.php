@extends('posts.layout')
  
@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 margin-tb">
            <div style="text-align: center;">
                <h4>Edit Posts</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>
  
    <form action="#" method="POST" enctype="multipart/form-data"
        style="margin-top: 20px;">
        @csrf
        @method('PUT')
  
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Content:</strong>
                    <textarea class="form-control" style="height:150px" name="content"
                        placeholder="Content">{{ $post->content }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Is Featured?</strong>
                    <!-- <input type="checkbox" name="featured" @if ($post->is_featured) checked @endif> -->
                    <input type="checkbox" name="featured" {{$post->is_featured ? 'checked' : ''}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status</strong>
                    <select name="status">
                        @foreach (['Pending', 'Wait', 'Active'] as $status)
                        <option value="{{$post->status}}"{{ ($status == $post->status) ? 'selected' : ''}}>
                        {{ $status }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary"{{($post->status=='Active') ? 'disabled':''}}>Submit</button>
            </div>
        </div>
  
    </form>
@endsection