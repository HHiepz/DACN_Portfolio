<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::orderByDesc('created_at')->paginate(10);
        return view('admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formField = $request->validate(
            [
                'name' => 'required',
                'priority' => 'required|integer',
                'short_description' => 'required'
            ],
            [
                'name.required' => 'Tên ngôn ngữ không được để trống',
                'priority.required' => 'Thứ tự ưu tiên không được để trống',
                'priority.integer' => 'Thứ tự ưu tiên phải là số nguyên',
                'short_description.required' => 'Mô tả ngắn không được để trống'
            ],
            [
                'name' => 'Tên ngôn ngữ',
                'priority' => 'Thứ tự ưu tiên',
                'short_description' => 'Mô tả ngắn'
            ]
        );

        $language = new Language();
        $language->user_id = Auth::id();
        $language->name = $formField['name'];
        $language->priority = $formField['priority'];
        $language->short_description = $formField['short_description'];
        $language->save();

        return redirect()->route('admin.languages')->with('success', 'Ngôn ngữ đã được tạo thành công.');
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
        $language = Language::find($id);
        return view('admin.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $formField = $request->validate(
            [
                'name' => 'required',
                'priority' => 'required|integer',
                'short_description' => 'required'
            ],
            [
                'name.required' => 'Tên ngôn ngữ không được để trống',
                'priority.required' => 'Thứ tự ưu tiên không được để trống',
                'priority.integer' => 'Thứ tự ưu tiên phải là số nguyên',
                'short_description.required' => 'Mô tả ngắn không được để trống'
            ],
            [
                'name' => 'Tên ngôn ngữ',
                'priority' => 'Thứ tự ưu tiên',
                'short_description' => 'Mô tả ngắn'
            ]
        );

        $language = Language::find($id);

        $language->name = $formField['name'];
        $language->priority = $formField['priority'];
        $language->short_description = $formField['short_description'];

        $language->save();

        return redirect()->route('admin.languages')->with('success', 'Ngôn ngữ đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $language = Language::find($id);
        if ($language) {
            $language->delete();
            return redirect()->route('admin.languages')->with('success', 'Ngôn ngữ đã được xóa thành công.');
        }
        return redirect()->route('admin.languages')->with('error', 'Không tìm thấy ngôn ngữ cần xóa.');
    }
}
