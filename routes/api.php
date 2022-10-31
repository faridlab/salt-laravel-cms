<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use SaltCMS\Controllers\ApiNestedResourcesController;

use SaltCMS\Controllers\ContentsResourcesController;
use SaltCMS\Controllers\CategoriesResourcesController;
use SaltCMS\Controllers\TagsResourcesController;

$version = config('app.API_VERSION', 'v1');

Route::middleware(['api', 'auth:api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: CATEGORIES RESOURCES
    Route::get("contents/categories", [CategoriesResourcesController::class, 'index']); // get entire collection
    Route::post("contents/categories", [CategoriesResourcesController::class, 'store']); // create new collection

    Route::get("contents/categories/trash", [CategoriesResourcesController::class, 'trash']); // trash of collection

    Route::post("contents/categories/import", [CategoriesResourcesController::class, 'import']); // import collection from external
    Route::post("contents/categories/export", [CategoriesResourcesController::class, 'export']); // export entire collection
    Route::get("contents/categories/report", [CategoriesResourcesController::class, 'report']); // report collection

    Route::get("contents/categories/{id}/trashed", [CategoriesResourcesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("contents/categories/{id}/restore", [CategoriesResourcesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("contents/categories/{id}/delete", [CategoriesResourcesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+'); // hard delete collection by ID

    Route::get("contents/categories/{id}", [CategoriesResourcesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID
    Route::put("contents/categories/{id}", [CategoriesResourcesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+'); // update collection by ID
    Route::patch("contents/categories/{id}", [CategoriesResourcesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+'); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("contents/categories/{id}", [CategoriesResourcesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+'); // soft delete a collection by ID


    // API: TAGS RESOURCES
    Route::get("contents/tags", [TagsResourcesController::class, 'index']); // get entire collection
    Route::post("contents/tags", [TagsResourcesController::class, 'store']); // create new collection

    Route::get("contents/tags/trash", [TagsResourcesController::class, 'trash']); // trash of collection

    Route::post("contents/tags/import", [TagsResourcesController::class, 'import']); // import collection from external
    Route::post("contents/tags/export", [TagsResourcesController::class, 'export']); // export entire collection
    Route::get("contents/tags/report", [TagsResourcesController::class, 'report']); // report collection

    Route::get("contents/tags/{id}/trashed", [TagsResourcesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("contents/tags/{id}/restore", [TagsResourcesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("contents/tags/{id}/delete", [TagsResourcesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+'); // hard delete collection by ID

    Route::get("contents/tags/{id}", [TagsResourcesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID
    Route::put("contents/tags/{id}", [TagsResourcesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+'); // update collection by ID
    Route::patch("contents/tags/{id}", [TagsResourcesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+'); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("contents/tags/{id}", [TagsResourcesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+'); // soft delete a collection by ID


    // API: CONTENTS RESOURCES
    Route::get("contents", [ContentsResourcesController::class, 'index']); // get entire collection
    Route::post("contents", [ContentsResourcesController::class, 'store']); // create new collection

    Route::get("contents/trash", [ContentsResourcesController::class, 'trash']); // trash of collection

    Route::post("contents/import", [ContentsResourcesController::class, 'import']); // import collection from external
    Route::post("contents/export", [ContentsResourcesController::class, 'export']); // export entire collection
    Route::get("contents/report", [ContentsResourcesController::class, 'report']); // report collection

    Route::get("contents/{id}/trashed", [ContentsResourcesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("contents/{id}/restore", [ContentsResourcesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("contents/{id}/delete", [ContentsResourcesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+'); // hard delete collection by ID

    Route::get("contents/{id}", [ContentsResourcesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID
    Route::put("contents/{id}", [ContentsResourcesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+'); // update collection by ID
    Route::patch("contents/{id}", [ContentsResourcesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+'); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("contents/{id}", [ContentsResourcesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+'); // soft delete a collection by ID

    Route::post("contents/{id}/categories", [ContentsResourcesController::class, 'storeCategories'])->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID
    Route::delete("contents/{content_id}/categories/{id}", [ContentsResourcesController::class, 'destroyCategory'])->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    Route::post("contents/{id}/tags", [ContentsResourcesController::class, 'storeTags'])->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID
    Route::delete("contents/{content_id}/tags/{id}", [ContentsResourcesController::class, 'destroyTag'])->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // FIXME: nested routes need to be tested further
    // Route::resource('contents.categories', ApiNestedResourcesController::class);
    // Route::resource('contents.tags', ApiNestedResourcesController::class);

});
