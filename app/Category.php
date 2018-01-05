<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Elegant 
{  
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */  
    
    
    public static $rules = [
        'name'=> 'required',                     
    ];
   

    public function users(){
        return $this->belongsToMany('App\user');
    }

   

}
