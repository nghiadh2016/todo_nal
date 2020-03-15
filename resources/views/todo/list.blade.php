@extends('master')
@section('content')
<h3>Todo List</h3>
<div class="container">
    <div class="col-md-12">
      <div class="content-panel">
      <a href="/"><button class="btn btn-primary" type="button">Home</button></a>
      <a href="/todo/showadd"><button class="btn btn-primary" type="button">Add Work</button></a>
              <a href="/todo/work/day"><button class="btn btn-primary" type="button">Work of Day</button></a>
              <a href="/todo/work/week"><button class="btn btn-primary" type="button">Work of Week</button></a>
              <a href="/todo/work/month"><button class="btn btn-primary" type="button">Work of Month</button></a>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th> STT</th>
              <th> Name of Work </th>
              <th> Date Begin</th>
              <th> Date end</th>
              <th> Status</th>
              <th> Acction</th>

            </tr>
          </thead>
          <tbody>
          @foreach ($data_todo as $key=>$item)
              <tr @if($item->id_status==1) class="rebe" @elseif($item->id_status==2) class="blue" @else class="green" @endif >
              <td >{{$key+1}}</td>
                <td >{{$item->name}}</td>
                <td >{{$item->date_start}}</td>
                <td>{{$item->date_end}}</td>
                <td>{{$item->statusTodo->name_status}}</td>
                <td>
                <a href="/todo/showupdate/{{$item->id}}"><button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button></a>
                <a href="/todo/delete/{{$item->id}}"><button class="btn btn-light btn-xs"><i class="fa fa-trash"></i></button></a>
                </td>
        
              </tr>
              @endforeach
              
          </tbody>
        </table>
        
      </div>
      <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
  </div>
@endsection
