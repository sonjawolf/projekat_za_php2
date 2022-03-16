<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Meni extends Model{
    protected $table="meni";
    protected $primaryKey="id_meni";
    protected $guarded=['naziv'];
    public $timestamps=false;

    public function get(){
        $rez=DB::table('meni')
        ->select('meni.*')
        ->where('meni.aktivan','=',1)
        ->get();
        return $rez;
    }
    public function insert(){
        $rez=DB::table('meni')
        ->insertGetId([
            'naziv'=>$this->naziv,
            'aktivan'=>$this->aktivan,

        ]);
        return $rez;
    }
}
