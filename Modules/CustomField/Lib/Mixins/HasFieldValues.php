<?php

namespace Modules\CustomField\Lib\Mixins;

use Modules\CustomField\Models\ACF;
use Modules\CustomField\Models\ACFValue;

trait HasFieldValues
{
    public function fieldValues()
    {
        return $this->morphMany(ACFValue::class, 'model');
    }

    public function saveCustomFields($fields)
    {
        foreach ($fields as $key => $value) {
            $acf = ACF::find((int) $key);

            if (!$acf) {
                continue;
            }

            ACFValue::updateOrCreate([
                'advanced_custom_field_id' => $acf->id,
                'model_id'      => $this->id,
                'model_type'    => get_class($this),
            ], [ 'value'        => $value, ]);
        }
    }

    public function updateCustomFields($fields)
    {
        $attributeIds  = [];
        foreach ($fields as $key => $value) {
            $deletedIds = ACF::find((int)$key);

            if (!$deletedIds) {
                continue;
            }

            $deletedIds = ACFValue::updateOrCreate([
                'advanced_custom_field_id' => $deletedIds->id,
                'model_id' => $this->id,
                'model_type' => get_class($this),
            ], ['value' => $value ]);

            $attributeIds[] = $deletedIds->id;
        }
        ACFValue::whereNotIn('id', $attributeIds)->where('model_id', $this->id)->delete();
    }

    public function scopeWhereField($query, ACF $field, $value)
    {
        $query->whereHas('fieldValues', function ($subQuery) use ($field, $value) {
            $subQuery
                ->where('advanced_custom_field_id', $field->id)
                ->hasValue($value);
        });
    }
}
