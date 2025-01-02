<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = ProductCategory::paginate(10);
        return view('admin.productCategory.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.productCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formField = $request->validate(
            [
                'productCategory_name' => 'required|string|max:255',
                'productCategory_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'productCategory_name.required' => ':attribute không được để trống',
                'productCategory_name.string' => ':attribute phải là chuỗi',
                'productCategory_name.max' => ':attribute không được vượt quá :max ký tự',
                'productCategory_image.image' => ':attribute phải là ảnh',
                'productCategory_image.mimes' => ':attribute phải có định dạng jpeg, png, jpg, gif, svg',
                'productCategory_image.max' => ':attribute không được vượt quá :max KB',
            ],
            [
                'productCategory_name' => 'Tên danh mục',
                'productCategory_image' => 'Ảnh danh mục',
            ]
        );

        $productCategory = new ProductCategory();
        $productCategory->name = $formField['productCategory_name'];

        if (isset($formField['productCategory_image'])) {
            // Lấy hình ảnh
            $image = $formField['productCategory_image'];

            // Lưu ảnh vào thư mục public/productCategories
            $imagePath = $image->store('productCategories', 'public');

            // Lưu đường dẫn ảnh vào cơ sở dữ liệu
            $productCategory->image_url = $imagePath;
        }

        $productCategory->save();

        return redirect()->back()->with('success', 'Thêm danh mục sản phẩm thành công');
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
        $productCategory = ProductCategory::find($id);
        if ($productCategory) {
            return view('admin.productCategory.edit', compact('productCategory'));
        }
        return redirect()->back()->with('error', 'Danh mục sản phẩm không tồn tại');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $formField = $request->validate(
            [
                'productCategory_name' => 'required|string|max:255',
                'productCategory_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'productCategory_name.required' => ':attribute không được để trống',
                'productCategory_name.string' => ':attribute phải là chuỗi',
                'productCategory_name.max' => ':attribute không được vượt quá :max ký tự',
                'productCategory_image.image' => ':attribute phải là ảnh',
                'productCategory_image.mimes' => ':attribute phải có định dạng jpeg, png, jpg, gif, svg',
                'productCategory_image.max' => ':attribute không được vượt quá :max KB',
            ],
            [
                'productCategory_name' => 'Tên danh mục',
                'productCategory_image' => 'Ảnh danh mục',
            ]
        );

        $category = ProductCategory::find($id);

        if ($category) {
            $category->name = $formField['productCategory_name'];

            if ($request->hasFile('productCategory_image')) {
                // Xóa ảnh cũ
                if (Storage::exists('public/' . $category->image_url)) {
                    Storage::delete('public/' . $category->image_url);
                }

                // Lấy ảnh mới
                $image = $formField['productCategory_image'];
                $imagePath = $image->store('productCategories', 'public');
                $category->image_url = $imagePath;
            }

            $category->save();

            return redirect()->back()->with('success', 'Cập nhật danh mục sản phẩm thành công');
        }
        return redirect()->back()->with('error', 'Danh mục sản phẩm không tồn tại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = ProductCategory::find($id);

        if ($category) {
            if ($category->products->count() > 0) {
                return redirect()->back()->with('error', 'Danh mục sản phẩm đang chứa sản phẩm');
            }

            // Xóa ảnh
            if (Storage::exists('public/' . $category->image_url)) {
                Storage::delete('public/' . $category->image_url);
            }

            // Xóa dữ liệu
            $category->delete();

            return redirect()->back()->with('success', 'Xóa danh mục sản phẩm thành công');
        }
        return redirect()->back()->with('error', 'Danh mục sản phẩm không tồn tại');
    }
}
