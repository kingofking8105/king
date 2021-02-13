
@extends('layouts.app')


@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Permission Management</h3>
              <div class="pull-right">
                @can('permission-create')
                <a class="btn btn-success" href="{{ route('permissions.create') }}" >Create New Permission</a>
                @endcan
                </div>
            </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th>Guard</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($permission as $key => $perm)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $perm->name }}</td>
        <td>{{ $perm->guard_name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('permissions.show',$perm->id) }}">Show</a>
            @can('permission-edit')
                <a class="btn btn-primary" href="{{ route('permissions.edit',$perm->id) }}">Edit</a>
            @endcan
            @can('permission-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $perm->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $permission->render() !!}
    </div>
            <!-- /.box-body -->
</div>

@endsection