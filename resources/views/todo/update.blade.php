@extends('master')
@section('content')
<h3>Change Todo Work</h3>
<div class="container">
    <div class="col-md-12">

        <div class="form-panel">
        <a href="/"><button class="btn btn-primary" type="button">Home</button></a>
      <a href="/todo/showadd"><button class="btn btn-primary" type="button">Add Work</button></a>
              <a href="/todo/work/day"><button class="btn btn-primary" type="button">Work of Day</button></a>
              <a href="/todo/work/week"><button class="btn btn-primary" type="button">Work of Week</button></a>
              <a href="/todo/work/month"><button class="btn btn-primary" type="button">Work of Month</button></a>
            <form role="form" class="form-horizontal style-form"  action="/todo/update" method="POST">
                {{ csrf_field() }}
                <div>
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>

                  @endif
                
                </div>
                <div class="form-group ">
                <label class="col-lg-12 control-label">Name of Work (*)</label>
                <div class="col-lg-10">
                  <input type="text" placeholder="{{$data_todo->name}}" name="name" class="form-control">
                </div>
                </div>
                <div class="form-group ">
                <label class="col-lg-12 control-label">Date begin (*)</label>
                <div class="col-lg-10">
                  <input type="date" value="{{$data_todo->date_start}}" name="date_start" class="form-control" required>
                </div>
                </div>
                <div class="form-group " >
                <label class="col-lg-12 control-label">Date end (*)</label>
                <div class="col-lg-10">
                  <input type="date"
                  min="{{$data_todo->date_start}}"
                   value="{{$data_todo->date_end}}" name="date_end" class="form-control"required >
                </div>
                </div>
                <div class="form-group ">
                <label class="col-lg-12 control-label">Staus (*)</label>
                <div class="col-lg-10">
                  <select name="id_status" class="form-control">
                  <option value="{{$data_todo->id_status}}">{{$data_todo->statusTodo->name_status}}</option>
                  @foreach ($data_status as $key=>$item)
                    <option value="{{$item->id_status}}">{{$item->name_status}}</option>
                    @endforeach
                    
                  </select>
                </div>
                </div>
                <div class="form-group " hidden="true">
                <label class="col-lg-12 control-label">id</label>
                <div class="col-lg-10">
                  <input type="text"  name="id" class="form-control" value='{{$data_todo->id}}'>
                </div>
                </div>
                <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-primary" type="submit">Change information work</button>
                  <a href="/"><button class="btn btn-success" type="button">Back Home</button></a>
                </div>
              </div>
            </form>
          </div>
    </div>
  </div>
@endsection
