<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Address;
use Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\session;
use Auth;


class userController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$users = User::all();
		if (Auth::user()->hasRole('admin')) {
			return view('users.index')->with('users',$users);
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
		//echo "create a user";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$new_user = new User;
		if($new_user->validate(Input::all(), User::$rules)){
			$new_user->first_name = Input::get('first_name');
			$new_user->last_name = Input::get('last_name');
			$new_user->email = Input::get('email');	
			$new_user->password = bcrypt(Input::get('password'));		
			$new_user->active = true;
			$new_user->save();
			$users = User::all();
			return view('users.index')->with('users',$users);
			//return redirect('rewardsmanager/rewards');
		}else{
			$errors = $new_user->errors();
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
		$user = User::find($id);
		$data['user'] = $user;
		$data['isTheUser'] = false;		
		if (Auth::user()==$user) {
			$data['isTheUser'] = true;	
		}

		return view('users.show')->with('data', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 // get the user
        $user = user::find($id);

        // show the edit form and pass the user
        return view('users.edit')
            ->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$user = user::find($id);		

	    if (empty(Input::get('password'))) {//si no escribió una contraseña

	    	$validator = Validator::make($request->all(), [
            'first_name'=> 'required',
	        'last_name'=> 'required',
	        'email' => 'required|email|unique:users,email,'.$id,	       
	        ]);

	        if ($validator->fails()) {
	           	$errors = $user->errors();
					return redirect()->back()->withInput()->withErrors($errors);
	        }else{
	        	$user->first_name = Input::get('first_name');
				$user->last_name  = Input::get('last_name');
				$user->username  = Input::get('username');
				$user->email      = Input::get('email');	            
				$user->save();
	            // redirect	            
	            return Redirect::to('users'); 	            
	        }

	    	
	    }else{//si escribió una contraseña


	    	$validator = Validator::make($request->all(), [
            'first_name'=> 'required',
	        'last_name'=> 'required',
	        'email' => 'required|email|unique:users,email,'.$id,
	        'password' => 'required|confirmed|min:5',  
	        ]);

	        if ($validator->fails()) {
	           	$errors = $user->errors();
					return redirect()->back()->withInput()->withErrors($errors);
	        }else{
	        	$user->first_name = Input::get('first_name');
				$user->last_name  = Input::get('last_name');
				$user->username  = Input::get('username');
				$user->email      = Input::get('email');
				$user->password  = bcrypt(Input::get('password'));	            
				$user->save();
	            // redirect	            
	            return Redirect::to('users'); 
	        }
	    }          
			
	}

	/**
	 * to Active/Desactive/ the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function cambiarEstado($id)
	{	
        $user = User::find($id);
        if ($user->active) {
        	$user->active = false;
        }else{
        	$user->active = true;
        }       
        
        $user->save();
        // redirect      
        return Redirect::to('users');        
	}

	public function destroy($id)
	{
		// delete
        $user = User::find($id);          
        $user->delete();
        // redirect      
        return Redirect::to('users');        
	}

}