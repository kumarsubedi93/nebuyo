<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{translate('Slider Information')}}</h3>
    </div>

    <!--Horizontal Form-->
    <!--===================================================-->
    <form class="form-horizontal" action="{{ route('sliders.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-3" for="url">{{translate('URL')}}</label>
                <div class="col-sm-9">
                    <input type="text" id="link" name="link" value=" {{ $slider->link ?? '' }} " placeholder="http://example.com/" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label">{{translate('Title')}}</label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control" type="text" name="title" value="{{ $slider->title ?? '' }}" placeholder="Enter Title">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label">{{translate('Sub-title')}}</label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control" type="text" name="subtitle" value="{{ $slider->subtitle ?? '' }}" placeholder="Enter Sub-title">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label">{{translate('Price')}}</label>
                </div>
                <div class="col-sm-9">
                    <input class="form-control" type="number" name="price" value="{{ $slider->price ?? '' }}" placeholder="Enter Price">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label">{{translate('Publish')}}</label>
                </div>
                <div class="col-sm-9">
                    <select name="status" class="form-control">
                        <option value="1" {{ $slider->published == '1' ? 'selected':'' }}>Active</option>
                        <option value="0" {{ $slider->published == '0' ? 'selected':'' }}>In-Active</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label">{{translate('Slider Images')}}</label>
                    <strong>(850px*315px)</strong>
                </div>
                <div class="col-sm-9">
                    <div></div>
                    <div id="photos"></div>
                    <div class="img-upload-preview">
                        <img loading="lazy"  src="{{ my_asset($slider->photo) }}" alt="" class="img-responsive">
                        <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <button class="btn btn-purple" type="submit">{{translate('Update')}}</button>
        </div>
    </form>
    <!--===================================================-->
    <!--End Horizontal Form-->

</div>

<script type="text/javascript">
    $('.remove-files').on('click', function(){
        $(this).parents(".img-upload-preview").remove();
    });
    $(document).ready(function(){
        $("#photos").spartanMultiImagePicker({
            fieldName:        'photos',
            maxCount:         1,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-9 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                alert('File size too big');
            }
        });
    });

</script>
