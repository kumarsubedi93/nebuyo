<?php

namespace Modules\CustomField\Services;

use Neputer\Foundation\Lib\Status;
use \App\Models\Category;
use Modules\CustomField\Models\ACF;

final class FieldService
{

    protected $model;

    public function __construct(ACF $ACF)
    {
        $this->model = $ACF;
    }

    public function byCategory($categoryId, $modelType)
    {
        return $this->model
            ->select('multiple_options', 'field_name', 'default_value', 'input_type', 'id')
            ->where('model_id', $categoryId)
            ->where('model_type', $modelType)
            ->get();
    }

}
