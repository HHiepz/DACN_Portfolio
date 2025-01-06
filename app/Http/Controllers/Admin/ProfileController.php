<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
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
    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $formFiled = $request->validate(
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:255',
                'major' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'iframe_google_map' => 'string|nullable',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'address' => 'required|string|max:255',
                'description' => 'required|string',
                'birthday' => 'date|nullable'
            ],
            [
                'required' => ':attribute không được để trống',
                'string' => ':attribute phải là chuỗi',
                'max' => ':attribute không được vượt quá :max ký tự',
                'image' => ':attribute phải là hình ảnh',
                'mimes' => ':attribute phải có định dạng jpeg, png, jpg, gif, svg',
                'date' => ':attribute phải là ngày tháng'
            ],
            [
                'first_name' => 'Tên gọi',
                'last_name' => 'Họ',
                'phone_number' => 'Số điện thoại',
                'major' => 'Chuyên ngành',
                'country' => 'Sinh sống',
                'iframe_google_map' => 'Iframe_google_map',
                'image' => 'Ảnh đại diện',
                'address' => 'Mô tả ngắn',
                'description' => 'Mô tả chi tiết',
                'birthday' => 'Ngày tháng năm sinh'
            ]
        );

        $user = Auth::user();

        if ($user) {
            $user->first_name = $formFiled['first_name'];
            $user->last_name = $formFiled['last_name'];
            $user->phone_number = $formFiled['phone_number'];
            $user->major = $formFiled['major'];
            $user->country = $formFiled['country'];
            $user->iframe_google_map = $formFiled['iframe_google_map'];
            $user->address = $formFiled['address'];
            $user->description = $formFiled['description'];
            $user->birthday = $formFiled['birthday'];

            // Xữ lý hình ảnh
            if ($request->hasFile('image')) {
                if (!empty($user->image_url) && Storage::exists('public/' . $user->image_url)) {
                    Storage::delete('public/' . $user->image_url);
                }

                // Lấy hình ảnh
                $image = $request->file('image');
                // Lưu hình ảnh
                $imagePath = $image->store('avatar', 'public');
                // Lưu database
                $user->image_url = $imagePath;
            }

            $user->save();

            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
        return redirect()->back()->with('error', 'Người dùng không tồn tại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
