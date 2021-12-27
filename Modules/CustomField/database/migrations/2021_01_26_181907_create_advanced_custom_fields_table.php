<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvancedCustomFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advanced_custom_fields', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('model_id');
            $table->string('model_type');

            $table->string('field_name');
            $table->tinyInteger('input_type')
                ->default(false)
                ->comment('0: Text, 1: Textarea, 2: Integer, 3: Select, 4: Radio, 5: Checkbox');

            $table->boolean('is_required')->default(false);
            $table->boolean('is_added_to_filter')->default(true);

            $table->text('multiple_options')
                ->nullable()
                ->comment('Multiple options only for selected input type');

            $table->string('default_value')->nullable();

            $table->timestamps();
        });

        Schema::create('advanced_custom_field_values', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('advanced_custom_field_id');

            $table->unsignedBigInteger('model_id');
            $table->string('model_type');

            $table->longText('value')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advanced_custom_fields');
        Schema::dropIfExists('advanced_custom_field_values');
    }
}
