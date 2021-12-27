<div class="panel" id="product-specification" style="display: none">
    <div class="panel-heading bord-btm">
        <h3 class="panel-title">{{ translate('Specification') }}</h3>
    </div>
    <div class="panel-body category_attribute">
        @if(isset($data['attributes']))
            @foreach ($data['attributes'] as $index => $attribute)
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-form-label is_required">{{ $attribute->field_name }}</label>
                    @if($attribute->input_type == \Modules\CustomField\Lib\CustomField::SELECT )
                        @if($attribute->multiple_options)
                            <select class="form-control" name="multiple_option[{{$attribute->id}}]">
                                @foreach(explode(',', $attribute->multiple_options ) as $key => $value)
                                    @if(isset($data['values'][$index]))
                                        <option value="{{ $value }}" @if(optional($data['values'][$index])->value == $value)) selected @endif>{{ $value }}</option>
                                    @else
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                    @else
                        @if(isset($data['values'][$index]))
                            {{ Form::text('multiple_option['. $attribute->id .']',  optional($data['values'][$index])->value ?? optional($attribute)->default_value ?? null , ['class' => 'form-control']) }}
                        @else
                            {{ Form::text('multiple_option['. $attribute->id .']', $attribute->default_value ?? null , ['class' => 'form-control']) }}
                        @endif
                    @endif
                </div>
            @endforeach
        @endif
    </div>
</div>
