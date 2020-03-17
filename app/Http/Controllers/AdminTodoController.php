<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Todo;
use App\StatusTodo;
use Carbon\Carbon;

class AdminTodoController extends Controller
{

    public function showFullList(){// list full work
        $data_todo=Todo::orderby('id_status')->get();
        return view('todo.list')->with('data_todo',$data_todo);

    }


    public function showAddView(){// go to view add a work
        $data_status=StatusTodo::all();
        return view('todo.add')->with('data_status',$data_status);
    }


    public function add(Request $request){
        
        $this->validate($request,
        [
            'date_end' => 'required|date',
            'date_start'=>'required|date',
            'name'=>'required'
        ],
        [
            'date_end.required' => 'please format date',
            'date_start.required' => 'please format date',
            'name.required'=>'please input name of work'
        ]);
        $data_status_find=StatusTodo::where('id_status',$request->input('id_status'))->get();
        if(sizeof($data_status_find)>0&&$request->input('date_start')<=$request->input('date_end')){
            $data_todo=Todo::create($request->all());
        }
        return redirect('/');
    }


    public function showUpdateView($id){// go to view update work
        $data_todo=Todo::find($id);
        $data_status=StatusTodo::where('id_status','<>',$data_todo->id_status)->get();
        return view('todo.update')->with('data_todo',$data_todo)->with('data_status',$data_status);
    }


    public function update(Request $request){// update work 
        
        $date_start=$request->input("date_start");
        $date_end=$request->input("date_end");
        $this->validate($request,
        [
            'date_end' => 'required|date',
            'date_start'=>'required|date'
        ],
        [
            'date_end.required' => 'please format date',
            'date_start.required' => 'please format date'
        ]);
        $name=$request->input("name");
        $id_status=$request->input("id_status");
        $id=$request->input('id');
        $data_todo=Todo::find($id);
        $data_status_find=StatusTodo::where('id_status',$id_status)->get();
        
        if($date_start<=$date_end){
            $data_todo->date_start=$date_start;
            $data_todo->date_end=$date_end;
            
        }
        if($name!="")$data_todo->name=$name;
        if(sizeof($data_status_find)>0){
            $data_todo->id_status=$id_status;
        }
        $data_todo->save();
        return redirect('/');
        
        
    }


    public function delete($id)// delete work with id
    {
        $data_todo=Todo::find($id);
        $data_todo->delete();
        return redirect('/');
    }
    
    public function showWorkOfDayView()// view form find work a day
    {
        return view('todo.workofday');
    }
    public function showListWorkOfDay(Request $request)// list work a day
    {

        $this->validate($request,
        [
            'day' => 'required|date'
        ],
        [
            'day.required' => 'please format date'
        ]);
        $day=$request->input("day");
        $data_todo=Todo::where('date_start','<=',$day)->where('date_end','>=',$day)->orderBy('id_status')->get();
        return view('todo.list')->with('data_todo',$data_todo);
        
    }

    public function showWorkOfMonthView()// view form find work a month
    {
        return view('todo.workofmonth');
    }

    public function showListWorkOfMonth(Request $request)// list work a month
    {

        $this->validate($request,
        [
            'month' => 'required'
        ],
        [
            'month.required' => 'please format month'
        ]);
        $month=$request->input("month");
        $month=$month[strlen($month)-2].$month[strlen($month)-1];
        $data_todo=Todo::whereMonth('date_start','<=',$month)->whereMonth('date_end','>=',$month)->orderBy('id_status')->get();
        return view('todo.list')->with('data_todo',$data_todo);
        
    }

    public function showWorkOfWeekView()// view form find work a Week
    {
        return view('todo.workofweek');
    }

    public function showListWorkOfWeek(Request $request)// list work a week
    {

        $this->validate($request,
        [
            'day' => 'required'
        ],
        [
            'day.required' => 'please format month'
        ]);
        
        
        $day_of_week=Carbon::create($request->input("day"));
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        $day_start=$day_of_week->startOfWeek();
        $day_of_week=Carbon::create($request->input("day"));
        Carbon::setWeekEndsAt(Carbon::SATURDAY);
        $day_end=$day_of_week->endOfWeek();
        $data_todo=Todo::where('date_start','<=',$day_end)->where('date_end','>=',$day_start)->orderBy('id_status')->get();
        return view('todo.list')->with('data_todo',$data_todo);
        
    }


}
