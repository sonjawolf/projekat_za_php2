<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
class adminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if($request->session()->has('user')){
            $korisnik=$request->session()->get('user')[0];
            if($korisnik->name=='admin'){
                return $next($request);
            }        
            else{
                return redirect()->back()->with('roleError','Nemate dozvolu za pristup ovoj stranici.');
            }
        }
        Log::info('Neautorizovani korisnik pokusava pristup ovoj stranici'.$request->ip());
        return redirect()->back()->with('roleError','Zabranjen pristup traženoj stranici.');
    }
}