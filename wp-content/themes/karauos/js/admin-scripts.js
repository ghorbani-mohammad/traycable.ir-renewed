jQuery(document).ready(function ($) {

    // Open wp default uploader
    $(document).on('click', '.select-uploader', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $target = $this.data('target');
        var $target_type = $this.data('target-type');
        var image = wp.media({
            multiple: false,
        }).open().on('select', function (e) {
            var uploaded_image = image.state().get('selection').first();
            var image_url = uploaded_image.toJSON().url;
            switch (true) {
                case $target_type === 'image' :
                    $('#' + $target).attr('src', image_url);
                    $('#' + $target + '_input').val(image_url);
                    break;
                case $target_type === 'widget' :
                    $('#' + $target).attr('src', image_url);
                    $('#' + $target + '_input').val(image_url).trigger('change');
                    break;
            }
        });
    });

    // Remove uploader image
    $('.remove-uploader').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var target = $this.data('target');
        $('#' + target).attr('src', '');
        $('#' + target + '_input').attr('value', '').trigger('change');
    });

    // Default uploader image
    $('.default-uploader').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var target = $this.data('target');
        var $default = $this.data('default');
        $('#' + target).attr('src', $default);
        $('#' + target + '_input').attr('value', '').trigger('change');
    });

});