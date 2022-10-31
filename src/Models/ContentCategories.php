<?php

namespace SaltCMS\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Schema;
use SaltLaravel\Models\Resources;
use SaltLaravel\Traits\ObservableModel;
use SaltLaravel\Traits\Uuids;

class ContentCategories extends Resources {
    protected $table = 'content_categories';

    use Uuids;
    use ObservableModel;
    protected $filters = [
        'default',
        'search',
        'fields',
        'relationship',
        'withtrashed',
        'orderby',
        // Fields table
        'id',
        'content_id',
        'category_id',
    ];

    protected $rules = array(
        'content_id' => 'required|string',
        'category_id' => 'required|string',
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
    protected $fillable = array(
        'content_id',
        'category_id',
    );

    protected $searchable = array(
        'content_id',
        'category_id',
    );

}
