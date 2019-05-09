<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Image;
use App\Models\ImageModel;
use App\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    protected $category_service;

    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
        $this->middleware('auth');
    }

    public function index ()
    {
        $categories = $this->category_service->getCategories();

        return view('admin.category.category_list')
            ->with('categories', $categories);
    }

    public function createCategory(CreateCategoryRequest $request)
    {
        $request->file('image')->storeAs('categories/'.$request->title,$request->image_title.'.png');

        $this->category_service->createCategory($request->all());
        Session::flash('category_create_success', 'Категория успешно создана');

        return back();
    }

    public function  CategoryActionCreate(Request $request)
    {
        $categories = $this->category_service->getCategories();

        return view('admin.category.category_create')
            ->with('action', 'create')
            ->with('category', null)
            ->with('image', null)
            ->with('categories', $categories);
    }

    public function editCategory(Category $category, CreateCategoryRequest $request)
    {
        if ($image = $request->has('image')) {
            $request->file('image')->storeAs('categories/'.$request->title, $request->image_title.'.png');
        }

        $this->category_service->editCategory(
            $category,
            $request->all()
        );
        Session::flash('category_edit_success', 'Category успешно changed');

        return redirect()->route('category_action_edit', ['category' => $category]);
    }

    public function  categoryActionEdit(Category $category, Request $request)
    {
        $categories = $this->category_service->getCategories();

        $image = $category->getImage();

        return view('admin.category.category_create')
            ->with('action', 'edit')
            ->with('image', $image)
            ->with('category', $category)
            ->with('categories', $categories);
    }



    public function deleteCategory(Category $category)
    {
        $category->delete();
        Session::flash('category_delete_success', 'Category успешно deleted');

        return back();
    }

    public function deletePicture(Category $category)
    {
        $category->deleteImage();
        return back();
    }
}
