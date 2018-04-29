<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Email;
use URL;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::id();
        $emails = DB::table('emails')->where('user_id', '=', $user)->get();
        
        return view('account', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('account');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'email' => 'email|required|unique:users|confirmed',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return redirect(URL::previous())->withErrors($validator)->withInput();
        }else{
            $email = new Email;
            $email->email = $request->input('email');
            $email->user_id = $request->user()->id;
            if($request->input('is_default') == '1'){
                $user = Auth::id();              
                Email::where('user_id', $user)
                ->where('is_default', '1')
                ->update(['is_default' => '0']);
                $email->is_default = '1';
                User::where('id', $user)
                ->update(['email' => $request->input('email')]);
            }else{
                $email->is_default = '0';
            }
            // dd($users_emails);
            $email->save();
            return redirect('account');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('account');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $email = Email::find($id);
        compact('email');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $email = Email::find($id);
        // dd($request);
        $emailData = array_filter($request->all());
        $email->fill($emailData);
        $rules = [
            'email' => 'email|required|unique:users',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return redirect(URL::previous())->withErrors($validator)->withInput();
        }else{
            $user = Auth::id(); 
            if(($request->input('is_default') == '1') || ($email->is_default == '1')){         
                Email::where('user_id', $user)
                ->where('is_default', '1')
                ->update(['is_default' => '0']);
                $email->is_default = '1';
                 User::where('id', $user)
                ->update(['email' => $request->input('email')]);
            }else{
                $email->is_default = '0';
            }
            $email->save();
            return redirect('account');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = Auth::id();
        $email = Email::find($id);
        if($email->is_default == '1'){
        
        return redirect('account');
        }else{
            $email->delete();
            return redirect('account');
        }
    }
}
