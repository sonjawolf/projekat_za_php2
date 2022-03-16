<?php
 namespace App\Models;
 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Support\Facades\DB;
class User extends Model
{
   protected $table='users';
   protected $primaryKey='id_user';
   public function getAll(){
    $rez=DB::table('users')
    ->select('users.*','roles.*')
    ->join('roles','users.role_id','=','roles.id_role')
    ->get();
    return $rez;
}
 } 