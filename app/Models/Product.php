<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * Class Product
 * @package App\Models
 * @property int $id
 * @property string $title
 * @property string $code
 * @property string $active
 * @property string $description
 * @property-read Discount $discount
 */
class Product extends Model
{
    const ATTRIBUTE_PRICE_NAME = 'price';
    protected $fillable = [
        'title',
        'code',
        'active',
        'description',

    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id');
    }

    public function getCategoryIds(): array
    {
        $ids = [];
        foreach ($this->categories as $item) {
            $ids[] = $item->id;
        }

        return $ids;
    }

    public function getPriceWithDiscount(): int
    {
        $attributes = $this->getProductAttributes();

        $discount = $this->discount;

        foreach ($attributes as $attribute) {
            if ($attribute->attribute->title = self::ATTRIBUTE_PRICE_NAME) {
                if (is_numeric($attribute->value)) {
                    return $attribute->value - $attribute->value * ($discount ? $discount->value : 0) / 100;
                }
            }
        }
    }

    public function getMainProductUrl(): ?string
    {
        $img = $this->getImages()->first();
        if ($img) {
            return $img->url;
        }

        return null;
    }


    public function productAttributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes', 'product_id');
    }

    public function discount()
    {
        return $this->hasOne(Discount::class, 'product_id', 'id');
    }

    public function relatedProduct()
    {
        return $this->hasMany(RelatedProduct::class, 'main_product_id', 'id');
    }


    public function getImages(): Collection
    {
        return Image::where('model', __CLASS__)
            ->where('model_id', $this->id)->get();
    }

    public function getRelatedProducts(): Collection
    {
        return RelatedProduct::where('main_product_id', $this->id)->get();
    }

    public function addImage(array $data): void
    {
        Image::create([
            'model' => __CLASS__,
            'model_id' => $this->id,
            'title' => $data['title'],
            'alt' => $data['alt'],
            'url' => $data['url'],
        ]);
    }

    public function updateImage(array $data): void
    {
        $image = Image::find($data['id']);
        Storage::copy(
            'products/' . $data['code'] . '/' . $image->title . '.png',
            'products/' . $data['code'] . '/' . $data['title'] . '.png'
        );
        Storage::delete('products/' . $data['code'] . '/' . $image->title . '.png');
        $data = array_merge($data,
            [
                'url' => Storage::url('products/' . $data['code'] . '/' . $data['title'] . '.png'),
            ]);
        if ($image) {
            $image->update($data);
        } else {
            $this->addImage($data);
        }
    }

    public function deleteImage(int $imageId)
    {
        $image = Image::find($imageId);
        if ($image) {
            Storage::delete('products/' . $this->code . '/' . $image->title . '.png');
            $image->delete();
        }
    }

    public function updateAttribute(array $data): void
    {
        $attribute = ProductAttribute::where('product_id', $this->id)
            ->where('attribute_id', $data['id'])->first();

        if ($attribute) {
            $attribute->update([
                'value' => $data['value'],
            ]);
        }
    }

    public function getProductAttributes(): Collection
    {
        return ProductAttribute::with('attribute')->where('product_id', $this->id)->get();
    }

    public function deleteAttribute(int $attrId)
    {
        $attribute = ProductAttribute::where('product_id', $this->id)
            ->where('attribute_id', $attrId)->first();
        if ($attribute) {
            $attribute->delete();
        }
    }

    public function updateRelateProduct(array $data): void
    {
        $relateProduct = RelatedProduct::where('main_product_id', $this->id)
            ->where('related_product_id', $data['related_product_id'])->first();

        if ($relateProduct) {
            $relateProduct->update([
                'discount' => $data['discount'],
                'quantity' => $data['quantity'],
            ]);
        }
    }

    public function deleteRelateProduct(array $data)
    {
        $relateProduct = RelatedProduct::where('main_product_id', $this->id)
            ->where('related_product_id', $data['related_product_id'])->first();
        if ($relateProduct) {
            $relateProduct->delete();
        }
    }

    public function getRouteKeyName()
    {
        return 'title';
    }
}
