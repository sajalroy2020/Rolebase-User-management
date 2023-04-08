<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $singleData= User::find($id);
        return view('home', compact('singleData'));
    }

    public function profile()
    {
        $myData=User::find(Auth::id());
        return view('profile', compact('myData'));
    }

    public function userList()
    {
        $data['all_data']=User::get();
        return view('welcome', $data);
    }

    public function dashboard()
    {
        $data['all_data']=User::get();
        return view('dashboard', $data);
    }

    public function edit($id)
    {
        $editData=User::find($id);
        return view('edit', compact('editData'));
    }

    public function profile_update(Request $request,$id){
        $updateData = User::find($id);
        User::where('id',$id)->update([
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
         ]);
         return redirect('/profile');
    }

    public function delete_user($id)
    {
        $deleteUser=User::find($id);
        $deleteUser->delete();
        return redirect('/');
    }

    public function addUser()
    {
        return view('addUser');
    }

    public function user_store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'gender' => $request['gender'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/dashboard');
    }
}
