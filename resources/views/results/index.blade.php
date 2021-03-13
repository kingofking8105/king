@extends('layouts.app')
@section('content')
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Result Management</h3>
              <div class="pull-right">

            <a class="btn btn-success" href="{{ route('admin.results.create') }}" > Create New Result</a>

        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Date</th>
                  <!--th>Dishawar</th>
                  <th>Faridabad</th>
                    <th>Gaziyabad</th>
                    <th>Gali</th>
                    <th>my_dishawar</th-->

                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($results as $key => $result)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$result->date}}</td>
                  <!--td>{{$result->dishawar}}</td>
                  <td>{{$result->faridabad}}</td>
                    <td>{{$result->gaziyabad}}</td>
                    <td>{{$result->gali}}</td>
                    <td>{{$result->my_dishawar}}</td-->
                  <td><a class="btn btn-info" href="{{ route('admin.results.show',$result->id) }}">S</a>

                            <a class="btn btn-primary" href="{{ route('admin.results.edit',$result->id) }}">E</a>

                            {!! Form::open(['method' => 'DELETE','route' => ['admin.results.destroy', $result->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
                                {!! Form::submit('D', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach


                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <!--th>Dishawar</th>
                 <th>Faridabad</th>
                   <th>Gaziyabad</th>
                   <th>Gali</th>
                   <th>my_dishawar</th-->

                    <th>Actions</th>
                </tr>
                </tfoot>

              </table>
            </div>

            <!-- /.box-body -->
          </div>
@endsection
