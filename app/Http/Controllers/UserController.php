<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
    private $data=[];
    public function registerUser(Request $request){
        if($request->has('register-submit')){
            $this->validate($request,[
                'nameRegister'=>'required|min:4|max:15|unique:users,username',
                'emailRegister'=>'email|required',
                'password'=>'required',
                'confirm_password'=>'required|same:password',
                'file'=>'required'
            ]);
            $photo=$request->file('file');
            $tmp_path=$photo->getPathName();
            $extension=$photo->getClientOriginalExtension();
            $file_name=time().'.'.$extension;
            $path='images/'.$file_name;
            $server_path=public_path($path);
            File::move($tmp_path,$server_path);
            $korisnik=new UserModel();
            $korisnik->username = $request->get('nameRegister');
            $korisnik->email = $request->get('emailRegister');
            $korisnik->pass = md5($request->get('password'));
            $korisnik->file = $path;
            $insert=$korisnik->insertUser();
        }
        return redirect()->back()->with('success','Uspešno ste se registrovali!');
        Log::info("Korisnik je registrovan".$request->ip());
    }
   public function updateProfile(Request $request){
       $username=$request->get('tbIme');
       $email=$request->get('tbEmail');
       $password=$request->get('tbLozinka');
       $korisnik=new UserModel();
       
       $korisnik->username=$username;
       $korisnik->email=$email;
       $korisnik->password=$password;
       $rez=$korisnik->update();
       if($rez==1){
        Log::info("Korisnik " .$request->session()->get('user')[0]->username. "je ažurirao profil.");
           return redirect()->back()->with('success','Uspešno ste se ažurirali profil.');
          
       }
       else{
        Log::info("Korisnik " .$request->session()->get('user')[0]->username. "nije ažurirao profil, greška.");
           return redirect()->with('error','Došlo je do greške.');
          
       }
   }
   public function updateAvatar(Request $request){
    $photo=$request->file('fSlika');
        if(!empty($photo)){
           
            $tmp_path=$photo->getPathName();
            $extension=$photo->getClientOriginalExtension();
            $file_name=time().'.'.$extension;
            $path='images/'.$file_name;
            $server_path=public_path($path);
            File::move($tmp_path,$server_path);
            $korisnik=new UserModel();
            $korisnik->file = $path;
            
       
        $rez=$korisnik->updateImg();
    
        if($rez==1){
            Log::info("Korisnik " .$request->session()->get('user')[0]->username. "je ažurirao profilnu sliku.");
            return redirect()->back()->with('success','Ažurirali ste profilnu sliku.');
            
        }
        else{
            Log::info("Korisnik " .$request->session()->get('user')[0]->username. "nije ažurirao profilnu sliku, GRESKA.");
            return redirect()->with('error','Došlo je do greške.');
           
        }
       }
   }
}