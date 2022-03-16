<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
class UserModel
{
public $id;
public $username;
public $email;
public $pass;
public $file;
public $role_id=2;
public $role;
public function getAll(){
    $rez=DB::table('users')
    ->select('users.*','roles.*')
    ->join('roles','users.role_id','=','roles.id_role')
    ->get();
    return $rez;
}
public function insertUser(){
    $rezultat=DB::table('users')
    ->insertGetId([
        'username'=>$this->username,
        'email'=>$this->email,
        'password'=>$this->pass,
        'avatar'=>$this->file,
        'role_id'=>$this->role_id
    ]);   
    return $rezultat;
}
public function login(){
    $upit=DB::table('users')
    ->select('users.*','roles.name')
    ->join('roles','users.role_id','=','roles.id_role')
    ->where([
        'username'=>$this->username,
        'password'=>md5($this->pass)
    ])->first();
    return $upit;
}
public function oneUser(){
    $rez=DB::table('users')
    ->select('users.*')
    ->where('users.id_user','=',session()->get('user')[0]->id_user)
    ->first();
    return $rez;
}
public function update(){
    $data=[
        'username'=>$this->username,
        'email'=>$this->email,
        'password'=>md5($this->password)
    ];
   $rez=DB::table('users')
   ->where('users.id_user','=',session()->get('user')[0]->id_user)
   ->update($data);
   return $rez;
}
public function updateImg(){
    $data=[
        'avatar'=>$this->file
    ];
    $rezultat=DB::table('users')
    ->where('users.id_user','=',session()->get('user')[0]->id_user)
    ->update($data);
    return $rezultat;
}
public function updateRole(){
    $data=[
        'role_id'=>$this->role
    ];
    $rez=DB::table('users')
    ->where('users.id_user','=',$this->id)
    ->update($data);
    return $rez;
}
}