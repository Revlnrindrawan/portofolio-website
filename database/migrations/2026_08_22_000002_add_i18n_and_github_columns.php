<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('github')->nullable()->after('linkedin');
            $table->string('title_id')->nullable()->after('title');
            $table->text('bio_id')->nullable()->after('bio');
        });

        Schema::table('work_experiences', function (Blueprint $table) {
            $table->string('position_id')->nullable()->after('position');
            $table->json('responsibilities_id')->nullable()->after('responsibilities');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('title_id')->nullable()->after('title');
            $table->string('role_id')->nullable()->after('role');
            $table->json('description_id')->nullable()->after('description');
        });

        Schema::table('certifications', function (Blueprint $table) {
            $table->text('description_id')->nullable()->after('description');
        });

        Schema::table('skills', function (Blueprint $table) {
            $table->string('name_id')->nullable()->after('name');
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['github', 'title_id', 'bio_id']);
        });

        Schema::table('work_experiences', function (Blueprint $table) {
            $table->dropColumn(['position_id', 'responsibilities_id']);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['title_id', 'role_id', 'description_id']);
        });

        Schema::table('certifications', function (Blueprint $table) {
            $table->dropColumn(['description_id']);
        });

        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn(['name_id']);
        });
    }
};
