<?php
use Illuminate\Support\Facades\Schema; use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateSystemsTable extends Migration { public function up() { Schema::create('systems', function (Blueprint $spaf336a) { $spaf336a->increments('id'); $spaf336a->string('name', 100)->unique(); $spaf336a->longText('value')->nullable(); $spaf336a->timestamps(); }); } public function down() { Schema::dropIfExists('systems'); } }