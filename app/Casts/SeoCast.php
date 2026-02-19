<?php
namespace App\Casts;

use App\ValueObjects\Seo;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class SeoCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): Seo
    {
        $data = json_decode($value, true);

        return new Seo(
            $data['title'] ?? '',
            $data['description'] ?? '',
            $data['image'] ?? '',
            $data['canonical'] ?? ''
        );
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): string
    {
        return json_encode([
            'title' => $value->title,
            'description' => $value->description,
            'image' => $value->image,
            'canonical' => $value->canonical,
        ]);
    }
}
