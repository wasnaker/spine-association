<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('association_staffs', function (Blueprint $table) {
            $table->id();

            // Profil staff terhubung 1:1 ke user login (realname/jabatan di sini).
            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();

            // Asosiasi tempat staff bekerja.
            $table->foreignId('association_id')
                ->constrained('associations')
                ->cascadeOnDelete();

            $table->string('realname');      // nama asli untuk optionlist/dropdown
            $table->string('jabatan', 150)->nullable();
            $table->string('phone', 30)->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('association_staffs');
    }
};