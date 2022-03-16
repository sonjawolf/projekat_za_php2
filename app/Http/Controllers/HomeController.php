<?php
namespace App\Http\Controllers;
use App\Models\Meni;
use App\Models\News;
use App\Models\UserModel;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class HomeController extends Controller{
    private $data=[];
    public function __construct(){       
        $meni=new Meni();
        $this->data['linkovi']=$meni->get();
    }
    public function index(Request $request){
        $news=new News();
        $this->data['news']=$news->dohvatiVestiLimit();       
       // $this->data['allNews']=$news->getAll();   
       if($request->session()->has('user')){
        Log::info('Stranicu "home" je posetio korisnik: '.$request->session()->get('user')[0]->username);
    }
    else{
        Log::info("Neregistrovani korisnik je pristupio pocetnoj stranici .");
    }    
        return view('pages.home',$this->data);
   }
    public function showRegisterPage(){
        return view('pages.register',$this->data);
    }
    public function showContactForm(Request $request){
        if($request->session()->has('user')){
            Log::info('Stranicu "kontakt" je posetio korisnik: '.$request->session()->get('user')[0]->username);
        }
        else{
            Log::info("Neregistrovani korisnik je pristupio stranici 'kontakt'.");
        }
        return view('pages.contact',$this->data);
    }
    public function newsCategory($id,Request $request){
        $newsCateg=new News();
        $this->data['newsCateg']=$newsCateg->dohvatiVestipoKategoriji($id);
        $this->data['news']=$newsCateg->dohvatiVestiLimit();  
        if($request->session()->has('user')){
            Log::info('Stranicu "newsCategory" je posetio korisnik: '.$request->session()->get('user')[0]->username);
        }
        else{
            Log::info("Neregistrovani korisnik je pristupio stranici 'newsCategory'.");
        }
        return view('pages.newsCategory',$this->data);
    }
    public function userProfile(){
        $oneUser=new UserModel();
        $this->data['oneUser']=$oneUser->oneUser();     
        return view('pages.userProfile',$this->data);
    }
}
?>