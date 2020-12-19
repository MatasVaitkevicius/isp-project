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
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        
        $worker = User::select('name', 'email')
            ->where('id', $id)->first();
        $user = request(['name', 'email', 'gender', 'first_name', 'surname', 'birthday', 'phone', 'work_position', 'salary', 'workload']);
        if ($worker->name != $user['name'])
        {
            $this->validate(request(), [
                'name' => ['unique:users'],
            ]);
        } 
        if ($worker->email != $user['email'])
        {
            $this->validate(request(), [
                'email' => ['unique:users'],
            ]);
        }

        //end of validation sequence
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
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'birthday' => ['date'],
        ]);

        $array = request(['name', 'email', 'password', 'gender', 'first_name', 'surname', 'birthday', 'phone', 'work_position', 'salary', 'workload']);
        User::create([
            'name' => $array['name'],
            'email' => $array['email'],
            'password' => Hash::make($array['password']),
            'user_role' => 'worker',
            'first_name' => $array['first_name'],
            'gender' => $array['gender'],
            'surname' => $array['surname'],
            'birthday' => $array['birthday'],
            'phone' => $array['phone'],
            'work_position' => $array['work_position'],
            'salary' => $array['salary'],
            'worklaod' => $array['workload']
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
