<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('associations', 'address')) {
            Schema::table('associations', function (Blueprint $table) {
                $table->string('address', 1024)->nullable()->after('name');
            });
        }
    }

    public function down(): void
    {
        Schema::table('associations', function (Blueprint $table) {
            $table->dropColumn('address');
        });
    }
};
