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
        Schema::create('keynotespeakers', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement(false)->primary();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('description');
            $table->string('website');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keynotespeakers');
    }

    public function destroy($id)
    {
        $keynotespeaker = Keynotespeakers::find($id);

        if (is_null($keynotespeaker)) {
            return response()->json(['message' => 'Keynotespeaker not found'], 404);
        }

        $keynotespeaker->delete();

        return response()->json(['message' => 'Keynotespeaker deleted successfully']);
    }
};
