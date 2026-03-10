<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });

        Schema::table('food', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at');
        });



    }
};
