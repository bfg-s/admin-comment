<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->float('rating')->default(0);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->text('comment');
            /** @var \Illuminate\Database\Eloquent\Model $userModel */
            $userModel = new (config('auth.providers.users.model'));
            $table->foreignId(\Illuminate\Support\Str::singular($userModel->getTable()) . '_id')
                ->nullable()
                ->constrained($userModel->getTable());
            $table->morphs('commentable');
            $table->boolean('active')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
