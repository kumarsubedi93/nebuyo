<script>
    const productForm = {
        init: function () {
            this.cacheDom()
            this.bind();
        },

        cacheDom: function () {
            this.$productForm = $('#choice_form');
        },

        bind: function () {
            this.$productForm.on('change', '#category_id', this.hideSpecification);

            this.$productForm.on('change', '#subcategory_id', this.hideSpecification);

            this.$productForm.on('change', '#subsubcategory_id', this.getSpecifications);
        },

        hideSpecification : function () {
            $('#product-specification').hide();
        },

        getSpecifications: function () {

            $('#subsubcategory_id').attr('data-model-type', "{{ \Neputer\Foundation\Lib\CategoryType::SUBSUBCATEGORY }}");
            $.ajax({
                url: "{{ route('getSpecification') }}",
                method: 'GET',
                data: {
                    category: $(this).val(),
                    category_type: $(this).attr('data-model-type'),
                },
                success: function (response) {
                    var specificationContent = response.body.html;
                    if(specificationContent != null) {
                        $('#product-specification').show();
                        $('.category_attribute').html("").append(response.body.html)
                    }
                    else {
                        $('#product-specification').hide();
                    }
                }
            })
        },
    }
    productForm.init();
</script>
