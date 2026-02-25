<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Casts\SeoCast;

/**
 * Class Post
 *
 * ideia-blog.yaml na raiz do projeto define a estrutura e os campos esperados.
 * Representa a entidade raiz do artigo (independente de idioma).
 *
 * @property string $id                    UUID único do post
 * @property string $status                Status global: draft | public | private
 * @property string $category_id           UUID da categoria relacionada
 * @property array $tags                   Lista de tags associadas ao post
 * @property int $views                    Total de visualizações
 * @property int $reading_time             Tempo estimado de leitura (minutos)
 * @property \Carbon\Carbon|null $published_at Data oficial de publicação
 * @property \Carbon\Carbon|null $updated_at   Data da última atualização
 * @property \Carbon\Carbon|null $deleted_at   Data de exclusão (soft delete)
 *
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\PostContent[] $postContents conteudos relacionados (1:N)
 */
class Post extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'status',
        'category_id',
        'tags',
        'postContents',
    ];

    protected $casts = [
        'status' => PostStatus::class,
        'category_id' => 'integer',
        'tags' => 'array', // array de strings?
        'views' => 'integer',
        'reading_time' => 'integer',
        'published_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'postContents' => 'array', // ou criar uma relação Eloquent? (hasMany)
    ];

    // public function postContents()
    // {
    //     return $this->hasMany(PostContent::class);
    // }

    // public function translation(string $locale)
    // {
    //     return $this->hasOne(PostContent::class)
    //         ->where('language', $locale);
    // }
}