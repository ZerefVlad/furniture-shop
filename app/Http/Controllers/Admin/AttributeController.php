<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AttributeCreateRequest;
use App\Models\Attribute;
use App\Services\AttributeService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class AttributeController extends Controller
{
    /**
     * @var AttributeService
     */
    protected $attributeService;

    public function __construct(AttributeService $attributeService)
    {
        $this->attributeService = $attributeService;

    }

    public function index()
    {
        return view('admin.attribute.attribute_list', [
            'attributes' => $this->attributeService->getAttributes()
        ]);
    }

    public function createAttribute(AttributeCreateRequest $request)
    {
        $this->attributeService->createAttribute($request->all());
        Session::flash('category_create_success', 'Категория успешно создана');

        return back();
    }

    public function  AttributeActionCreate(Request $request)
    {
        $attributes = $this->attributeService->getAttributes();

        return view('admin.attribute.attribute_create')
            ->with('action', 'create')
            ->with('attribute', null)
            ->with('attributes', $attributes);
    }

    public function editAttribute($id, AttributeCreateRequest $request)
    {
        $this->attributeService->updateAttribute($id, $request->all());
        Session::flash('category_edit_success', 'Category успешно changed');

        return back();
    }

    public function  attributeActionUpdate($id, Request $request)
    {
        $attribute = $id ? $this->attributeService->getAttribute($id) : null;
        $attributes = $this->attributeService->getAttributes();

        return view('admin.attribute.attribute_create')
            ->with('action', 'edit')
            ->with('id', $id)
            ->with('attribute', $attribute)
            ->with('attributes', $attributes);
    }



    public function deleteAttribute($id)
    {
        $this->attributeService->deleteAttribute($id);

        Session::flash('category_delete_success', 'Category успешно deleted');

        return back();
    }

    public function getAttributes()
    {
        return response()->json($this->attributeService->getAttributes());
    }
}
