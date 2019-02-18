<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08.02.19
 * Time: 17:16
 */

namespace App\Services;
use App\Models\Attribute;



class AttributeService
{
    public function getAttributes(){
        return Attribute::all();
    }

    public function getAttribute(int $id): Attribute
    {
        return Attribute::find($id);
    }

    public function createAttribute(array $data): void
    {
        Attribute::create($data);
    }

    public function updateAttribute(int $id, array $data)
    {
        $attribute = Attribute::find($id);
        $attribute->update($data);
    }

    public function deleteAttribute(int $id): void
    {
        $attribute = Attribute::find($id);
        $attribute->delete();
    }
}