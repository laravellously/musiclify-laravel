<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'name',
        'slug',
        'description',
        'icon_id',
        'image_id',
        'is_visible'
    ];

    /**
     * Get category icon
     *
     * @return object
     */
    public function icon()
    {
        return $this->belongsTo(FileManager::class, 'icon_id');
    }

    /**
     * Get category image
     *
     * @return object
     */
    public function image()
    {
        return $this->belongsTo(FileManager::class, 'image_id');
    }

    /**
     * Get subcategories
     *
     * @return object
     */
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'parent_id');
    }

    /**
     * Get gigs in this category
     *
     * @return object
     */
    public function gigs()
    {
        return $this->hasMany(Gig::class, 'category_id');
    }
}
