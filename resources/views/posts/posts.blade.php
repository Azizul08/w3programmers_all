@extends('posts.layout')
  
@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 margin-tb">
            <div style="text-align: center;">
                <h4>Laravel 9 Checked / Selected / Disabled Blade Directive Testing</h4>
            </div>
          
        </div>
    </div>
  
    <table class="table table-bordered" style="margin-top: 20px;">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Status</th>
            <th>Featured</th>
            <th>Action</th>
        </tr>
        @forelse ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td><span @class([
                'text-white',
                'bg-danger'=>$post->status=='Pending',
                'bg-success'=>$post->status=='Active',
                'bg-warning'=>$post->status=='Wait',
                ])>
            {{$post->status}}
            </span></td>
            <td><input type="checkbox" name="featured" {{$post->is_featured ? 'checked' : ''}}></td>
            <td><a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a></td>
        </tr>
        @empty
        <tr>
        <td colspan="3">No posts</td>
        </tr>
        @endforelse
    </table> 
@endsection