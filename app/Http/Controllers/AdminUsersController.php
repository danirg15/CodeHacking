<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UsersRequest;

use App\User;
use App\Role;
use App\Photo;

class AdminUsersController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::all();
        return view('admin/users/index', ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = Role::lists('name','id')->all();
        return view('admin/users/create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request) {
        $input = $request->all();
        $input['password'] = bcrypt($request->password);

        if ($request->hasFile('photo')){ 
           $input['photo_id'] = $this->uploadPhoto($request) or NULL;
        }

        User::create($input);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::findOrFail($id);
        $roles = Role::lists('name','id')->all();
        return view('/admin/users/edit', ['user' => $user, 'roles' => $roles]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id) {
        $input = $request->all();
        $user = User::findOrFail($id);

        if ($request->hasFile('photo')){ 
           $input['photo_id'] = $this->uploadPhoto($request) or NULL;
        }
        
        $user->update($input);
        
        return redirect('/admin/users'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    /**Helper**/

    public function uploadPhoto(Request $request){

        if ($file = $request->file('photo')) {
            $name = Photo::generateRandomName($file);
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            return $photo->id;
        }

        return NULL;
    }

}
