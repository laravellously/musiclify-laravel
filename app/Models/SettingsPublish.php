<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsPublish extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings_publish';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'auto_approve_gigs',
        'auto_approve_portfolio',
        'max_tags',
        'is_video_enabled',
        'is_documents_enabled',
        'max_document_size',
        'max_images',
        'max_image_size',
        'max_documents'
    ];
}
