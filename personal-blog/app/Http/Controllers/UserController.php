<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(10);
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'tipe' => 'required'
        ]);

        if($request->input('password')) {
            $password = bcrypt($request->password);
        }
        else
        {
            $password = bcrypt('1234');
        }

        User::create([
                'name' => $request->name,
                'email' => $request->email,
                'tipe' => $request->tipe,
                'password' => $password
        ]);       

        return redirect()->back()->with('success','User Berhasil Disimpan');
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
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
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
         $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'tipe' => 'required'
          ]);

         $user = User::find($id);

         if ($request->has('gambar')) {
            $old_gambar = $user->gambar;
            if(File::exists($old_gambar)){
                if($old_gambar !== 'public/uploads/users/avatar-1.png'){
                    File::delete($old_gambar);
                }
            }

            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/users/', $new_gambar);
             if($request->input('password')) {

                $user_data = [
                    'name' => $request->name,
                    'tipe' => $request->tipe,
                    'gambar' => 'public/uploads/users/'.$new_gambar,
                    'password' => bcrypt($request->password)
                ];
             }
             else{
                $user_data = [
                    'name' => $request->name,
                    'tipe' => $request->tipe,
                    'gambar' => 'public/uploads/users/'.$new_gambar,
                    ];
             }
        } else { 
            if($request->input('password')) {

                $user_data = [
                    'name' => $request->name,
                    'tipe' => $request->tipe,
                    'password' => bcrypt($request->password)
                ];
             }
             else{
                $user_data = [
                    'name' => $request->name,
                    'tipe' => $request->tipe,
                    ];
             }
        }

         $user->update($user_data);

         return redirect()->route('user.index')->with('success','berhasil diupdate');

         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $old_gambar = $user->gambar;
        if(File::exists($old_gambar)){
            if($old_gambar !== 'public/uploads/users/avatar-1.png'){
                File::delete($old_gambar);
            }
        }
        $user->delete();

        return redirect()->back()->with('success','Berhasil Cuy dihapus');
    }
}
