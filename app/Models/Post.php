<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\HasTags;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;

    use HasTags;
    use HasUlids;
    use InteractsWithMedia;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'blog_posts';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'blog_author_id',
        'blog_category_id',
        'title',
        'slug',
        'content',
        'published_at',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'date',
        ];
    }

    /** @return BelongsTo<Author, $this> */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'blog_author_id');
    }

    /** @return BelongsTo<Category, $this> */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'blog_category_id');
    }

    public function getContentPreviewAttribute(): string
    {
        return $this->getContentPreview();
    }

    public function getContentPreview(int $words = 30): string
    {
        return Str::words(strip_tags($this->content), $words);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('blog-images')
            ->acceptsMimeTypes(['image/jpeg'])
            ->singleFile()
            ->useDisk('blog-images')
            ->withResponsiveImages()
            ->registerMediaConversions(function (?Media $media): void {
                $this->addMediaConversion('thumb')
                    ->width(60)
                    ->height(60);
            });
    }
}
