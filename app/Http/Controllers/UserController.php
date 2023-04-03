<?php

namespace App\Http\Controllers;

// use App\Mail\sendUser;
// use App\Mail\sendUserEmail;

use App\Mail\SendEmail;
use App\Mail\sendUserEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->img);
        $de = '';
        if ($request->input('urgent') == 'on') {
            $de = '1';
        } else {
            $de = '0';
        }

        $request->validate([
            'title' => 'required|string|',
            'message' => 'required|string',
            'email' => 'required|',
            'Your_student_number' => 'required|',
            'radio1' => 'required',
            'name' => 'required|string',
            'img' => 'image',
        ]);



        $oll = new User;
        $oll->title = $request->input('title');
        $oll->message = $request->input('message');
        $oll->email = $request->input('email');
        $oll->Your_student_number = $request->input('Your_student_number');
        $oll->name_student = $request->input('name');
        $oll->type = $request->input('radio1');
        $oll->urgent = $de;
        $oll->status;

        if ($request->hasFile('img')) {
            $userImage = $request->file('img');
            $imageName = time() . '_isdmagesd_' . '.' . $userImage->getClientOriginalExtension();
            $userImage->storePubliclyAs('users', $imageName, ['disk' => 'public']);
            $oll->image = 'users/' . $imageName;
        }
        $ss =  $oll->save();
        if ($ss) {
            // Mail::to($request->user())->send(new sendUserEmail($oll));
            Mail::to($request->user())->send(new SendEmail($oll));
        }

        return redirect()->back();
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
        $save = User::find($id);
        $save->response = $request->input('response');
        $save->save();
        return redirect()->route('showdata');
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
        //Eloquent:
        $save = User::findOrFail($id);
        $deleted = $save->delete();
        //كود حذف الصورة من المجلد تبعها بعد حذفها من الواجهة
        if ($deleted) {
            Storage::delete($save->image);
        }

        //
        return redirect()->back();
    }

    public function Adit_status(Request $request, $id)
    {
        $save = User::find($id);
        $save->status = 'Closed';
        $save->closed_date = '1';

        $save->save();
        return redirect()->route('showdata');
    }
}
