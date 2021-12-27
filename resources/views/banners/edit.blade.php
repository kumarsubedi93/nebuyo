<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{translate('Banner Information')}}</h3>
    </div>

    <!--Horizontal Form-->
    <!--===================================================-->
    <form class="form-horizontal" action="{{ route('home_banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-3" for="url">{{translate('URL')}}</label>
                <div class="col-sm-9">
                    <input type="text" placeholder="{{translate('URL')}}" id="url" name="url" value="{{ $banner->url ?? '' }}" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label">{{translate('title')}}</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" placeholder="Enter Text" value="{{ $banner->title ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label">{{translate('Sub-title')}}</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="subtitle" class="form-control" placeholder="Enter Sub-title" value="{{ $banner->subtitle ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label">{{translate('Price')}}</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="price" class="form-control" placeholder="Enter Price" value="{{ $banner->price ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label">{{translate('Button Name')}}</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="button" class="form-control" placeholder="Shop Now" value="{{ $banner->button ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label">{{translate('Button Link')}}</label>
                </div>
                <div class="col-sm-9">
                    <input type="url" name="link" class="form-control" placeholder="https://example.com" value="{{ $banner->link ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label">{{translate('Banner Images')}}</label>
                    <strong>({{ translate('850px*420px') }})</strong>
                </div>
                <div class="col-sm-9">
                    @if ($banner->photo != null)
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="img-upload-preview">
                                <img loading="lazy"  src="{{ my_asset($banner->photo) }}" alt="" class="img-responsive">
                                <input type="hidden" name="previous_photo" value="{{ $banner->photo }}">
                                <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    @endif
                    <div id="photo">

                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
        </div>
    </form>
    <!--===================================================-->
    <!--End Horizontal Form-->

</div>

<script type="text/javascript">

    $(document).ready(function(){

        $('.remove-files').on('click', function(){
            $(this).parents(".col-md-4").remove();
        });

        $("#photo").spartanMultiImagePicker({
            fieldName:        'photo',
            maxCount:         1,
            rowHeight:        '200px',
            groupClassName:   'col-md-4 col-sm-9 col-xs-6',
            maxFileSize:      '',
            dropFileLabel : "Drop Here",
            onExtensionErr : function(index, file){
                console.log(index, file,  'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr : function(index, file){
                console.log(index, file,  'file size too big');
                alert('File size too big');
            }
        });
    });

</script>
