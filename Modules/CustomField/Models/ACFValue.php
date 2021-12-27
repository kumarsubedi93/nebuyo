<?php

namespace Modules\CustomField\Models;

use Illuminate\Database\Eloquent\Model;

final class ACFValue extends Model
{

    protected $table = 'advanced_custom_field_values';

    protected $fillable = [
        'model_id',
        'model_type',
        'advanced_custom_field_id',
        'value',
    ];

    public function model(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function field(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ACF::class, 'advanced_custom_field_id');
    }

}
