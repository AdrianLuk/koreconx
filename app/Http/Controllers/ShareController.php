<?php

namespace App\Http\Controllers;

use Validator;
// use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Share;
use App\User;
use URL;


class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shares = Share::get();

        return view('shares', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('purchase');
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
            'company_name'          => 'required',
            'share_instrument_name' => 'required',
            'price'                 => 'required|digits_between:1, 16',
            'quantity'              => 'required',
            'total_investment'      => 'required',
            'certificate_number'    => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator){
            $messages = $validator->messages();
            return redirect(URL::previous())->withErrors($validator)->withInput();
        }else{
            $user = User::get()->first();
        $share = new Share;
        $share->company_name = $request->input('company_name');
        $share->share_instrument_name = $request->input('share_instrument_name');
        $share->price = $request->input('price');
        $share->quantity = $request->input('quantity');
        $share->total_investment = $request->input('total_investment');
        $share->certificate_number = $request->input('certificate_number');
        $share->user_id = $user->id;
        $share->save();
        return redirect ('shares');
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
        return view('shares');
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
        $share = Share::find($id);
        return view('shares-edit', compact('share'));
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
        $share = Share::find($id);
        $shareData = array_filter($request->all());
        $share->fill($shareData);

        // $rules = [
        //     'company_name'          => 'required',
        //     'share_instrument_name' => 'required',
        //     'price'                 => 'required',
        //     'quantity'              => 'required',
        //     'total_investment'      => 'required',
        //     'certificate_number'    => 'required',
        // ];

        // $validator = Validator::make($share, $rules);
        // if ($validator-fails()){
        //     $messages = $validator->messages();
        //     return redirect(URL::previous())->withErrors($validator)->withInput();
        // }else{
        $share->save();
        return redirect ('shares');
        // }
        
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
        $share = Share::find($id);
        $share->delete();
        return redirect('shares');
    }
}
