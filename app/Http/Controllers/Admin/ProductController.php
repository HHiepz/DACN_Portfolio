<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Technology;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderByDesc('priority')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        $technologies = Technology::all();
        return view('admin.product.create', compact('productCategories', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formField = $request->validate(
            [
                'product_name' => 'required|string|max:255',
                'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'product_type' => 'required|string|max:255',
                'product_category_id' => 'required',
                'product_technologies_id' => 'required',
                'product_short_description' => 'required|string|max:255',
                'product_description' => 'required',
                'product_started_at' => 'date|nullable',
                'product_ended_at' => 'date|nullable',
                'product_github_link' => 'nullable|url|max:255',
                'product_preview_link' => 'nullable|url|max:255'
            ],
            [
                'required' => ':attribute không được để trống',
                'string' => ':attribute phải là chuỗi',
                'max' => ':attribute không được vượt quá :max ký tự',
                'image' => ':attribute phải là hình ảnh',
                'mimes' => ':attribute phải có định dạng jpeg, png, jpg, gif, svg',
                'date' => ':attribute phải là ngày tháng',
                'url' => ':attribute phải là một liên kết hợp lệ.'
            ],
            [
                'product_name' => 'Tên sản phẩm',
                'product_type' => 'Loại sản phẩm',
                'product_image' => 'Hình ảnh sản phẩm',
                'product_category_id' => 'Danh mục sản phẩm',
                'product_technologies_id' => 'Công nghệ sản phẩm',
                'product_short_description' => 'Mô tả ngắn',
                'product_description' => 'Mô tả',
                'product_started_at' => 'Ngày bắt đầu',
                'product_ended_at' => 'Ngày kết thúc',
                'product_github_link' => 'Liên kết Github',
                'product_preview_link' => 'Liên kết Preview'
            ]
        );

        $product = new Product();
        $product->user_id = Auth::id();
        $product->name = $formField['product_name'];
        $product->type = $formField['product_type'];
        $product->short_description = $formField['product_short_description'];
        $product->description = $formField['product_description'];
        $product->project_started_at = $formField['product_started_at'];
        $product->project_ended_at = $formField['product_ended_at'];
        $product->product_category_id = $formField['product_category_id'];
        $product->status = 'draft';
        $product->github_link = $formField['product_github_link'];
        $product->preview_link = $formField['product_preview_link'];

        // Xử lý hình ảnh
        if ($request->hasFile('product_image')) {
            // Lấy hình ảnh
            $image = $request->file('product_image');
            // Lưu hình ảnh vào thư mục storage/app/public/products
            $imagePath = $image->store('products', 'public');
            // Lưu vào database
            $product->image_url = $imagePath;
        }
        $product->save();

        // Lưu công nghệ sản phẩm
        $product->technologies()->attach($formField['product_technologies_id']);

        return redirect()->back()->with('success', 'Thêm sản phẩm thành công');
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
        // lấy sản phẩm với danh mục và công nghệ
        $product = Product::with('category', 'technologies')->find($id);

        if ($product) {
            // Lấy danh mục sản phẩm và công nghệ
            $productCategories = ProductCategory::all();
            $technologies = Technology::all();

            return view('admin.product.edit', compact('product', 'productCategories', 'technologies'));
        }
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $formField = $request->validate(
            [
                'product_name' => 'required|string|max:255',
                'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'product_type' => 'required|string|max:255',
                'product_category_id' => 'required',
                'product_technologies_id' => 'required',
                'product_short_description' => 'required|string|max:255',
                'product_description' => 'required',
                'product_started_at' => 'date|nullable',
                'product_ended_at' => 'date|nullable',
                'product_status' => 'required',
                'product_github_link' => 'nullable|url|max:255',
                'product_preview_link' => 'nullable|url|max:255'
            ],
            [
                'required' => ':attribute không được để trống',
                'string' => ':attribute phải là chuỗi',
                'max' => ':attribute không được vượt quá :max ký tự',
                'image' => ':attribute phải là hình ảnh',
                'mimes' => ':attribute phải có định dạng jpeg, png, jpg, gif, svg',
                'date' => ':attribute phải là ngày tháng',
                'url' => ':attribute phải là một liên kết hợp lệ.',
            ],
            [
                'product_name' => 'Tên sản phẩm',
                'product_type' => 'Loại sản phẩm',
                'product_image' => 'Hình ảnh sản phẩm',
                'product_category_id' => 'Danh mục sản phẩm',
                'product_technologies_id' => 'Công nghệ sản phẩm',
                'product_short_description' => 'Mô tả ngắn',
                'product_description' => 'Mô tả',
                'product_started_at' => 'Ngày bắt đầu',
                'product_ended_at' => 'Ngày kết thúc',
                'product_status' => 'Trạng thái',
                'product_github_link' => 'Liên kết Github',
                'product_preview_link' => 'Liên kết Preview'
            ]
        );

        $product = Product::find($id);

        if ($product) {
            $product->user_id = Auth::id();
            $product->name = $formField['product_name'];
            $product->type = $formField['product_type'];
            $product->short_description = $formField['product_short_description'];
            $product->description = $formField['product_description'];
            $product->project_started_at = $formField['product_started_at'];
            $product->project_ended_at = $formField['product_ended_at'];
            $product->product_category_id = $formField['product_category_id'];
            $product->status = $formField['product_status'];
            $product->github_link = $formField['product_github_link'];
            $product->preview_link = $formField['product_preview_link'];

            // Xử lý hình ảnh
            if ($request->hasFile('product_image')) {
                // Xóa hình ảnh cũ
                if (!empty($product->image_url) && Storage::exists('public/' . $product->image_url)) {
                    Storage::delete('public/' . $product->image_url);
                }

                // Lấy hình ảnh
                $image = $request->file('product_image');
                // Lưu hình ảnh vào thư mục storage/app/public/products
                $imagePath = $image->store('products', 'public');
                // Lưu vào database
                $product->image_url = $imagePath;
            }
            $product->save();

            // Lưu công nghệ sản phẩm
            $product->technologies()->sync($formField['product_technologies_id']);

            return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công');
        }
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            // Xóa hình ảnh
            if (!empty($product->image_url) && Storage::exists('public/', $product->image_url)) {
                Storage::delete('public/', $product->image_url);
            }

            // Xóa dữ liệu
            $product->delete();

            return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
        }
        return redirect()->route('admin.products')->with('error', 'Sản phẩm không tồn tại');
    }

    public function upPriority($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->priority = $product->priority + 1;
            $product->save();
            return redirect()->back()->with('success', 'Tăng ưu tiên thành công');
        }
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
    }

    public function downPriority($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->priority = $product->priority - 1;
            $product->save();
            return redirect()->back()->with('success', 'Giảm ưu tiên thành công');
        }
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
    }

    public function resetPriority($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->priority = 0;
            $product->save();
            return redirect()->back()->with('success', 'Đặt lại ưu tiên thành công');
        }
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
    }
}
