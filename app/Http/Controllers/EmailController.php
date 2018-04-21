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
            'email' => 'required|unique:users|confirmed',
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
                $users_emails = DB::table('emails')->where('user_id', $user)->get();
                compact($users_emails);
                // dd($users_emails);
                foreach($users_emails as $user_email){
                    
                    if ($user_email->is_default == '1'){
                    $user_email->is_default = '0';
                    }else{
                        $user_email->is_default = '0';
                    }
                }
                $email->is_default = '1';
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
        $email = Email::find($id);
        $email->delete();
        return redirect('account');
    }
}
