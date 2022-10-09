<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->after('slug', function ($table) {
                $table->string('excerpt', 1024)->nullable();
                $table->enum('visibility', ['public', 'private'])->default('public');
                $table->enum('publish_type', ['immediately', 'scheduled'])->default('immediately');
                $table->dateTime('publish_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
