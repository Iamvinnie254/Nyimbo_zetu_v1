<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('first_name')->after('id');
        $table->string('last_name')->after('first_name');
        $table->string('image')->nullable();
        $table->string('phone_number')->nullable(); // nullable first
        $table->string('address')->nullable();
    });

    Schema::table('users', function (Blueprint $table) {
        $table->unique('phone_number'); // add unique after
    });
}


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Reverse changes
            $table->dropColumn([
                'first_name',
                'last_name',
                'image',
                'phone_number',
                'address'
            ]);

            $table->string('name');
        });
    }
};
