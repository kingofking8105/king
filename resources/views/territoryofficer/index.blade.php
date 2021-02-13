@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Territory Officer</h3>
              <div class="pull-right">
            @can('territoryofficer-create')
            <a class="btn btn-success" href="{{ route('territoryofficers.create') }}" > Create New TerritoryOfficer</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ProjectOfficer</th>
                  <th>TerritoryOfficer</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($territoryofficers as $key => $territoryofficer)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$territoryofficer->user->name}}</td>
                  <td>{{$territoryofficer->projectOfficer->user->name}}</td>

                  <td>
                        @can('territoryofficer-edit')
                            <a class="btn btn-primary" href="{{ route('territoryofficers.edit',$territoryofficer->id) }}">Edit</a>
                        @endcan
                        @can('territoryofficer-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['territoryofficers.destroy', $territoryofficer->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>ProjectOfficer</th>
                  <th>TerritoryOfficer</th>
                  <th>Actions</th>            
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection