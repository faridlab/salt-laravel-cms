<?php

namespace SaltCMS\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;
use SaltLaravel\Models\Resources;
use Illuminate\Support\Facades\Schema;
use SaltLaravel\Traits\ObservableModel;
use SaltLaravel\Traits\Uuids;
use SaltCMS\Traits\KeySluggable;

class Tags extends Resources {
    protected $table = 'sysparams';

    use Uuids;
    use ObservableModel;
    use KeySluggable;
    protected $filters = [
        'default',
        'search',
        'fields',
        'relationship',
        'withtrashed',
        'orderby',
        // Fields table
        'id',
        'group',
        'key',
        'value',
        'data',
        'order',
        'status',
    ];

    protected $attributes = array(
        'group' => 'post_tag'
    );

    protected $rules = array(
        // 'group' => 'required|string|in:post_tag',
        'group' => 'nullable|string',
        'key' => 'nullable|string', // TODO: create sluggable observer or service itself
        'value' => 'required|string',
        'data' => 'nullable|array',
        'order' => 'nullable|integer',
        'status' => 'nullable|string',
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
        'group',
        'key',
        'value',
        'data',
        'order',
        'status',
    );

    protected $searchable = array(
        'group',
        'key',
        'value',
        'data',
        'order',
        'status',
    );

}
