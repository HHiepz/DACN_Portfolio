<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
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
        $formFiled = $request->validate(
            [
                'skill_name' => 'required|max:255',
                'skill_category_id' => 'required'
            ],
            [
                'skill_name.required' => ':attribute không được để trống',
                'skill_name.max' => ':attribute không được vượt quá :max ký tự',
                'skill_category_id.required' => ':attribute không được để trống',
                'skill_category_id.exists' => ':attribute không tồn tại'
            ],
            [
                'skill_name' => 'Tên kỹ năng',
                'skill_category_id' => 'Nhóm kỹ năng'
            ]
        );

        $category_exist = SkillCategory::find($formFiled['skill_category_id']);
        if (!$category_exist) {
            return redirect()->back()->with('error', 'Nhóm kỹ năng không tồn tại.');
        }

        $skill = new Skill();
        $skill->user_id = Auth::id();
        $skill->name = $formFiled['skill_name'];
        $skill->skill_category_id = $formFiled['skill_category_id'];
        $skill->priority = 0;
        $skill->save();

        return redirect()->back()->with('success', 'Đã thêm mới kỹ năng thành công.');
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
        $category = SkillCategory::with('skills')->find($id);
        if ($category) {
            return view('admin.skill.edit', compact('category'));
        }
        return redirect()->back()->with('error', 'Kỹ năng không tồn tại.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $formField = $request->validate(
            [
                'skill_name' => 'required|max:255',
                'skill_category_id' => 'required'
            ],
            [
                'skill_name.required' => ':attribute không được để trống',
                'skill_name.max' => ':attribute không được vượt quá :max ký tự',
                'skill_category_id.required' => ':attribute không được để trống',
                'skill_category_id.exists' => ':attribute không tồn tại'
            ],
            [
                'skill_name' => 'Tên kỹ năng',
                'skill_category_id' => 'Nhóm kỹ năng'
            ]
        );

        $category_exist = SkillCategory::find($formField['skill_category_id']);
        if (!$category_exist) {
            return redirect()->back()->with('error', 'Nhóm kỹ năng không tồn tại.');
        }

        $skill = Skill::find($id);
        if ($skill) {
            $skill->name = $formField['skill_name'];
            $skill->skill_category_id = $formField['skill_category_id'];
            $skill->save();
            return redirect()->back()->with('success', 'Đã cập nhật kỹ năng thành công.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        if ($skill) {
            $skill->delete();
            return redirect()->back()->with('success', 'Đã xóa kỹ năng thành công.');
        } else {
            return redirect()->back()->with('error', 'Kỹ năng không tồn tại.');
        }
    }
}
