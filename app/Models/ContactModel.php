<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ContactModel extends Model
{
    protected $table="contact";
    protected $primaryKey='id_contact';
    public $fullname;
    public $email;
    public $mobile;
    public $message;
    public $creaated_at;
   public function ubaciContact(){
       $rezultat=DB::table('contact')
       ->insertGetId([
           "full_name"=>$this->fullname,
           "email"=>$this->email,
           "mobile"=>$this->mobile,
           "message"=>$this->message,
           'creaated_at'=>$this->creaated_at=time()
       ]);
       return $rezultat;
   }
   public function getAll(){
       $rez=DB::table('contact')
       ->select('contact.*')
       ->paginate(10);
       return $rez;
   }
}