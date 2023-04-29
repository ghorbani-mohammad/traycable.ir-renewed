<style>
    form.register_version_form,
    .current_license {
        width: 35%;
        background: #fff;
        margin: 0 auto;
        padding: 20px 30px;
    }
    form.register_version_form  .license_key {
        padding: 5px 10px;
        width: calc( 100% - 130px );
    }

    form.register_version_form  .license_key+button{
        min-width: fit-content;
    }
    form.register_version_form button {
        width: 80px;
        text-align: center;
    }

    form.register_version_form .result,
    .current_license .check_result {
        width: 100%;
        padding: 30px 0 15px;
        text-align: center;
        display: none;
    }
    .current_license .check_result {
        padding: 20px 0;
        float: right;
        width: 100%;
    }
    form.register_version_form .result .spinner,
    .current_license .check_result .spinner {
        width: auto;
        background-position: right center;
        padding-right: 30px;
        margin: 0;
        float: none;
        visibility: visible;
        display: none;
    }
    .current_license.waiting .check_result .spinner,
    form.register_version_form .result.show .spinner {
        display: inline-block;
    }
    .current_license {
        width: 40%;
        text-align: center;
    }
    .current_license > .current_label {
        line-height: 25px;
        height: 25px;
        display: inline-block;
        font-weight: bold;
        margin-left: 10px;
    }
    .current_license > code {
        line-height: 25px;
        height: 25px;
        padding: 0 5px;
        color: #c7254e;
        margin-left: 10px;
        display: inline-block;
        -webkit-transform: translateY(2px);
        -moz-transform: translateY(2px);
        -ms-transform: translateY(2px);
        -o-transform: translateY(2px);
        transform: translateY(2px);
    }
    .current_license .action {
        color: #fff;
        line-height: 25px;
        height: 25px;
        padding: 0 5px;
        display: inline-block;
    }
    .current_license .last_check {
        line-height: 25px;
        height: 25px;
        padding: 0 5px;
        display: inline-block;
    }
    .current_license .action.active {
        background: #4CAF50;
    }
    .current_license .action.inactive {
        background: #c7254e;
    }

    .current_license .keys {
        float: right;
        width: 100%;
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid #ddd;
        margin-top: 20px;
    }
    .current_license .keys .wpmlr_revalidate {
        margin-left: 30px;
    }
    .current_license .register_version_form {
        display: none;
        padding: 0;
        float: right;
        width: 80%;
        margin: 20px 10%;
    }
    .zhk_guard_notice {
        background: #fff;
        border: 1px solid rgba(0,0,0,.1);
        border-right: 4px solid #00a0d2;
        padding: 5px 15px;
        margin: 5px;
        display: none !important;
    }
    .zhk_guard_danger {
        background: #fff;
        border: 1px solid rgba(0,0,0,.1);
        border-right: 4px solid #DC3232;
        padding: 5px 15px;
        margin: 5px;
        display: none !important;
    }
    .zhk_guard_success {
        background: #fff;
        border: 1px solid rgba(0,0,0,.1);
        border-right: 4px solid #46b450;
        padding: 5px 15px;
        margin: 5px;
        display: none !important;
    }
    @media (max-width: 1024px) {
        form.register_version_form,
        .current_license {
            width: 90%;
        }
    }
</style>
<div class="wrap wpmlr_wrap">
    <h1><?php _e('ثبت لایسنس ژاکت',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?></h1>
    <?php if( isset($now) && !empty($now) ): ?>
    <p><?php _e('You already register your license key. to re validate it, you can use this form.',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?></p>
    <div class="current_license">
        <span class="current_label"><?php _e('Your current license:',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?></span>
        <code><?php echo $starter; ?></code>
        <div class="action <?php echo ($now->action == 1) ? 'active' : 'inactive'; ?>">
            <?php if( $now->action == 1 ): ?>
            <span class="dashicons dashicons-yes"></span>
            <?php echo $now->message; ?>
            <?php else: ?>
            <span class="dashicons dashicons-no-alt"></span>
            <?php echo $now->message; ?>
            <?php endif; ?>
        </div>
        <div class="keys">
            <a href="#" class="button button-primary wpmlr_revalidate" data-key="<?php echo $starter; ?>"><?php _e('Revalidate',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?></a>
            <a href="#" class="button zhk_guard_new_key"><?php _e('Delete and submit another license',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?></a>
        </div>

        <form action="#" method="post" class="register_version_form">
            <input type="text" class="license_key" placeholder="<?php _e('کلید لایسنس جدید',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?>">
            <button class="button button-primary"><?php _e('ثبت لایسنس ژاکت',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?></button>
            <div class="result">
                <div class="spinner"><?php _e('Please wait...',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?></div>
                <div class="result_text"></div>
            </div>
        </form>

        <div class="check_result">
            <div class="spinner"><?php _e('Please wait...',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?></div>
            <div class="result_text"></div>
        </div>
        <div class="clear"></div>
    </div>
    <?php else: ?>
    <p><?php _e('Please activate plugin with your license key to all features work.',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?></p>
    <form action="#" method="post" class="register_version_form">
        <input type="text" class="license_key" placeholder="<?php _e('License key',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?>">
        <button class="button button-primary"><?php _e('ثبت لایسنس ژاکت',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?></button>
        <div class="result">
            <div class="spinner"><?php _e('Please wait...',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?></div>
            <div class="result_text"></div>
        </div>
    </form>
    <?php endif; ?>
    <script>
        jQuery(document).ready(function($) {
            var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
            jQuery(document).on('submit', '.register_version_form', function(event) {
                event.preventDefault();
                var starter = jQuery(this).find('.license_key').val(),
                    thisEl = jQuery(this);
                thisEl.addClass('waiting');
                thisEl.find('.result').slideDown(300).addClass('show');
                thisEl.find('.button').addClass('disabled');
                thisEl.find('.result_text').slideUp(300).html('');
                jQuery.ajax({
                    url: ajax_url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: '<?php echo self::f2fd7f5feeef08efd9349f05294544d('slug'); ?>',
                        starter: starter
                    },
                })
                    .done(function(result) {
                        thisEl.find('.result_text').append(result.data).slideDown(150)
                    })
                    .fail(function(result) {
                        thisEl.find('.result_text').append('<div class="zhk_guard_danger"><?php _e('Something goes wrong please try again.',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?></div>').slideDown(150)
                    })
                    .always(function(result) {
                        console.log(result);
                        thisEl.removeClass('waiting');
                        thisEl.find('.result').removeClass('show');
                        thisEl.find('.button').removeClass('disabled');
                    });
            });

            $(document).on('click', '.wpmlr_revalidate', function(event) {
                event.preventDefault();
                var starter = $(this).data('key'),
                    thisEl = $(this).parents('.current_license');
                thisEl.addClass('waiting');
                thisEl.find('.check_result').slideDown(300);
                thisEl.find('.button').addClass('disabled');
                thisEl.find('.result_text').slideUp(300).html('');
                thisEl.find('.register_version_form').slideUp(300)
                $.ajax({
                    url: ajax_url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: '<?php echo self::f2fd7f5feeef08efd9349f05294544d('slug'); ?>_revalidate',
                        starter: starter
                    },
                })
                    .done(function(result) {
                        thisEl.find('.check_result .result_text').append(result.data).slideDown(150)
                    })
                    .fail(function(result) {
                        thisEl.find('.check_result .result_text').append('<div class="wpmlr_danger"><?php _e('Something goes wrong please try again.',  self::f2fd7f5feeef08efd9349f05294544d('text_domain')); ?></div>').slideDown(150)
                    })
                    .always(function(result) {
                        thisEl.removeClass('waiting');
                        thisEl.find('.button').removeClass('disabled');
                    });
            });


            $(document).on('click', '.zhk_guard_new_key', function(event) {
                event.preventDefault();
                var thisEl = $(this).parents('.current_license');
                thisEl.find('.result_text').slideUp(300).html('');
                thisEl.find('.register_version_form').slideDown(300)
            });
        });
    </script>

</div>