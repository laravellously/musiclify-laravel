<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'title',
        'slug',
        'content',
        'image_id',
        'reading_time'
    ];

    /**
     * Get article image
     *
     * @return object
     */
    public function image()
    {
        return $this->belongsTo(FileManager::class, 'image_id');
    }


    /**
     * Get article comments
     *
     * @return object
     */
    public function comments()
    {
        return $this->hasMany(ArticleComment::class, 'article_id');
    }


    /**
     * Get article seo
     *
     * @return object
     */
    public function seo()
    {
        return $this->hasOne(ArticleSeo::class, 'article_id');
    }
}
