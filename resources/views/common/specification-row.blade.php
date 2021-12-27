<tr class="tr-{{ $inc }}" data-index="{{ $inc }}">
    <td>
        <i class="fa fa-sort"></i>
    </td>

    <td>
        {{ Form::text('attribute_field['. $inc .'][field_name]', $attributes['field_name'] ?? null , ['class' => 'form-control field-name', 'required', 'placeholder' =>'Field Name']) }}
        @if($errors->has('field_name'))
            <label class="has-error" for="field_name">{{ $errors->first('field_name') }}</label>
        @endif
        <span>
            <code>Field Slug </code>
            <small class="field-slug">{{ str_replace(' ', '_', $attributes['field_name']) }}</small>
        </span>
    </td>

    <td>
        {{ Form::select('attribute_field['. $inc .'][field_input_type]', \Modules\CustomField\Lib\CustomField::types() , $attributes['input_type'] ?? null , [
                            'class' => 'form-control custom-input-field-type', ]) }}
        @if($errors->has('field_input_type'))
            <label class="has-error"
                   for="field_input_type">{{ $errors->first('field_input_type') }}</label>
        @endif
    </td>

    <td>
        <div class="field-multiple-options" style="display: none">
            <input type="text" name="attribute_field[{{ $inc }}][multiple_options]" class="form-control multiple-input"
                   value="">
            <label class="has-error"> Enter the options separated by commas (,) </label>
            <br/>
        </div>
        <div class="field-multiple-options">
            @if($attributes['input_type'] === \Modules\CustomField\Lib\CustomField::SELECT)
                {{ Form::text('attribute_field['. $inc .'][multiple_options]', $attributes['multiple_options'] ?? null , ['class' => 'form-control',]) }}
                <label class="has-error"> Enter the options separated by commas (,) </label>
                <br/>
            @endif
        </div>

        {{ Form::text('attribute_field['. $inc .'][field_default_value]', $attributes['default_value'] ?? null , ['class' => 'form-control', 'placeholder' => 'Default Value']) }}
        @if($errors->has('field_default_value'))
            <label class="has-error"
                   for="field_default_value">{{ $errors->first('field_default_value') }}</label>
        @endif
    </td>

    <td>
        {{ Form::select('attribute_field['. $inc .'][is_required]', \Neputer\Foundation\Lib\BooleanFilter::$checkValue , $attributes['is_required'] ?? null , ['class' => 'form-control']) }}
        @if($errors->has('is_required'))
            <label class="has-error" for="is_required">{{ $errors->first('is_required') }}</label>
        @endif
    </td>

    <td>
        {{ Form::select('attribute_field['. $inc .'][is_added_to_filter]', \Neputer\Foundation\Lib\BooleanFilter::$checkValue , $attributes['is_added_to_filter'] ?? null , ['class' => 'form-control']) }}
        @if($errors->has('is_added_to_filter'))
            <label class="has-error" for="is_added_to_filter">{{ $errors->first('is_added_to_filter') }}</label>
        @endif
    </td>

    @if(isset($attributes['id']))
        {{ Form::hidden('attribute_field['. $inc .'][id]', $attributes['id'] ) }}
    @endif

    <td>
        <a class="btn btn-danger remove-product-attribute" title="Delete">
            <i class="glyphicon glyphicon-remove"></i>
        </a>
    </td>
</tr>
