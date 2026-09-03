<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('associations', function (Blueprint $table) {
            $table->id();
            $table->string('ulid', 26)->nullable()->unique();
            $table->string('code', 64)->unique();
            $table->string('name', 190);
            $table->foreignId('province_id')->constrained('provinces')->unique();
            $table->foreignId('regency_id')->nullable()->constrained('regencies');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('admin_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('associations');
    }
};
