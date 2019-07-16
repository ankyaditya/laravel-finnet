<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
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
        $allfw = \App\AccessFirewall::all()->count();
        $pendingfw = \App\AccessFirewall::where('step','0')->orWhere('step','1')->orWhere('step','2')->count();
        $approvedfw = \App\AccessFirewall::where('step','3')->count();
        $dissaprovedfw = \App\AccessFirewall::where('step','-1')->count();

        $allrs = \App\Server::all()->count();
        $pendingrs = \App\Server::where('step','0')->orWhere('step','1')->orWhere('step','2')->count();
        $approvedrs = \App\Server::where('step','3')->count();
        $dissaprovedrs = \App\Server::where('step','-1')->count();

        $allos = \App\UserOs::all()->count();
        $pendingos = \App\UserOs::where('step','0')->orWhere('step','1')->orWhere('step','2')->count();
        $approvedos = \App\UserOs::where('step','3')->count();
        $dissaprovedos = \App\UserOs::where('step','-1')->count();

        $allol = \App\OrderLink::all()->count();
        $pendingol = \App\OrderLink::where('step','0')->orWhere('step','1')->orWhere('step','2')->count();
        $approvedol = \App\OrderLink::where('step','3')->count();
        $dissaprovedol = \App\OrderLink::where('step','-1')->count();

        $data = array(
            'allfw' => $allfw,
            'pendingfw' => $pendingfw,
            'approvedfw' => $approvedfw,
            'dissaprovedfw' => $dissaprovedfw,

            'allrs' => $allrs,
            'pendingrs' => $pendingrs,
            'approvedrs' => $approvedrs,
            'dissaprovedrs' => $dissaprovedrs,

            'allos' => $allos,
            'pendingos' => $pendingos,
            'approvedos' => $approvedos,
            'dissaprovedos' => $dissaprovedos,
            
            'allol' => $allol,
            'pendingol' => $pendingol,
            'approvedol' => $approvedol,
            'dissaprovedol' => $dissaprovedol
        );

        return view('home',$data);
    }

    public function profile()
    {
        $user = \App\Timeline::where('id_user',\Auth::user()->id)->get();
        $show = array(
            'user' => $user
        );
        return view("profile.profile",$show);
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = \Auth::user('id');
        $user->name = $request->get('name');
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        if (empty($request->get('password'))) { } else {
            $user->password = \Hash::make($request->get('password'));
        }
        if ($request->file('avatar')) {
            if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
                \Storage::delete('public/' . $user->avatar);
            }
            $file = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $file;
        }

        $user->save();
        return redirect()->route('home.profile')->with('status', 'User succesfully updated');
    }

}
