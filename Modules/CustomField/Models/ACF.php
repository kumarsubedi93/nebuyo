<?php

namespace Modules\CustomField\Models;


use Illuminate\Database\Eloquent\Model;

final class ACF extends Model
{

    protected $table = 'advanced_custom_fields';

    protected $fillable = [
        'field_name',
        'input_type',
        'is_required',
        'is_filter',
        'multiple_options',
        'default_value',
        'model_id',
        'model_type',
    ];

//    protected $casts = [
//        'multiple_options' => 'array',
//    ];

    public function setFieldNameAttribute($value)
    {
        $this->attributes['field_name'] = strtolower(str_replace(' ', '_', $value));
    }

    public function getDisplayName()
    {
        return ucwords(str_replace('_', ' ', $this->field_name ?? 'N/A'));
    }

    public function model(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function values(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ACFValue::class, 'advanced_custom_field_id');
    }

}
