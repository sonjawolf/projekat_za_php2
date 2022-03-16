<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Meni;
use App\Models\User;
use App\Models\Comment;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\ContactModel;
use App\Models\News;
use App\Models\Activity;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use DB;
class AdminController extends Controller
{
    private $data=[];
    private $model;
    public function __construct(){
        $meni=new Meni();
        $this->data['linkovi']=$meni->get();
        $this->model = new News();
    }
    public function adminIndex(Request $request){
        Log::info('Stranicu "admin panel" je posetio korisnik: '.$request->session()->get('user')[0]->username);
        return view('pages.adminAutor',$this->data);
    }
    public function showMeni(){
        $meni=new Meni();
        $this->data['linkovi']=$meni::all();
        return view('pages.adminMeni',$this->data);
    }
    public function deleteMeni($id, Request $request){
        Meni::destroy($id);
        if($id){
            Log::info("Admin " .$request->session()->get('user')[0]->username. " je obrisao stavku iz tabele meni.");
            return redirect()->back()->with('success','Uspešno obrisano.');
        }else{
            Log::info("Admin " .$request->session()->get('user')[0]->username. " nije obrisao stavku, GRESKA.");
            return redirect()->back()->with('error','Greška, nije obrisano.');
        }
    }
    public function insertMeni(Request $request){
        if($request->has('update_meni')){
            $rules=[
                'tbNav'=>'required',
                'tbAktivan'=>'regex:/^[0-1]$/'
            ];
            $custom_messages=[
                'required'=>'Polje Stavka navigacije je obavezno.',
                'tbAktivan.regex'=>'Polje aktivan može biti 1 ili 0.',
            ];
            $request->validate($rules,$custom_messages);
            $meni=new Meni();
            $meni->naziv=$request->get('tbNav');
            $meni->aktivan=$request->get('tbAktivan');
            $insert=$meni->insert();
        }
        Log::info("Admin " .$request->session()->get('user')[0]->username. " je uneo zapis u tabelu meni.");
         return redirect()->back()->with('success','Stavka je uneta u bazu');
    }
   public function showComents(){
       $comments=new Comment();
       $this->data['comments']=$comments->getAll();
       return view('pages.adminComments',$this->data);
   }
   public function deleteComments($id,Request $request){
       Comment::destroy($id);
       if($id){
        Log::info("Admin " .$request->session()->get('user')[0]->username. " je obrisao komentar iz tabele comments.");
        return redirect()->back()->with('success','Uspešno obrisano.');
    }else{
        Log::info("Admin " .$request->session()->get('user')[0]->username. " nije obrisao komentar, GRESKA.");
        return redirect()->back()->with('error','Greška, nije obrisano.');
    }
   }
   public function showUsers(){
       $users=new User();
       $this->data['users']=$users->getAll();
       return view('pages.adminUsers',$this->data);
   }
   public function deleteUser($id,Request $request){
       User::destroy($id);
       if($id){
        Log::info("Admin " .$request->session()->get('user')[0]->username. " je obrisao korisnika iz tabele users.");
        return redirect()->back()->with('success','Uspešno obrisano.');
    }else{
        Log::info("Admin " .$request->session()->get('user')[0]->username. " nije obrisao korisnika, GRESKA.");
        return redirect()->back()->with('error','Greška, nije obrisano.');
    }
   }
   public function showNews(){
       $news=new News();
       $this->data['news']=$news->getAll();
       return view('pages.adminNews',$this->data);
   }
   public function deleteNews($id,Request $request){
       News::destroy($id);
       if($id){
        Log::info("Admin " .$request->session()->get('user')[0]->username. " je obrisao vest iz tabele news.");
        return redirect()->back()->with('success','Uspešno obrisano.');
    }else{
        Log::info("Admin " .$request->session()->get('user')[0]->username. " nije obrisao vest, GRESKA.");
        return redirect()->back()->with('error','Greška, nije obrisano.');
    }
   }
   //ajax pretraga
   public function search(Request $request){      
    $unos=$request->get('search');
    $news=new News();
    $this->data['news']=$news->getByUnos($unos);
    return view('pages.adminNews',$this->data);
   }
   public function insertNewsForma(){
    return view('pages.adminInsertNews',$this->data);
   }
   public function insertNews(Request $request){
    if($request->has('add_news')){
       $rules=[
       // 'title' => 'regex:/^[A-Z][a-zšđčćž ]+(\s[\w\d\-]+)*$/',
           'slika'=>'mimes:jpg,jpeg,png|max:3000'
       ];
       $custom_messages=[
          // 'title.regex'=>'Polje naslov nije u ispravnom formatu, prvo slovo veliko.',
           'max'=>'Slika ne sme biti veca od :max KB.',
           'mimes'=>'Dozvoljeni formati su :values.'
       ];
       $request->validate($rules,$custom_messages);
       $photo=$request->file('photo');
       $extension=$photo->getClientOriginalExtension();
       $tmp_path=$photo->getPathName();
       $file_name=time().".".$extension;
       $path='images/'.$file_name;      
     //  $new_path=public_path($path);;
           File::move($tmp_path,$path);
        $news=new News();
        $news->title=$request->get('title');
        $news->text=$request->get('body');
        $news->image=$path;
        $news->meni_id=$request->get('ddlCategory');
        $insert=$news->insertNews();
    }
        Log::info("Admin " .$request->session()->get('user')[0]->username. " je uneo vest u tabelu news.");
        return redirect()->back()->with('success','Uspešno ste uneli vest u bazu.');
   }
   public function showMessages(){
       $messages=new ContactModel();
       $this->data['messages']=$messages->getAll();
       return view('pages.adminMessages',$this->data);
   }
   public function deleteMessages($id,Request $request){
    ContactModel::destroy($id);
    if($id){
        Log::info("Admin " .$request->session()->get('user')[0]->username. " je obrisao poruku iz tabele messages.");
        return redirect()->back()->with('success','Uspešno obrisano.');
    }else{
        Log::info("Admin " .$request->session()->get('user')[0]->username. " nije obrisao poruku, GRESKA.");
        return redirect()->back()->with('error','Greška, nije obrisano.');
    }
    }
   public function updateRole(Request $request){
       $role=$request->get('ddlRole');
       $korisnik=new UserModel();
       $korisnik->role=$role;
       $rez=$korisnik->updateRole();
       if($rez==1){
           return redirect()->back()->with('success','OK');
       }
       else{
           return redirect()->back()->with('error','GReska.');
       }
   }
   public function liveSearch(){
    return view('pages.adminLiveSearch',$this->data);
   }
   public function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('username', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orderBy('id_user', 'desc')
         ->get();
      }
      else
      {
       $data = DB::table('users')
         ->select('users.*')
         ->orderBy('users.id_user', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->id_user.'</td>
         <td>'.$row->username.'</td>
         <td>'.$row->email.'</td>
        <td> <button type="button" class="btn btn-danger btn-xs delete" id="'.$row->id_user.'">Delete</button></td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">Nema zadatog pojma</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );
      echo json_encode($data);
     }
    }
   public function delete_data(Request $request)
    {
        if($request->ajax())
        {
            DB::table('users')
                ->where('id_user', $request->id)
                ->delete();
            echo '<div class="alert alert-success">Korisnik obrisan!</div>';
        }
    }
}