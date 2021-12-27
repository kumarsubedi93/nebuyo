<?php

namespace Modules\CustomField\Lib;

final class CustomField
{

    const TEXT = 0;
    const SELECT = 1;

    public static function types(): array
    {
        return [
            'Text', 'Select',
        ];
    }

    public static function multipleChoiceFieldsIndexes(): array
    {
        return [
            3, 4, 5,
        ];
    }

}
