<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Log;
class LoginController extends Controller
{
   public function login(Request $request){
        $user=new UserModel();
        $korisnicko = $request->get('username');
        $sifra = $request->get('password');
        $user->username=$korisnicko;
        $user->pass=$sifra;
        $prijava=$user->login();
        if(!empty($prijava)){
            $request->session()->push('user',$prijava);
            Log::info('Uspesno ulogovan korisnik: '.$request->session()->get('user')[0]->username);
            return redirect()->back()->with('success','Uspešno ste se ulogovali!');
        }
        else{
        Log::info('Korisnicko ime ili lozinka su pogresni, ip adresa: '.$request->ip());
        return redirect()->back()->with("error","Korisničko ime ili lozinka nisu validni. Pokušajte ponovo.");
    }
    }
   public function logout(Request $request){
       Log::info("Izlogovan je korisnik: ".$request->session()->get('user')[0]->username);
       $request->session()->forget('user');
       $request->session()->flush();
       return redirect('/')->with('success','Odjavili ste se!');
   }
}