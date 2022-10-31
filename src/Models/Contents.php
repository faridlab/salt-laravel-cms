<?php

namespace SaltCMS\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Schema;

use SaltLaravel\Models\Resources;
use SaltFile\Traits\Fileable;
use SaltLaravel\Traits\ObservableModel;
use SaltLaravel\Traits\Uuids;
use SaltCMS\Traits\ContentSluggable;

use SaltCMS\Models\Categories;
use SaltCMS\Models\ContentCategories;
use SaltCMS\Models\Tags;
use SaltCMS\Models\ContentTags;

class Contents extends Resources {
    use Uuids;
    use ObservableModel;
    use Fileable;
    use ContentSluggable;

    protected $fileableFields = ['image', 'thumbnail', 'banner'];
    protected $fileableCascade = [
        'thumbnail' => true,
        'image' => true,
        'banner' => true
    ];
    protected $fileableDirs = [
        'thumbnail' => 'posts/thumbnail',
        'image' => 'posts/image',
        'banner' => 'posts/banner',
    ];

    protected $filters = [
        'default',
        'search',
        'fields',
        'relationship',
        'withtrashed',
        'orderby',
        // Fields table provinces
        'id',
        'title',
        'slug',
        'excerpt',
        'content',
        'type',
        'visibility',
        'publish_type',
        'publish_date',
    ];

    protected $rules = array(
        "title" => 'required|string',
        'slug' => 'nullable|string',
        "content" => 'required|string',
        'excerpt' => 'nullable|string',
        "type" => 'nullable|string',
        'visibility' => 'nullable|string',
        'publish_type' => 'nullable|string',
        'publish_date' => 'nullable|date_format:Y-m-d H:i:s',
    );

    protected $auths = array (
        // 'index',
        'store',
        // 'show',
        'update',
        'patch',
        'destroy',
        'trash',
        'trashed',
        'restore',
        'delete',
        'import',
        'export',
        'report'
    );

    protected $forms = array();
    protected $structures = array();
    protected $searchable = array(
        'title',
        'excerpt',
        'content',
        'type',
        'visibility',
        'publish_type',
        'publish_date',
    );

    protected $fillable = array(
        'title',
        'excerpt',
        'content',
        'type',
        'visibility',
        'publish_type',
        'publish_date',
    );

    public function image() {
        return $this->hasOne('SaltFile\Models\Files', 'foreign_id', 'id')
                    ->where('foreign_table', 'contents')
                    ->where('directory', 'posts/image');
    }

    public function banner() {
        return $this->hasOne('SaltFile\Models\Files', 'foreign_id', 'id')
                    ->where('foreign_table', 'contents')
                    ->where('directory', 'posts/banner');
    }

    public function thumbnail() {
        return $this->hasOne('SaltFile\Models\Files', 'foreign_id', 'id')
                    ->where('foreign_table', 'contents')
                    ->where('directory', 'posts/thumbnail');
    }

    public function categories() {
        return $this->belongsToMany(
                Categories::class,
                ContentCategories::class,
                'content_id',
                'category_id'
            )
            ->wherePivot('deleted_at', NULL);
    }

    public function tags() {
        return $this->belongsToMany(
                Tags::class,
                ContentTags::class,
                'content_id',
                'tag_id'
            )
            ->wherePivot('deleted_at', NULL);
    }

}
