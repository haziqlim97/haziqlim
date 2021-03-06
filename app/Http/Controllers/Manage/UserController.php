<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\User;
use App\Role;
use Hash;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the events from this user
        $users = User::all();

        // load the view and pass the events
        return view('manage.users.index')
            ->withUsers($users);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer()
    {
        // get all the events from this user
        $customers = User::whereRoleIs('Customer')->get();

        // load the view and pass the events
        return view('manage.users.index')
            ->withUsers($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('manage.users.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateWith([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users'
        ]);

      if (!empty($request->password)) {
        // set the manual password
        $password = trim($request->password);
      } else {
        $password = 'password';

        // auto-generate password
        /*
        $length = 10;
        $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        $password = $str;*/
      }

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($password);
      $user->save();

      if ($request->role) {
        $user->syncRoles($request->role);
      }

      return redirect()->route('manage.users.show', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with('roles')->first();
        return view("manage.users.show")->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);

        return view('manage.users.edit')
            ->withUser($user)
            ->withRoles($roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
		$user->update($request->all());
		$user->syncRoles([$request->role]);

        Session::flash('success', Sprintf('%s has been updated', $user->name));

		return redirect()->route('user:index');
		
        // $this->validateWith([
        //     'name' => 'required|max:255',
        //     'email' => 'required|email|unique:users,email,'.$id
        //   ]);

        //   $user = User::findOrFail($id);
        //   $user->name = $request->name;
        //   $user->email = $request->email;

        //   /*
        //   if ($request->password_options == 'auto') {
        //     $length = 10;
        //     $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        //     $str = '';
        //     $max = mb_strlen($keyspace, '8bit') - 1;
        //     for ($i = 0; $i < $length; ++$i) {
        //         $str .= $keyspace[random_int(0, $max)];
        //     }
        //     $user->password = Hash::make($str);
        //   } elseif ($request->password_options == 'manual') {
        //     $user->password = Hash::make($request->password);
        //   }*/

        //   $user->save();

        //   //dd($request->role);

        //   $user->syncRoles([$request->role]);

        //   //$user->syncRoles(explode(',', $request->roles));
        //   return redirect()->route('users.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteUserRequest $request, User $user)
    {

        $user->delete();
        Session::flash('success', Sprintf('%s has been deleted', $user->name));

        return redirect()->route('user:index');
    }
}
