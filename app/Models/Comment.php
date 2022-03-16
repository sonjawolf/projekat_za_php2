<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Comment extends Model
{
    protected $table="comment";
    protected $primaryKey="id_comment";
    public $timestamps=false;
    public $comment;
    public $user_id;
    public $news_id;
    public $created_at;
     public function user(){
         return $this->hasOne(User::class,'id_user','id_user');
     }
     public function getCommentsByPostWithAuthor($id){
      $rezultat=DB::table('comment')
        ->join('news','comment.news_id','=','news.id_news')        
        ->join('users','comment.user_id','=','users.id_user')
        ->where('comment.news_id',$id)
        ->select('comment.*','users.*')
        ->orderBy('created_at','desc')
        ->paginate('5');
        return $rezultat;
     }
    public function insertComent(){
        $rez=DB::table('comment')
        ->insertGetId([
            'comment'=>$this->comment,
            'user_id'=>$this->user_id,
            'news_id'=>$this->news_id,
            'created_at'=>$this->created_at=time()
        ]);
    }
    public function getAll(){
        $rez=DB::table('comment')
        ->select('comment.*','users.*')
        ->join('users','comment.user_id','=','users.id_user')
        ->orderBy('created_at','desc')
        ->paginate(7);
        return $rez;
    }
}