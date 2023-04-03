<?php

namespace App\Http\Controllers;

use App\Mail\aconts;
use App\Models\admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as RulesPassword;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sd = User::all();
        return response()->view('admin.showdatauser', ['data' => $sd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.add_admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([

            'name' => 'required | min:5',
            'email' => 'required |unique:users,email|email',
            'password' => 'required',

        ]);

        $er = new admin;

        $er->name = $request->input('name');
        $er->email = $request->input('email');
        $er->password = Hash::make($request->input('password'));
        $sder = $er->save();

        if ($sder) {
            Mail::to($request->user())->send(new aconts($er));
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $save = admin::find($id);

        return response()->view('admin.edit_Admin', ['ss' => $save]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([

            'name' => 'required | min:5',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $save = admin::find($id);
        $save->name = $request->input('name');
        $save->email = $request->input('email');

        $save->save();

        return redirect()->route('showAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }

    public function indexAdmin()
    {
        $dataadmin = admin::all();
        return response()->view('admin.show_Admin', ['data' => $dataadmin]);
    }
}
