<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Welcome;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('admin');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required'],
            'player_id' => ['required_if:role,Player'],
            'team_id' => ['required_if:role,Captain'],
        ]);
    }

    protected function create(array $data)
    {
        $user = $data;

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'player_id' => $data['player_id'],
            'team_id' => $data['team_id'],
            Mail::to($user['email'])->send(new Welcome($user)),
        ]);
    }

    public function showRegistrationForm()
    {
        $players = Player::all();
        $teams = Team::get();

        return view('auth.register', compact('players', 'teams'));
    }
}
