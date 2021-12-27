<?php

namespace Modules\CustomField\Lib\Mixins;

use Modules\CustomField\Models\ACF;

trait HasFields
{

    public function fields(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(ACF::class, 'model')
            ->orderBy('created_at');
    }

    public function saveFields($attributes)
    {
        foreach ($attributes as $value) {
            ACF::create([
                'field_name' => $value['field_name'],
                'input_type' => $value['field_input_type'],
                'default_value' => $value['field_default_value'],
                'is_required' => $value['is_required'],
                'is_added_to_filter' => $value['is_added_to_filter'],
                'multiple_options' => isset($value['multiple_options']) ? preg_replace(array('/\s*,/',  '/,\s*/'), array(',', ','), $value['multiple_options']) : null,
                'model_id' => $this->id,
                'model_type' => get_class($this),
            ]);
        }
    }

    public function updateFields($attributes)
    {
        $attributeIds  = [];
        foreach ($attributes as $value) {
            if(isset($value['id'])) {
                $deletedIds = ACF::find($value['id']);
                ACF::where('id', '=' , $value['id'])->update([
                    'field_name' => $value['field_name'],
                    'input_type' => $value['field_input_type'],
                    'default_value' => $value['field_default_value'],
                    'is_required' => $value['is_required'],
                    'is_added_to_filter' => $value['is_added_to_filter'],
                    'multiple_options' => isset($value['multiple_options']) ? preg_replace(array('/\s*,/',  '/,\s*/'), array(',', ','), $value['multiple_options']) : null,
                    'model_id' => $this->id,
                    'model_type' => get_class($this),
                ]);
            } else {
                $deletedIds =  ACF::create([
                    'field_name' => $value['field_name'],
                    'input_type' => $value['field_input_type'],
                    'default_value' => $value['field_default_value'],
                    'is_required' => $value['is_required'],
                    'is_added_to_filter' => $value['is_added_to_filter'],
                    'multiple_options' => isset($value['multiple_options']) ? preg_replace(array('/\s*,/',  '/,\s*/'), array(',', ','), $value['multiple_options']) : null,
                    'model_id' => $this->id,
                    'model_type' => get_class($this),
                ]);
            }

            $attributeIds[] = $deletedIds->id;
        }
        ACF::whereNotIn('id', $attributeIds)->where('model_id', $this->id)->delete();
    }

    public function removeFields()
    {
        ACF::where('model_id', $this->id)->delete();
    }

}
