@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">CommentCategory</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('commentcategories.index') }}"> Back</a>
        </div>
    </div>
    <!-- /.box-header -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- form start -->
    @if(isset($commentcategory))
    <form action="{{ route('commentcategories.update',$commentcategory->id) }}" method="POST">
    @method('PUT')
    @else
    <form action="{{ route('commentcategories.store') }}" method="POST">
    @endif
        @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="">CommentCategory</label>
                    <input type="text" name="comment_category" value = "{{isset($commentcategory->comment_category) ? $commentcategory->comment_category : old('comment_category')}}" class="form-control" placeholder="commentcategory">
                </div>
            </div>    
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div> 

@endsection