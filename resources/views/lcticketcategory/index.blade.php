@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Ticket Category</h3>
              <div class="pull-right">
            @can('lcticketcategory-create')
            <a class="btn btn-success" href="{{ route('lcticketcategories.create') }}" > Create New LcTicketCategory</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>LcTicketCategory</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($lcticketcategories as $key => $lcticketcategory)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$lcticketcategory->cat_name}}</td>
                  <td>
                        @can('lcticketcategory-edit')
                            <a class="btn btn-primary" href="{{ route('lcticketcategories.edit',$lcticketcategory->id) }}">Edit</a>
                        @endcan
                        @can('lcticketcategory-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['lcticketcategories.destroy', $lcticketcategory->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @empty
                No Data Found !!

                @endforelse
               
               
                </tbody>
                <tfoot>
                <tr>
                <th>No</th>
                  <th>LcTicketCategory</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $lcticketcategories->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection