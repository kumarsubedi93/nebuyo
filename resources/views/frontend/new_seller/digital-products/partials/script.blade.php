<script>
    const digitalProduct = {
        init : function () {
            this.cacheDom();
            this.bind();
        },

        cacheDom : function () {
            this.digitalProduct = $('#digital-product');
        },


        bind : function () {
            this.digitalProduct.on('click', '.add_more_photo', this.addMorePhotos);

            this.digitalProduct.on('click', '.remove-files', this.removePhotos);
        },

        addMorePhotos : function (event) {
            event.preventDefault();
            var $this = $(this);
            var increment = parseInt($this.attr('increment'));
            $this.attr('increment', (increment + 1));
            photoAdd =  $('.photos_list:last').clone();
            photoAdd.find('.photos').attr('class' , `temp_dropify_${increment + 1}`);
            $('#photos').append(photoAdd.show());
            $(`.temp_dropify_${increment + 1}`).dropify();
        },

        removePhotos : function () {
            $(this).closest('.photos_list').remove();
        }
    }
    digitalProduct.init();
</script>
