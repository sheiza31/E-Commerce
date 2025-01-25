<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreusersRequest;
use App\Http\Requests\UpdateusersRequest;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public $username,$password,$address,$telp,$email,$roles;
    public function index()
    {
        $users = Users::paginate();
        return view('dashboard.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return to_route('users.index');
    }

    public function searchUsers(Request $request) {

     $search = $request->search;
     $users = Users::where('email','LIKE',"%{$search}%")
     ->orWhere('username','LIKE',"%{$search}%")
     ->paginate();
        
     return view('dashboard.users.index',compact('users'));
    }
    /**

     * Store a newly created resource in storage.
     */
    public function store(StoreusersRequest $request)
    {
      $validated = $request->validated();
      $username = $this->username = $validated['username'];
      $email = $this->email = $validated['email'];
      $roles = $this->roles = $validated['role_id'];
      $password = $this->password = $validated['password'];
      $address = $this->address = $validated['address'];
      $telp = $this->telp = $validated['telp'];

      $users = new Users();
      $users->username = $username;  
      $users->email = $email;  
      $users->password = $password;  
      $users->address = $address;  
      $users->telp = $telp;  
      $users->roles = $roles;
      $users->save();

      return to_route('users.index')->with('success','Data Berhasil Ditambahkan');  
    }

    /**
     * Display the specified resource.
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,Users $users)
    {
        $users= Users::find($id);
        return view('dashboard.users.edit_users',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id ,UpdateusersRequest $request, Users $users)
    {
      $users = Users::find($id);
      $validated = $request->validated();
      $username = $this->username = $validated['username'];
      $email = $this->email = $validated['email'];
      $roles = $this->roles = $validated['role_id'];
      $password = $this->password = $validated['password'];
      $users->username = $username;  
      $users->email = $email;  
      $users->password = $password;  
      $users->roles = $roles;
      $users->save();

      return to_route('users.index')->with('success','Data Berhasil Diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id ,Users $users)
    {
        $users = Users::find($id);
        $users->delete();

        return to_route('users.index')->with('success','Data Berhasil Dihapus');  
    }
}
