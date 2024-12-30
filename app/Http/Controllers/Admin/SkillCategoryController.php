<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkillCategory;


class SkillCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = SkillCategory::with('skills')
            ->orderByDesc('priority')
            ->paginate(10);
        return view('admin.skill.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = SkillCategory::all();
        return view('admin.skill.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formField = $request->validate(
            [
                'skill_category_name' => 'required|max:255'
            ],
            [
                'skill_category_name.required' => ':attribute không được để trống',
                'skill_category_name.max' => ':attribute không được vượt quá :max ký tự'
            ],
            [
                'skill_category_name' => 'Tên nhóm'
            ]
        );

        $category = new SkillCategory();
        $category->name = $formField['skill_category_name'];
        $category->priority = 0;
        $category->save();

        return redirect()->route('admin.skill.create')->with('success', 'Đã thêm mới nhóm kỹ năng thành công.');
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
    public function update(Request $request, $id)
    {
        $formField = $request->validate(
            [
                'skill_category_name' => 'required|max:255'
            ],
            [
                'skill_category_name.required' => ':attribute không được để trống',
                'skill_category_name.max' => ':attribute không được vượt quá :max ký tự'
            ],
            [
                'skill_category_name' => 'Tên nhóm'
            ]
        );

        $category = SkillCategory::find($id);

        if ($category) {
            $category->name = $formField['skill_category_name'];
            $category->save();
            return redirect()->back()->with('success', 'Đã cập nhật nhóm kỹ năng thành công.');
        }

        return redirect()->back()->with('error', 'Nhóm kỹ năng không tồn tại.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skillCategory = SkillCategory::find($id);
        if ($skillCategory) {
            $skillCategory->delete();
            return redirect()->route('admin.skills')->with('success', 'Đã xóa kỹ năng thành công.');
        }
        return redirect()->route('admin.skills')->with('error', 'Kỹ năng không tồn tại.');
    }

    public function upPriority($id)
    {
        $skillCategory = SkillCategory::find($id);
        if ($skillCategory) {
            $skillCategory->priority = $skillCategory->priority + 1;
            $skillCategory->save();
            return redirect()->route('admin.skill-categories')->with('success', 'Đã thay đổi thứ tự ưu tiên.');
        }
        return redirect()->route('admin.skill-categories')->with('error', 'Không tìm thấy nhóm kỹ năng.');
    }

    public function downPriority($id)
    {
        $skillCategory = SkillCategory::find($id);
        if ($skillCategory) {
            $skillCategory->priority = $skillCategory->priority - 1;
            $skillCategory->save();
            return redirect()->route('admin.skill-categories')->with('success', 'Đã thay đổi thứ tự ưu tiên.');
        }
        return redirect()->route('admin.skill-categories')->with('error', 'Không tìm thấy nhóm kỹ năng.');
    }

    public function resetPriority($id)
    {
        $skillCategory = SkillCategory::find($id);
        if ($skillCategory) {
            $skillCategory->priority = 0;
            $skillCategory->save();
            return redirect()->route('admin.skill-categories')->with('success', 'Đã reset thứ tự ưu tiên.');
        }
        return redirect()->route('admin.skill-categories')->with('error', 'Không tìm thấy nhóm kỹ năng.');
    }
}
