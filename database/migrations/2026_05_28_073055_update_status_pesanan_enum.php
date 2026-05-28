
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE pesanan
            MODIFY status_pesanan
            ENUM(
                'pending',
                'diproses',
                'dikirim',
                'selesai',
                'dibatalkan'
            ) NOT NULL
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE pesanan
            MODIFY status_pesanan
            ENUM(
                'diproses',
                'dikirim',
                'selesai',
                'dibatalkan'
            ) NOT NULL
        ");
    }
};