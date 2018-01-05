<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\session;
use Auth;
use App\Task;
use App\Project;
use View;
use App\Status;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($project_id)
    {   
        $status = Status::all()->lists('name');
        $data['status'] = $status;
        $data['project_id'] = $project_id;
        return view('tasks.coe')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {        
        $new_task = new Task();        
        if($new_task->validate($request->all(), Task::$rules)){
            $new_task = new Task( $request->except(['_token']));            
            $status = Status::find($request->input('status_name')+1);            
            $new_task->status_id = $status->id; 
            //add project id            
            $new_task->save();    
            //ir a la pagina del proyecto
            //$project = Project::find($request->input('project_id'));
            return Redirect::to('tasks/'.$new_task->id); 
            //return view('projects.show')->with('project',$project);           
        }else{
            $errors = $new_task->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show')->with('task',$task); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {   
        $status = Status::all()->lists('name');
        $task = Task::find($id);      
        $data['task'] = $task;
        $data['status'] = $status;
        if (Auth::user()->hasRole('admin')) {
        return view('tasks.coe')->with('data', $data);
        }else{
            return redirect('dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);        
        if($task->validate($request->all(), Task::$rules)){
            $task->update($request->except(['_token']));            
            return Redirect::to('tasks/'.$task->id);            
        }else{
            $errors = $task->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {        
        $task = Task::find($id);          
        $task->delete();             
        return Redirect::back();  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function addInfo(Request $request, $id)
    {
       $task = Task::find($id); 
       //$task->status_id = $request->input('status_id')+1;    
       $status = Status::find($request->input('status_name')+1);  
       $task->status_id = $status->id; 
       $task->save();      
       $task->started_date = $request->input('started_date');
       $task->finished_date = $request->input('finished_date');   
       $task->update();
       return Redirect::to('tasks/'.$task->id); 
   }  


    public function createTask($project_id)
    {   
        $status = Status::all()->lists('name');
        $data['status'] = $status;
        $data['project_id'] = $project_id;
        return view('tasks.coe')->with('data',$data);
    }

    public function createSubtask($task_id)
    {   
        $status = Status::all()->lists('name');
        $data['status'] = $status;
        $data['task_id'] = $task_id;
        return view('tasks.coe')->with('data',$data);
    }

    public function storeSubtask(Request $request, $task_id)
    {
        $new_task = new Task();        
        if($new_task->validate($request->all(), Task::$rules)){
            $new_task = new Task( $request->except(['_token']));            
            $status = Status::find($request->input('status_name')+1);            
            $new_task->status_id = $status->id;
            //adding task id
            $task_id = $request->input('task_id');
            $new_task->task_id = $task_id;
            //add project id            
            $new_task->save();    
            //ir a la pagina del proyecto
            //$project = Project::find($request->input('project_id'));
            return Redirect::to('tasks/'.$new_task->id); 
            //return view('projects.show')->with('project',$project);           
        }else{
            $errors = $new_task->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }   
    }

    public function addingUser($id)
    {
        $task = Task::find($id);
        return view('tasks.addingUser')->with('task',$task);
    }

    public function addUser(Request $request, $id)
    {
       $task = Task::find($id);          
       $task->users()->attach($request->input('user_id'));
       return redirect('/tasks/' . $id);
    }

    public function deleteUser(Request $request, $id)
    {
       $task = Task::find($id);          
       $task->users()->detach($request->deletingUser);
       return redirect('/tasks/' . $id);
    }
   
}
