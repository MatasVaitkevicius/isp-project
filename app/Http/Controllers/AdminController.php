<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }
    public function viewWorkersList()
    {
        $workers = User::where('user_role', 'worker')->orderBy('created_at')->get();
        return view('worker.workers', compact('workers'));
    }
    public function viewWorkerInfo($id)
    {
        $worker = User::find($id);
        return view('worker.workerinfo', compact('worker'));
    }

    public function updateWorker($id)
    {
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = request(['name', 'email']);
        DB::table('users')->where('id', $id)->update($user);
        return redirect()->route('viewWorkersList');
    }
    public function createWorker()
    {
        return view('admin.createworker');
    }

    public function createWorkerPost()
    {
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $array = request(['name', 'email', 'password']);
        User::create([
            'name' => $array['name'],
            'email' => $array['email'],
            'password' => Hash::make($array['password']),
            'user_role' => 'worker',
        ]);
        return redirect()->route('viewWorkersList');
    }

    public function deleteWorker($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('viewWorkersList');
    }
}
