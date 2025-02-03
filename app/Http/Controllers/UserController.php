<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at')->paginate(50);
        return view('be.user_index', compact('users'));
    }

    public function store(Request $request)
    {
        $email_validation = $request->id ? 'unique:users,email,' . $request->id : 'unique:users,email';
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', $email_validation],
            'role' => ['required', 'in:user,owner'],
            'gender' => ['required', 'in:male,female'],
            'expired_at' => ['nullable', 'date'],
        ];

        $request->validate($rules);

        $data = $request->except(['_token']);

        if ($request->id ?? null) {
            unset($data['email']);
            User::where('id', $request->id)->update($data);
        } else {
            $data['password'] =  Hash::make('11111111');
            User::create($data);
        }

        $request->session()->flash('notif', ["success" => 'Data Saved']);
        return redirect('/user');
    }

    public function destroy(Request $request, $id)
    {
        User::where('id', $id)->update(['expired_at' => now()->subDay()]);
        $request->session()->flash('notif', ["success" => 'Data Deleted']);

        return redirect('/user');
    }
}
