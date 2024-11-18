<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function list() {
        $users = DB::table('users')
            ->orderBy('id', 'desc')
            ->get();

        return view('users.list', compact('users'));
    }

    public function form() {
        $id = null;
        $name = null;
        $email = null;
        $password = null;

        return view('users.form', compact('id', 'name', 'email', 'password'));  
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/users/form')
                ->withErrors($validator)
                ->withInput();
        }

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/users/list');
    }

    public function edit($id) {
        $user = DB::table('users')->where('id', $id)->first();

        $id = null;
        $name = null;
        $email = null;
        $password = null;

        if (isset($user)) {
            $id = $user->id;
            $name = $user->name;
            $email = $user->email;
            $password = $user->password;
        }

        return view('users.form', compact('id', 'name', 'email', 'password'));
    }

    public function update(Request $request, $id) {
        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/userss/list');
    }

    public function remove($id) {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/users/list');
    }

    public function signIn() {
        return view('users.signIn');
    }

    public function signInProcess(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/user/signIn')
                ->withErrors($validator)
                ->withInput();
        }

        $user = DB::table('users')
            ->select('id')
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if (isset($user)) {
            session(['user_id' => $user->id]);
            return redirect('/backoffice');
        } else {
            return redirect('/user/signIn')
                ->withErrors(['search' => 'Invalid email or password'])
                ->withInput();
        }
    }

    public function signOut() {
        session()->forget('user_id');
        return redirect('/user/signIn');
    }

    public function info() {
        $user_id = session('user_id');
        $user = DB::table('users')
            ->select('id', 'name', 'email')
            ->where('id', $user_id)
            ->first();

        return view('users.info', compact('user'));
    }
}
