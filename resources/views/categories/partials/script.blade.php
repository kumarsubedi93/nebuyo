<script>
    $(function () {

        const specificationSection = {
            init: function () {
                this.cacheDom();
                this.bind();
            },

            cacheDom: function () {
                this.$specificationSection = $('.specification-section');
            },

            bind: function () {
                this.$specificationSection.on('keyup', '.field-name', this.generateSlug);

                this.$specificationSection.on('click', '.add-attribute-row', this.addNewRow)

                this.$specificationSection.on('change', '.custom-input-field-type', this.addCustomInputField)

                this.$specificationSection.on('click', '.remove-product-attribute', this.removeProductAttribute)

            },

            removeProductAttribute: function (event) {
                event.preventDefault()
                var parentRow = $(this).parents('tr');
                parentRow.remove()
            },

            addCustomInputField: function (event) {

                event.preventDefault();
                const fieldType = $(this).val();

                if (parseInt(fieldType) === {{ \Modules\CustomField\Lib\CustomField::SELECT }}) {
                    $(this).parents('tr').find('.field-multiple-options').show();
                } else {
                    $(this).parents('tr').find('.field-multiple-options').hide();
                }
            },

            addNewRow: function (event) {
                event.preventDefault()
                $('.attribute-row').hide();
                var $addButton = $('#add-attribute-row');
                var $increment = parseInt($addButton.attr('data-increment')) + 1;
                $addButton.attr('data-increment', $increment)
                var tableRow = $('.specification-row:first').clone();

                tableRow.removeClass('specification-row').addClass(`tr-${$increment}`);
                tableRow.find('.field-name').attr('name', `attribute_field[${$increment}][field_name]`).attr('required', 'true')
                tableRow.find('.custom-input-field-type').attr('name', `attribute_field[${$increment}][field_input_type]`)
                tableRow.find('.multiple-input').attr('name', `attribute_field[${$increment}][multiple_options]`)
                tableRow.find('.default-value').attr('name', `attribute_field[${$increment}][field_default_value]`).attr('required', 'true')
                tableRow.find('.is-require').attr('name', `attribute_field[${$increment}][is_required]`)
                tableRow.find('.is_added_to_filter').attr('name', `attribute_field[${$increment}][is_added_to_filter]`)

                $('.attribute-info').append(tableRow.show());
            },

            generateSlug: function (event) {
                event.preventDefault();
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '_');

                $(this).parents('td').find('.field-slug').text(Text)
            },

        };
        specificationSection.init();

        function getSlug(text) {
            var Text = text;
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '_');
            return text;
        }
    });
</script>
