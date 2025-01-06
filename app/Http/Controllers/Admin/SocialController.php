<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;
use App\Models\SocialCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socials = Social::orderByDesc('priority')->paginate(10);
        return view('admin.social.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $socialCategories = SocialCategory::all();
        return view('admin.social.create', compact('socialCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFiled = $request->validate(
            [
                'social_category_id' => 'required',
                'social_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'social_name' => 'required|string|max:255',
                'social_type' => 'required|string|max:255',
                'social_short_description' => 'required|string|max:255',
                'social_description' => 'required',
                'social_started_at' => 'date|nullable',
                'social_ended_at' => 'date|nullable'
            ],
            [
                'required' => ':attribute không được để trống',
                'string' => ':attribute phải là chuỗi',
                'max' => ':attribute không được vượt quá :max ký tự',
                'image' => ':attribute phải là hình ảnh',
                'mimes' => ':attribute phải có định dạng jpeg, png, jpg, gif, svg',
                'date' => ':attribute phải là ngày tháng',
            ],
            [
                'social_category_id' => 'Danh mục',
                'social_image' => 'Hình ảnh sản phẩm',
                'social_name' => 'Tên sản phẩm',
                'social_type' => 'Loại sản phẩm',
                'social_short_description' => 'Mô tả ngắn sản phẩm',
                'social_description' => 'Mô tả chi tiết sản phẩm',
                'social_started_at' => 'Ngày bắt đầu',
                'social_ended_at' => 'Ngày kết thúc'
            ]
        );

        $social = new Social();
        $social->user_id = Auth::id();
        $social->social_category_id = $formFiled['social_category_id'];
        $social->name = $formFiled['social_name'];
        $social->type = $formFiled['social_type'];
        $social->short_description = $formFiled['social_short_description'];
        $social->description = $formFiled['social_description'];
        $social->social_started_at = $formFiled['social_started_at'];
        $social->social_ended_at = $formFiled['social_ended_at'];
        $social->priority = 0;
        $social->status = 'draft';

        // Xử lý hình ảnh
        if ($request->hasFile('social_image')) {
            // Lấy hình ảnh
            $image = $request->file('social_image');
            // Lưu hình ảnh
            $imagePath = $image->store('socials', 'public');
            // Lưu vào database
            $social->image_url = $imagePath;
        }
        $social->save();

        return redirect()->back()->with('success', 'Thêm mạng xã hội thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $social = Social::find($id);
        if ($social) {
            $socialCategories = SocialCategory::all();
            return view('admin.social.edit', compact('social', 'socialCategories'));
        }
        return redirect()->back()->with('error', 'Mạng xã hội không tồn tại');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $formFiled = $request->validate(
            [
                'social_category_id' => 'required',
                'social_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'social_name' => 'required|string|max:255',
                'social_type' => 'required|string|max:255',
                'social_short_description' => 'required|string|max:255',
                'social_description' => 'required',
                'social_started_at' => 'date|nullable',
                'social_ended_at' => 'date|nullable',
                'social_status' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
                'string' => ':attribute phải là chuỗi',
                'max' => ':attribute không được vượt quá :max ký tự',
                'image' => ':attribute phải là hình ảnh',
                'mimes' => ':attribute phải có định dạng jpeg, png, jpg, gif, svg',
                'date' => ':attribute phải là ngày tháng',
            ],
            [
                'social_category_id' => 'Danh mục',
                'social_image' => 'Hình ảnh sản phẩm',
                'social_name' => 'Tên sản phẩm',
                'social_type' => 'Loại sản phẩm',
                'social_short_description' => 'Mô tả ngắn sản phẩm',
                'social_description' => 'Mô tả chi tiết sản phẩm',
                'social_started_at' => 'Ngày bắt đầu',
                'social_ended_at' => 'Ngày kết thúc',
                'social_status' => 'Trạng thái sản phẩm'
            ]
        );

        $social = Social::find($id);
        if ($social) {
            $social->social_category_id = $formFiled['social_category_id'];
            $social->name = $formFiled['social_name'];
            $social->type = $formFiled['social_type'];
            $social->short_description = $formFiled['social_short_description'];
            $social->description = $formFiled['social_description'];
            $social->social_started_at = $formFiled['social_started_at'];
            $social->social_ended_at = $formFiled['social_ended_at'];
            $social->status = $formFiled['social_status'];

            if ($request->hasFile('social_image')) {
                // Xóa ảnh cũ
                if (!empty($social->image_url) && Storage::exists('public/' . $social->image_url)) {
                    Storage::delete('public/' . $social->image_url);
                }
                // Lấy hình ảnh
                $image = $request->file('social_image');
                // Lưu hình ảnh
                $imagePath = $image->store('socials', 'public');
                // Lưu vào database
                $social->image_url = $imagePath;
            }
            $social->save();

            return redirect()->back()->with('success', 'Cập nhật mạng xã hội thành công');
        }
        return redirect()->back()->with('error', 'Mạng xã hội không tồn tại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $social = Social::find($id);
        if ($social) {
            // Xóa hình ảnh
            if (!empty($social->image_url) && Storage::exists('public/' . $social->image_url)) {
                Storage::delete('public/' . $social->image_url);
            }

            // Xóa dữ liệu
            $social->delete();

            return redirect()->back()->with('success', 'Xóa mạng xã hội thành công');
        }
        return redirect()->back()->with('error', 'Mạng xã hội không tồn tại');
    }


    public function upPriority($id)
    {
        $social = Social::find($id);
        if ($social) {
            $social->priority = $social->priority + 1;
            $social->save();
            return redirect()->back()->with('success', 'Tăng ưu tiên thành công');
        }
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
    }

    public function downPriority($id)
    {
        $social = Social::find($id);
        if ($social) {
            $social->priority = $social->priority - 1;
            $social->save();
            return redirect()->back()->with('success', 'Giảm ưu tiên thành công');
        }
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
    }

    public function resetPriority($id)
    {
        $social = Social::find($id);
        if ($social) {
            $social->priority = 0;
            $social->save();
            return redirect()->back()->with('success', 'Đặt lại ưu tiên thành công');
        }
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
    }
}
