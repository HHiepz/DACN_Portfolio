<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialCategory;
use Illuminate\Http\Request;

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
        return view('admin.socialCateogry.edit');
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
