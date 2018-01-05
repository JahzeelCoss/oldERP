<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Elegant 
{  

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description', 'planed_starting_date', 'planed_ending_date', 'project_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */  
    
    
    public static $rules = [
        'name'=> 'required',        
        'planed_starting_date' => 'required|date',
        'planed_ending_date' => 'required|date',        
    ];

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function users(){
        return $this->belongsToMany('App\user');
    }

    public function tasks(){
        return $this->hasMany('App\task');
    }

    public function task(){
        return $this->belongsTo('App\task');
    }

    public function project(){
        return $this->belongsTo('App\project');
    }

    public function finishedSubTasksCount(){
        $finishedSubTasks = $this->tasks()->where('status_id','=','2')->count();
        return $finishedSubTasks;
    }
    public function isFinished(){
        $isFinished = false;
        if ($this->status_id == 2) {
            $isFinished = true;
        }
        return $isFinished;
    }

    public function progress(){
        $progress = 0;
        if ($this->isFinished()) {                          //si esta terminada
           $progress = 100;
        }
        else{            
            $tasksCount = $this->tasks()->count();            
            if ($tasksCount) {                               //si tiene subtareas
                $finishedSubTasksCount = $this->finishedSubTasksCount();    
                $progress = ($finishedSubTasksCount / $tasksCount)*100;
            }               
        }        
        
        return $progress;
    }

    public function primaryTasks(){
        $primaryTasks = $this->tasks()->where('task_id','=', $this->id);
        return $primaryTasks;
    }

     public function possibleUsers(){
        $taskUsers = $this->users()->get();
        $users = User::all();       
        $possibleUsers = $users->diff($taskUsers);
        return $possibleUsers->all();
    }



}
