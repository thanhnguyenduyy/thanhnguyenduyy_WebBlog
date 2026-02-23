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
        // No schema changes needed as site_settings is key-value based
        // We will seed the new profile keys in a separate seeder or directly here
        \DB::table('site_settings')->insertOrIgnore([
            ['key' => 'display_name', 'value' => 'Nguyễn Duy Thanh', 'type' => 'text', 'group' => 'Profile', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'primary_slogan', 'value' => 'Crafting Digital Experiences & Capturing Light', 'type' => 'text', 'group' => 'Profile', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'short_bio', 'value' => 'I am a multidisciplinary creator sitting at the intersection of technology and art.', 'type' => 'textarea', 'group' => 'Profile', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        \DB::table('site_settings')->whereIn('key', ['display_name', 'primary_slogan', 'short_bio'])->delete();
    }
};
