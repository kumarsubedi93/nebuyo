@if($data['attributes']->isNotEmpty())

    @foreach ($data['attributes'] as $index => $attribute)
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <label class="col-form-label is_required">{{ $attribute->field_name }}</label>

            @if($attribute->input_type == \Modules\CustomField\Lib\CustomField::SELECT )
                @if($attribute->multiple_options)
                    <select class="form-control" name="multiple_option[{{$attribute->id}}]">
                        @php
                              $removedComma = explode(',', $attribute->multiple_options );
                             $multipleOptions = array_map('trim', $removedComma);
                            @endphp

                        @foreach($multipleOptions as $key => $value)
                            @if(isset($attribute['default_value']))
                                <option value="{{ $value }}"
                                        @if(optional($attribute)->default_value == $value) selected @endif
                                >{{ $value }}
                                </option>
                            @else
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                @endif
            @endif

            @if($attribute->input_type == \Modules\CustomField\Lib\CustomField::TEXT)
                {{ Form::text('multiple_option['. $attribute->id .']', optional($attribute)->default_value ?? null , ['class' => 'form-control']) }}
            @endif
        </div>
    @endforeach

@endif
