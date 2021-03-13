@extends('layouts.app')


@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title">Add New Result</h1>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.results.index') }}"> Back</a>
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
    <form action="{{ route('admin.results.store') }}" method="POST">
        @csrf

            <div class="box-body">
                <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" name="date" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Dishawar</label>
                    <input type="text" name="dishawar" class="form-control" placeholder="Dishawar">
                </div>
                <div class="form-group">
                    <label for="">Faridabad</label>
                    <input type="text" class="form-control"  name="faridabad" placeholder="Faridabad">
                </div>
                <div class="form-group">
                    <label for="">Gaziyabad</label>
                    <input type="text" class="form-control"  name="gaziyabad" placeholder="Gaziyabad">
                </div>
                <div class="form-group">
                    <label for="">Gali</label>
                    <input type="text" class="form-control"  name="gali" placeholder="Gali">
                </div>
                <div class="form-group">
                    <label for="">Dishawar OLD</label>
                    <input type="text" class="form-control"  name="my_dishawar" placeholder="Dishawar OLD">
                </div>
            </div>
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div>

@endsection
