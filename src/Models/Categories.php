<?php

namespace SaltCMS\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Schema;
use SaltLaravel\Traits\ObservableModel;
use SaltLaravel\Traits\Uuids;

class Categories extends Resources {
    protected $table = 'sysparams';

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
        'group',
        'key',
        'value',
        'data',
        'order',
        'status',
    ];

    protected $attributes = array(
        'group' => 'post_category'
    );

    protected $rules = array(
        // 'group' => 'required|string|in:post_category',
        'group' => 'nullable|string',
        'key' => 'required|string', // TODO: create sluggable observer or service itself
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
