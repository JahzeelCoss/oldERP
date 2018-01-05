<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Project extends Elegant 
{  

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description', 'planed_starting_date', 'planed_ending_date'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */  
    
    
    public static $rules = [
        'name'=> 'required',
        'description'=> 'required',
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

    public function primaryTasks(){
        $primaryTasks = $this->tasks()->where('task_id','=',null);
        return $primaryTasks;
    }


    public function possibleUsers(){
        $projectUsers = $this->users()->get();//no olvidar el get(); sin el get devuelve un tipo Relation con el get un tipo Collection el cual es el que queremos para compararlo.
        $users = User::all();
        //$keys = array_keys($projectUsers);
        //$possibleUsers  = array_diff($users, $projectUsers);
        //$possibleUsers = $users->forget($keys);
        $possibleUsers = $users->diff($projectUsers);
        return $possibleUsers->all();
    }

    public function completedTasks(){
        $completedTasks = $this->tasks()->where('status_id', "=", "2");
        return $completedTasks;
    }
    public function inProgressTasks(){
        $inProgressTasks = $this->tasks()->where('status_id', "=", "1");
        return $inProgressTasks;
    }
    public function notStartedTasks(){
        $notStartedTasks = $this->tasks()->where('status_id', "=", "3");
        return $notStartedTasks;
    }

}
