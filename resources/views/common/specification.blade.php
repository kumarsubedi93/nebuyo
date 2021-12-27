<div class="col-12 specification-section">
    <div class="ibox">
        <div class="ibox-title">
            <h5>Specification Info</h5>
            <a style="cursor: pointer" class="add-attribute-row btn btn-xs btn-primary pull-right"
               title="Add a new attribute column" data-increment="{{ isset($data['attributes']) ? count($data['attributes']) : 0 }}" id="add-attribute-row">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="ibox-content">
            <div class="hr-line-dashed"></div>
            <table class="table attribute_table">
                <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Input Type</th>
                    <th>Default Value</th>
                    <th>Is Required</th>
                    <th>Is Added To Filter</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="attribute-info">
                <tr class="specification-row" style="display: none">
                    <td>
                        <i class="fa fa-sort"></i>
                    </td>

                    <td>
                        {{ Form::text('', null , ['class' => 'form-control field-name', 'placeholder' =>'Field Name']) }}
                        @if($errors->has('field_name'))
                            <label class="has-error" for="field_name">{{ $errors->first('field_name') }}</label>
                        @endif
                        <span>
                         <code>Field Slug </code>
                          <small class="field-slug">N/A</small>
                        </span>
                    </td>

                    <td>
                        {{ Form::select('', \Modules\CustomField\Lib\CustomField::types() , $attributes['input_type'] ?? null , [
                            'class' => 'form-control custom-input-field-type', ]) }}
                        @if($errors->has('field_input_type'))
                            <label class="has-error"
                                   for="field_input_type">{{ $errors->first('field_input_type') }}</label>
                        @endif
                    </td>

                    <td>
                        <div class="field-multiple-options" style="display: none">
                            <input type="text" name="" class="form-control multiple-input"
                                   value="">
                                <label class="has-error"> Enter the options separated by commas (,) </label>
                                <br/>
                        </div>

                        {{ Form::text('', null , ['class' => 'form-control default-value', 'placeholder' => 'Default Value']) }}
                        @if($errors->has('field_default_value'))
                            <label class="has-error"
                                   for="field_default_value">{{ $errors->first('field_default_value') }}</label>
                        @endif
                    </td>

                    @php
                       $selectBoolean =  \Neputer\Foundation\Lib\BooleanFilter::$current;
                        @endphp
                    <td>
                        {{ Form::select('', $selectBoolean ,  null , ['class' => 'form-control is-require']) }}
                        @if($errors->has('is_required'))
                            <label class="has-error" for="is_required">{{ $errors->first('is_required') }}</label>
                        @endif
                    </td>

                    <td>
                        {{ Form::select('', $selectBoolean , null , ['class' => 'form-control is_added_to_filter']) }}
                        @if($errors->has('is_added_to_filter'))
                            <label class="has-error"
                                   for="is_added_to_filter">{{ $errors->first('is_added_to_filter') }}</label>
                        @endif
                    </td>

                    <td>
                        <a class="btn btn-danger remove-product-attribute" title="Delete">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>
                    </td>
                </tr>
                @if(isset($data['attributes']))
                    @foreach($data['attributes'] as $key => $attributes)
                        @include('common.specification-row', ['inc' => $key + 1])
                    @endforeach
                @else
                    <tr class="attribute-row">
                        <td colspan="7">
                            <p class="text-center">
                                <a class="add-attribute-row" href="#">
                                    <b>Add a new attribute row.</b>
                                </a>
                            </p>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
