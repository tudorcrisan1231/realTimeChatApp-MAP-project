<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->integer('role_id')->after('id')->default(0); // 0 = user, 1 = admin
            $table->string('username')->after('name')->nullable();
            $table->string('photo')->after('username')->nullable();
            $table->integer('banned')->after('remember_token')->default(0); // 0 = not banned, 1 = banned
            $table->softDeletes()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
