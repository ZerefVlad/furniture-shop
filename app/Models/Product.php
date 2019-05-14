<?php

namespace App\Models;

use App\Configurators\ProductIndexConfigurator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

/**
 * Class Product
 * @package App\Models
 * @property int $id
 * @property string $title
 * @property string $code
 * @property string $active
 * @property string $description
 * @property string $video_id
 * @property-read Discount $discount
 */
class Product extends Model
{
    use Searchable;

    const ATTRIBUTE_PRICE_NAME = 'price';


    protected $guarded = [
        'id'
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id');
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'code' => $this->code,
        ];
    }

    public function likes()
    {
        return $this->hasOne(Likes::class);
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

        return 0;
    }

    public function colors()
    {
        return $this->belongsToMany(ProductColor::class);
    }

    public function getPriceWithoutDiscount(): int
    {
        $attributes = $this->getProductAttributes();


        foreach ($attributes as $attribute) {
            if ($attribute->attribute->title = self::ATTRIBUTE_PRICE_NAME) {
                if (is_numeric($attribute->value)) {
                    return $attribute->value;
                }
            }
        }

        return 0;
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

    public function getAttributeById(int $id): ?string
    {
        return $this->productAttributes()->where('attributes.id', $id)->distinct()->first(['value'])
            ? $this->productAttributes()->where('attributes.id', $id)->distinct()->first(['value'])->value
            : null;
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment(array $data, ?User $user)
    {

        $comment = new Comment();
        $comment->text = $data['text'];
        $comment->rating = $data['rating'];
        $comment->product()->associate($this);
        if ($user) {
            $comment->user()->associate($user);
        }
        $comment->save();

        return $comment;
    }

    public function updateComment(array $data, ?User $user, Comment $comment)
    {

        $comment->text = $data['text'];
        $comment->rating = $data['rating'];
        $comment->product()->associate($this);
        if ($user) {
            $comment->user()->associate($user);
        }
        $comment->save();

        return $comment;
    }


    public function getAverageScore(): int
    {
        $rating = 0;
        foreach ($this->comments as $comment) {
            $rating += $comment->rating;
        }

        return count($this->comments) > 0 ? $rating / count($this->comments) : 0;
    }

    public function applyFilters(array $filters): bool
    {
        foreach ($filters as $key => $value) {
            $filter = Filter::find($key);
            $attribute = $this->getAttributeById($filter->attribute->id);
            if (!$attribute) {
                return false;
            }
            if ($filter->type === 'equal') {
                $check = false;
                foreach ($value as $valueEqual) {

                    if ($attribute === $valueEqual) {
                        $check = true;
                    }
                }
                if (!$check) {
                    return false;
                }
            } else {

                if ($attribute < $value['min'] || $attribute > $value['max']) {
                    return false;
                }
            }
        }

        return true;
    }
}
