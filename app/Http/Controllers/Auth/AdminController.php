<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use  App\Http\Requests\Auth\AdminRequest;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(AdminRequest $request)
    // {
    //     if ($request->authenticate()) {

    //         $request->session()->regenerate();

    //         return redirect()->intended(RouteServiceProvider::ADMIN);
    //     }
    //     return redirect()->back()->withErrors([
    //         'name' => 'error happen!'
    //     ]);
    // }

    public function store(AdminRequest $request)
    {
        if (auth()->guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::ADMIN);
        }

        // return redirect()->back()->withErrors([
        //     'email' => 'Invalid email or password.admin',
        // ])->withInput($request->only('email'));
        return redirect()->back()->withErrors([
            'name' => (trans(('Dashboard/auth.failed'))),
        ])->withInput($request->only('email'));
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Auth::guard('admin')->logout();


        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return redirect('/');


        // Clear all session data
        $request->session()->flush();

        // Regenerate the CSRF token to prevent reuse
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
