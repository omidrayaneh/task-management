<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateTaskRequest;
use App\Task;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('tasks.index');
    }

    public function getAllTask()
    {
        $tasks = Task::where('user_id',auth()->id())->orderBy('Created_at')->paginate(10);
        $response = [
            'tasks' => $tasks
        ];
        return response()->json($response, 200);
    }

    public function getTaskSortNameDesc()
    {
        $tasks = Task::where('user_id',auth()->id())->orderBy('name','DESC')->paginate(10);
        $response = [
            'tasks' => $tasks
        ];
        return response()->json($response, 200);
    }
    public function getTaskSortNameAsc()
    {
        $tasks = Task::where('user_id',auth()->id())->orderBy('name','ASC')->paginate(10);
        $response = [
            'tasks' => $tasks
        ];
        return response()->json($response, 200);
    }


    public function getTaskSortTimeDesc()
    {
        $tasks = Task::where('user_id',auth()->id())->orderBy('time','DESC')->paginate(10);
        $response = [
            'tasks' => $tasks
        ];
        return response()->json($response, 200);
    }
    public function getTaskSortTimeAsc()
    {
        $tasks = Task::where('user_id',auth()->id())->orderBy('time','ASC')->paginate(10);
        $response = [
            'tasks' => $tasks
        ];
        return response()->json($response, 200);
    }

    public function getTaskSortPriorityDesc()
    {
        $tasks = Task::where('user_id',auth()->id())->orderBy('priority','DESC')->paginate(10);
        $response = [
            'tasks' => $tasks
        ];
        return response()->json($response, 200);
    }
    public function getTaskSortPriorityAsc()
    {
        $tasks = Task::where('user_id',auth()->id())->orderBy('priority','ASC')->paginate(10);
        $response = [
            'tasks' => $tasks
        ];
        return response()->json($response, 200);
    }


    public function create()
    {
        return view('tasks.create');
    }


    public function store(CreateTaskRequest $request)
    {
       $task = new Task();
       $task->name = $request['name'];
       $task->priority = $request['priority'];
       $task->time = $request['time'];
       $task->user_id = auth()->id();
       $task->save();
        return redirect('/tasks')->with('status', 'Task created');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $task=Task::findOrFail($id);
        return view('tasks.edit',compact(['task']));

    }


    public function update(Request $request, $id)
    {
        $task=Task::findOrFail($id);
        $task->name = $request['name'];
        $task->priority = $request['priority'];
        $task->time = $request['time'];
        $task->user_id = auth()->id();

        $task->save();
        return redirect('/tasks');
    }


    public function destroy($id)
    {
        $task=Task::findOrFail($id);
        $task->delete();
        return response('task deleted',200);
    }
}
