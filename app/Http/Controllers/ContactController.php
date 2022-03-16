<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ContactModel;
use Illuminate\Support\Facades\Log;
class ContactController extends Controller
{
    public function contactMsg(Request $request){
        if($request->has('contact-submit')){
            $this->validate($request,[
                'fullName'=>'required|min:4|max:50',
                'Email'=>'email|required',
                'number'=>'required',
                'Message'=>'required'
            ]);
            $kontakt=new ContactModel();
            $kontakt->fullname=$request->get('fullName');
            $kontakt->email=$request->get('Email');
            $kontakt->mobile=$request->get('number');
            $kontakt->message=$request->get('Message');
            $insert=$kontakt->ubaciContact();
            return redirect()->back()->withSuccess("Hvala na poruci, ubrzo očekujte odgovor!");
        }
    }
}