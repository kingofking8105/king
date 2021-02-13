@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Ticket</h3>
              <div class="pull-right">
                  @can('lcticket-create')
                  <a class="btn btn-success" href="{{ route('lctickets.create') }}" > Create Ticket</a>
                  @endcan
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Lc</th>
                  <th>Allocated To</th>
                  <th>Category</th>
                  <th>TicketComment</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($lctickets as $key => $lcticket)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$lcticket->lc->lc_name}}</td>
                  <td>{{$lcticket->allocatedUser->name}}</td>
                  <td>{{$lcticket->lcTicketCategory->cat_name}}</td>
                  <td>{{$lcticket->comment}}</td>
                  <td>
                        @can('lcticket-edit')
                            <a class="btn btn-primary" href="{{ route('lctickets.edit',$lcticket->id) }}">Edit</a>
                        @endcan
                        @can('lcticket-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['lctickets.destroy', $lcticket->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                <th>Lc</th>
                  <th>Allocated To</th>
                  <th>Category</th>
                  <th>TicketComment</th>
                  <th>Actions</th>            
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection