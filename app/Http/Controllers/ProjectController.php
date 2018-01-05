<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\session;
use Auth;
use App\Project;
use View;
use App\Status;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::all();        
        if (Auth::user()->hasRole('admin')) {
            return view('projects.index')->with('projects',$projects);
        }else{
            return redirect('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {   
        $status = Status::all()->lists('name');
        $data['status'] = $status;
        return view('projects.coe')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {        
        $new_project = new Project();
        if($new_project->validate($request->all(), Project::$rules)){
            $new_project = new Project( $request->except(['_token']));            
            $status = Status::find($request->input('status_name')+1);            
            $new_project->status_id = $status->id; 
            $new_project->save();
            $projects = Project::all();
            //return View::make($tatus);
            return view('projects.index')->with('projects',$projects);            
        }else{
            $errors = $new_project->errors();
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
        $project = Project::find($id);
        return view('projects.show')->with('project',$project); 
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
        $project = Project::find($id);      
        $data['project'] = $project;
        $data['status'] = $status;
        if (Auth::user()->hasRole('admin')) {
        return view('projects.coe')->with('data', $data);
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
        $project = Project::find($id);        
        if($project->validate($request->all(), Project::$rules)){
            $project->update($request->except(['_token']));            
            return redirect('/projects');            
        }else{
            $errors = $project->errors();
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
        $project = Project::find($id);          
        $project->delete();             
        return Redirect::to('races');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function addInfo(Request $request, $id)
    {
       $project = Project::find($id); 
       //$project->status_id = $request->input('status_id')+1;    
       $status = Status::find($request->input('status_name')+1);  
       $project->status_id = $status->id; 
       $project->save();
       $project->repository_link = $request->input('repository_link');   
       $project->started_date = $request->input('started_date');
       $project->finished_date = $request->input('finished_date');   
       $project->update();
       return redirect('/projects');
    }

    public function addingUser($id)
    {
        $project = Project::find($id);
        return view('projects.addingUser')->with('project',$project);
    }

    public function addUser(Request $request, $id)
    {
       $project = Project::find($id);          
       $project->users()->attach($request->input('user_id'));
       return redirect('/projects/' . $id);
    }

    public function deleteUser(Request $request, $id)
    {
       $project = Project::find($id);          
       $project->users()->detach($request->deletingUser);
       return redirect('/projects/' . $id);
    }

      
}
