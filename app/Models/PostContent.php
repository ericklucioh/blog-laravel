<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Class PostContent
 *
 * Representa o conteúdo do post em um idioma específico.
 *
 * @property string $id                    UUID único da tradução
 * @property string $post_id               UUID do Post relacionado
 * @property string $language              Código do idioma (ex: pt-BR, en-US)
 * @property string $title                 Título do post no idioma
 * @property string $slug                  URL amigável única por idioma
 * @property string|null $excerpt          Resumo curto no idioma
 * @property string $content               Conteúdo completo (Markdown ou HTML)
 * @property \App\ValueObjects\Seo|null $seo Objeto de SEO específico do idioma
 * @property \Carbon\Carbon|null $created_at Data de criação
 * @property \Carbon\Carbon|null $updated_at Data da última atualização
 *
 * @property \App\Models\Post $post
 */
class PostContent extends Model
{
    use HasUuids;

    protected $fillable = [
        'post_id',
        'language',
        'title',
        'slug',
        'excerpt',
        'content',
        'seo',
    ];

    protected $casts = [
        'post_id' => 'string',
        'language' => 'string',
        'title' => 'string',
        'slug' => 'string',
        'excerpt' => 'string',
        'content' => 'string',
        'language' => 'string',
        'seo' => SeoCast::class,
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}