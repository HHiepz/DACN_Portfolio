<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    /**
     * Xử lý đăng nhập
     */
    public function login(Request $request)
    {
        // Validate dữ liệu form
        $formField = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
                'email' => ':attribute không đúng định dạng',
            ],
            [
                'email' => 'Email',
                'password' => 'Mật khẩu'
            ]
        );

        // Kiểm tra thông tin đăng nhập
        if (Auth::attempt($formField)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
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
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
