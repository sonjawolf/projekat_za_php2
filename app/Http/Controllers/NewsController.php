<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meni;
use App\Models\News;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    private $data=[];
    public $komentar;
    

   public function singleNews($id,Request $request){

    
        $meni=new Meni();
        $this->data['linkovi']=$meni->get();

        $singleNews=new News();
        $news=new News();
        $this->data['news']=$news->dohvatiVestiLimit(); 
        $this->data['singleNews']=$singleNews->dohvatiJednuVest($id);
        $this->data['comment']=(new Comment())->getCommentsByPostWithAuthor($id);
        if($request->session()->has('user')){
            Log::info('Stranicu "singleNews" je posetio korisnik: '.$request->session()->get('user')[0]->username);
        }
        else{
            Log::info("Neregistrovani korisnik je pristupio stranici 'singleNews'.");
        }

        return view('pages.singleNews',$this->data);
   }

  public function commentInsert(Request $request){
      if($request->has('com_submit')){
    $this->validate($request,[
        'comment'=>'required|min:2'
    ]);

    $komentar=new Comment();
        $komentar->comment=$request->get('comment');
        $komentar->user_id=$request->get('user_id');
        $komentar->news_id=$request->get('news_id');

    $insert=$komentar->insertComent();
    }
    Log::info('Komentar: '.$request->comment. '  na vest ID'.$request->news_id. ' od korisnika: '.$request->session()->get('user')[0]->username);
    return redirect()->back()->with("success","Hvala, poslali ste komentar.");
  }
  
}
