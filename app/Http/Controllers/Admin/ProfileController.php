<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use Illuminate\Support\Facades\Hash;

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
        $files = File::all();
        return view('admin.profile.edit', compact('user', 'files'));
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
                'birthday' => 'date|nullable',
                'github_link' => 'string|nullable',
                'facebook_link' => 'string|nullable',
                'linkedin_link' => 'string|nullable',
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
                'birthday' => 'Ngày tháng năm sinh',
                'github_link' => 'Link Github',
                'facebook_link' => 'Link Facebook',
                'linkedin_link' => 'Link Linkedin'
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
            $user->github_link = $formFiled['github_link'];
            $user->facebook_link = $formFiled['facebook_link'];
            $user->linkedin_link = $formFiled['linkedin_link'];

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

    public function storeFile(Request $request)
    {
        if ($request->hasFile('files')) {
            $request->validate(
                [
                    'files' => 'required',
                    'files.*' => 'mimes:pdf|max:2048',
                ],
                [
                    'files.required' => 'File không được để trống',
                    'files.*.mimes' => 'File thứ :index phải có định dạng pdf',
                    'files.*.max' => 'File thứ :index không được vượt quá 2MB',
                ],
                [
                    'files' => 'File',
                ]
            );
            // Kiểm tra file trùng tên
            foreach ($request->file('files') as $file) {
                if (File::where('name', $file->getClientOriginalName())->exists()) {
                    return redirect()->back()->with('error', 'File bạn tải lên đã có trong hệ thống');
                }
            }

            // Lập qua danh sách file
            foreach ($request->file('files') as $file) {
                // Lưu file với tên gốc
                $filePath = $file->storeAs('cv', $file->getClientOriginalName(), 'public');

                // Lưu thông tin file vào database
                $fileModel = new File();
                $fileModel->name = $file->getClientOriginalName();
                $fileModel->file_url = $filePath;
                $fileModel->save();
            }

            return redirect()->back()->with('success', 'Tải file thành công');
        }
        return redirect()->back()->with('error', 'Vui lòng chọn file');
    }

    public function destroyFile($id)
    {
        $file = File::find($id);
        if ($file) {
            // Xóa file
            if (!empty($file->file_url) && Storage::exists('public/' . $file->file_url)) {
                Storage::delete('public/' . $file->file_url);
            }

            $user = Auth::user();
            if ($user->file_id == $id) {
                $user->file_id = NULL;
                $user->save();
            }

            $file->delete();
            return redirect()->back()->with('success', 'Xóa thành công 1 file chi tiết');
        }
        return redirect()->back()->with('error', 'File bạn vừa chọn không tồn tại');
    }

    public function disableFileDisplay()
    {
        $user = Auth::user();
        if ($user) {
            $user->file_id = NULL;
            $user->save();
            return redirect()->back()->with('success', 'Đã bỏ hiển thị file thành công');
        }
        return redirect()->back()->with('error', 'Người dùng không tồn tại');
    }

    public function enableFileDisplay($id)
    {
        $user = Auth::user();
        if ($user) {
            $file = File::find($id);
            if ($file) {
                $user->file_id = $id;
                $user->save();
                return redirect()->back()->with('success', 'Đặt file hiển thị thành công');
            }
            return redirect()->back()->with('error', 'File không tồn tại');
        }
        return redirect()->back()->with('error', 'Người dùng không tồn tại');
    }

    public function editPassword()
    {
        return view('admin.forgotPassword.change');
    }

    public function updatePassword(Request $request)
    {
        $formFiled = $request->validate(
            [
                'passworld_old' => 'required',
                'passworld' => 'required',
                'passworld_again' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'passworld_old' => 'Mật khẩu cũ',
                'passworld' => 'Mật khẩu mới',
                'passworld_again' => 'Mật khẩu lập lại'
            ]
        );

        if ($formFiled['passworld'] !== $formFiled['passworld_again']) {
            return redirect()->back()->with('error', 'Mật khẩu mới và mật khẩu lập lại không khớp');
        }

        $user = Auth::user();
        if ($user && Hash::check($formFiled['passworld_old'], $user->password)) {
            $user->password = Hash::make($formFiled['passworld']);
            $user->save();
            return redirect()->back()->with('success', 'Cập nhật mật khẩu thành công');
        }

        return redirect()->back()->with('error', 'Mật khẩu cũ không đúng');
    }
}
