<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Casts\SeoCast;

/**
 * Class Post
 * ideia-blog.yaml na raiz do projeto define a estrutura e os campos esperados para um post.
 * @property string $title           Título principal do post
 * @property string $slug            URL amigável única
 * @property string|null $excerpt    Resumo curto do post
 * @property string $content           Conteúdo completo do post
 * @property bool $is_draft          Define se o post é rascunho
 * @property string $language        Idioma do conteúdo (ex: pt-BR)
 * @property string $category_id     UUID da categoria relacionada
 * @property array $tags             Lista de tags do post
 * @property \Carbon\Carbon|null $published_at Data de publicação
 * @property \Carbon\Carbon|null $updated_at Data da última atualização
 * @property \Carbon\Carbon|null $deleted_at Data de exclusão (soft delete)
 * @property \App\ValueObjects\Seo|null $seo  Objeto de SEO customizado
 * @property int $views              Total de visualizações
 * @property int $reading_time       Tempo estimado de leitura (minutos)
 */
class Post extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'is_draft',
        'language',
        'category_id',
        'tags',
        'seo',
        'views',
        'reading_time',
    ];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'excerpt' => 'string',
        'content' => 'string',
        'is_draft' => 'boolean',
        'language' => 'string',
        'category_id' => 'string',
        'published_at' => 'datetime',
        'updated_at' => 'datetime',
        'tags' => 'array',
        'seo' => SeoCast::class,
        'views' => 'integer',
        'reading_time' => 'integer',
    ];
}