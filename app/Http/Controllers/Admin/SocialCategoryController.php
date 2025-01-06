<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialCategories = SocialCategory::paginate(10);
        return view('admin.socialCategory.index', compact('socialCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.socialCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFiled = $request->validate(
            [
                'socialCategory_name' => 'required|string',
                'socialCategory_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
                'required' => ':attribute không được để trống',
                'string' => ':attribute phải là một chuỗi.',
                'image' => ':attribute phải là một hình ảnh.',
                'mimes' => ':attribute phải là một tệp thuộc loại: jpeg, png, jpg, gif, svg.',
                'max' => ':attribute không được lớn hơn 2048 kilobytes.'
            ],
            [
                'socialCategory_name' => 'Tên danh mục',
                'socialCategory_image' => 'Hình ảnh'
            ]
        );

        $socialCategory = new SocialCategory();
        $socialCategory->name = $formFiled['socialCategory_name'];

        // Xữ lý hình ảnh
        if ($request->hasFile('socialCategory_image')) {
            // Lấy hình ảnh
            $image = $request->file('socialCategory_image');

            // Lưu hình ảnh
            $imagePath = $image->store('socialCategories', 'public');

            // Lưu vào database
            $socialCategory->image_url = $imagePath;
        }
        $socialCategory->save();

        return redirect()->back()->with('success', 'Thêm danh mục mạng xã hội thành công');
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
    public function edit($id)
    {
        $socialCategory = SocialCategory::find($id);
        if ($socialCategory) {
            return view('admin.socialCategory.edit', compact('socialCategory'));
        }
        return redirect()->back()->with('error', 'Danh mục không tồn tại');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $formFiled = $request->validate(
            [
                'socialCategory_name' => 'required|string',
                'socialCategory_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
                'required' => ':attribute không được để trống',
                'string' => ':attribute phải là một chuỗi.',
                'image' => ':attribute phải là một hình ảnh.',
                'mimes' => ':attribute phải là một tệp thuộc loại: jpeg, png, jpg, gif, svg.',
                'max' => ':attribute không được lớn hơn 2048 kilobytes.'
            ],
            [
                'socialCategory_name' => 'Tên danh mục',
                'socialCategory_image' => 'Hình ảnh'
            ]
        );

        $socialCategory = SocialCategory::find($id);
        if ($socialCategory) {
            $socialCategory->name = $formFiled['socialCategory_name'];

            if ($request->hasFile('socialCategory_image')) {
                // Xóa hình ảnh cũ
                if (!empty($socialCategory->image_url) && Storage::exists('public/' . $socialCategory->image_url)) {
                    Storage::delete('public/' . $socialCategory->image_url);
                }

                // Lấy hình ảnh
                $image = $request->file('socialCategory_image');
                // Lưu vào thư mục
                $imagePath = $image->store('socialCategories', 'public');
                // Lưu vào database
                $socialCategory->image_url = $imagePath;
            }
            $socialCategory->save();

            return redirect()->back()->with('success', 'Cập nhật danh mục thành công');
        }
        return redirect()->back()->with('error', 'Danh mục không tồn tại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $socialCategory = SocialCategory::find($id);
        if ($socialCategory) {
            // Kiểm tra sản phẩm trong danh mục
            if ($socialCategory->socials->count() > 0) {
                return redirect()->back()->with('error', 'Không thể xóa vì tồn tại danh mục con');
            }
            // Xóa hình ảnh
            if (!empty($socialCategory->image_url) || Storage::exists('public/' . $socialCategory->image_url)) {
                Storage::delete('public/' . $socialCategory->image_url);
            }

            $socialCategory->delete();
            return redirect()->back()->with('success', 'Đã xóa danh mục thành công');
        }
        return redirect()->back()->with('error', 'Danh mục không tồn tại');
    }
}
