<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;
use DB;
use Hash;
use Monarobase\CountryList\CountryListFacade;


class UserController extends Controller
{
/**
* Display a listing of the resource.
*Middleware
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
$users = User::orderBy('id','DESC')->get();
return view('dashboard.users.index',compact('users'))
->with('i', ($request->input('page', 1) - 1) * 5);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    $countrys = CountryListFacade::getList();
    // $ss = CityListFacade::getList('ar');

$roles = Role::pluck('name','name')->all();
return view('dashboard.users.create',compact('roles','countrys'));
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/

public function register(Request $request){
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:password_confirmation',
        'roles' => 'required',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        auth()->login($user, true);

        return redirect()->route('chose_payment');
}
public  function chose_payment()
{
    return view('chose_payment')->with(['success'=>'Choose your payment method']);
}
public function store(Request $request)
{
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email',
'password' => 'required|same:confirm-password',
'roles' => 'required',
]);
$input = $request->all();
$input['password'] = Hash::make($input['password']);
$user = User::create($input);
$user->assignRole($request->input('roles'));
return redirect()->route('users.index')
->with('success','User created successfully');
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$user = User::find($id);
return view('users.show',compact('user'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
    $countrys = CountryListFacade::getList('en');

$user = User::find($id);
$roles = Role::pluck('name','name')->all();
$userRole = $user->roles->pluck('name','name')->all();
return view('dashboard.users.edit',compact('user','roles','userRole','countrys'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
    $user = User::find($id);
$request->validate([
    'name' => 'required',
    // 'email'=>'required|email|unique:users,email,'.$user->id,
    'email'=> 'required|email|unique:users,' . $id,

    'roles' => 'required',
    'country'=>'required'
]);
$request_all = $request->except(['password','roles']);
if($request->password != null){
$request_all['password'] = Hash::make($request->password);
}
$request_all['role_ids']=[$request->roles];




$user->save();
// dd($user->roles);
// dd($user->role_ids);
$user->roles()->detach();

$user->assignRole($request->roles);
return redirect()->route('users.index')
->with('success','User updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
User::find($id)->delete();
return redirect()->route('users.index')
->with('success','User deleted successfully');
}
}