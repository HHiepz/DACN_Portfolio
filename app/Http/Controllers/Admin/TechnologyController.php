<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::paginate(10);
        return view('admin.technology.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technology.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formField = $request->validate(
            [
                'technology_name' => 'required|string|max:255',
                'technology_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'technology_name.required' => ':attribute không được để trống',
                'technology_name.string' => ':attribute phải là chuỗi',
                'technology_name.max' => ':attribute không được vượt quá :max ký tự',
                'technology_image.required' => ':attribute không được để trống',
                'technology_image.image' => ':attribute phải là hình ảnh',
                'technology_image.mimes' => ':attribute phải có định dạng jpeg, png, jpg, gif, svg',
                'technology_image.max' => ':attribute không được vượt quá :max KB',
            ],
            [
                'technology_name' => 'Tên công nghệ',
                'technology_image' => 'Hình ảnh công nghệ',
            ]
        );

        // Lấy hình ảnh
        $image = $formField['technology_image'];

        // Lưu hình ảnh vào thư mục public/technologies
        $imagePath = $image->store('technologies', 'public');

        // Lưu vào database
        $technology = new Technology();
        $technology->name = $formField['technology_name'];
        $technology->image_url = $imagePath;
        $technology->save();

        return redirect()->back()->with('success', 'Thêm công nghệ thành công');
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
        $technology = Technology::find($id);
        if ($technology) {
            return view('admin.technology.edit', compact('technology'));
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy công nghệ');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $formField = $request->validate(
            [
                'technology_name' => 'required|string|max:255',
                'technology_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'technology_name.required' => ':attribute không được để trống',
                'technology_name.string' => ':attribute phải là chuỗi',
                'technology_name.max' => ':attribute không được vượt quá :max ký tự',
                'technology_image.image' => ':attribute phải là hình ảnh',
                'technology_image.mimes' => ':attribute phải có định dạng jpeg, png, jpg, gif, svg',
                'technology_image.max' => ':attribute không được vượt quá :max KB',
            ],
            [
                'technology_name' => 'Tên công nghệ',
                'technology_image' => 'Hình ảnh công nghệ',
            ]
        );

        $technology = Technology::find($id);

        if ($technology) {
            $technology->name = $formField['technology_name'];

            if ($request->hasFile('technology_image')) {
                // Xóa ảnh cũ nếu tệp tin tồn tại
                if (Storage::exists('public/' . $technology->image_url)) {
                    Storage::delete('public/' . $technology->image_url);
                }

                // Lưu hình ảnh mới
                $image = $formField['technology_image'];
                $imagePath = $image->store('technologies', 'public');
                $technology->image_url = $imagePath;
            }

            $technology->save();

            return redirect()->back()->with('success', 'Cập nhật công nghệ thành công');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy công nghệ');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $technology = Technology::find($id);

        if ($technology) {
            // Xóa ảnh nếu tệp tin tồn tại
            if (Storage::exists('public/' . $technology->image_url)) {
                Storage::delete('public/' . $technology->image_url);
            }
            // Xóa bản ghi
            $technology->delete();

            return redirect()->back()->with('success', 'Xóa công nghệ thành công');
        }
        return redirect()->back()->with('success', 'Không tìm thấy công nghệ');
    }
}
