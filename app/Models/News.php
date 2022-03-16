<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class News extends Model
{
    protected $table="news";
    protected $primaryKey='id_news';
    public $title;
    public $text;
    public $image;
    public $meni_id;
    public $created_at;
    public function getAll(){
        $rezultat=DB::table('news')
        ->select('news.*','menu.*')
        ->join('menu','news.meni_id','=','menu.id_meni')
        ->orderBy('news.id_news','desc')   
        ->get();
        return $rezultat;
    }
    public function dohvatiVestiLimit(){
        $rezultat=DB::table('news')
            ->select('news.*','menu.*')
            ->join('menu','news.meni_id','=','menu.id_meni')
            ->orderBy('news.id_news','desc')                
            ->paginate(4);                    
        return $rezultat;
    }
     public function dohvatiVestipoKategoriji($id){
         $rezultat=DB::table('news')
             ->select('news.title', 'news.text','news.image','news.meni_id','news.id_news','news.created_at','menu.*')
             ->join('menu','news.meni_id','=','menu.id_meni')    
             ->where ('news.meni_id',$id)  
             ->orderBy('created_at','desc')                                                    
             ->paginate(4);
         return $rezultat;
     }
     public function dohvatiJednuVest($id){
         $rezultat=DB::table('news')
            ->select('news.id_news','news.title', 'news.text','news.image','news.meni_id','news.created_at','menu.*')
             ->join('menu','news.meni_id','=','menu.id_meni')    
             ->where ('news.id_news',$id)                                                                
             ->first();
         return $rezultat;
     }
     public function getByUnos($unos){
        $rezultat=DB::table('news')
        ->select('news.*','menu.*')
        ->join('menu','news.meni_id','=','menu.id_meni')
        ->where('news.title','like','%'.$unos.'%')
        ->orWhere('news.text','like','%'.$unos.'%')
        ->orderBy('news.id_news','desc')   
        ->paginate(5);
        return $rezultat;
     }
     public function insertNews(){
        $rezultat=DB::table('news')
        ->insertGetId([
            'title'=>$this->title,
            'text'=>$this->text,
            'image'=>$this->image,
            'meni_id'=>$this->meni_id,
            'created_at'=>$this->created_at=time()
        ]);
        return $rezultat;
    }
}