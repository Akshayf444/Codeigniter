<script type="text/javascript" src="<?php echo asset_url(); ?>assets/js/jquery.ezmark.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js"></script>
<!--<script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js"></script>-->
<!--<script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/tab.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-sass/javascripts/bootstrap/transition.js"></script>-->
<!--<script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-fileinput/js/fileinput.min.js"></script>-->
<script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-select/js/bootstrap-select.min.js"></script>
<!--<script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/bootstrap-wysiwyg/bootstrap-wysiwyg.min.js"></script>-->
<script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/cycle2/jquery.cycle2.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/cycle2/jquery.cycle2.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>assets/libraries/countup/countup.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>assets/js/profession.js"></script>
<script src="<?php echo asset_url(); ?>assets/libraries/ajaxloader/ajaxLoader.js" type="text/javascript"></script>
<script>
    function ajaxindicatorstart(text)
    {
        if (jQuery('body').find('#resultLoading').attr('id') != 'resultLoading') {
            jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="<?php echo asset_url()?>assets/img/ajax-loader.gif"><div>' + text + '</div></div><div class="bg"></div></div>');
        }

        jQuery('#resultLoading').css({
            'width': '100%',
            'height': '100%',
            'position': 'fixed',
            'z-index': '10000000',
            'top': '0',
            'left': '0',
            'right': '0',
            'bottom': '0',
            'margin': 'auto'
        });

        jQuery('#resultLoading .bg').css({
            'background': '#ffffff',
            'opacity': '0.4',
            'width': '100%',
            'height': '100%',
            'position': 'absolute',
            'top': '0'
        });

        jQuery('#resultLoading>div:first').css({
            'width': '250px',
            'height': '75px',
            'text-align': 'center',
            'position': 'fixed',
            'top': '0',
            'left': '0',
            'right': '0',
            'bottom': '0',
            'margin': 'auto',
            'font-size': '16px',
            'z-index': '10',
            'color': '#ffffff'

        });

        jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeIn(300);
        jQuery('body').css('cursor', 'wait');
    }

    function ajaxindicatorstop()
    {
        jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeOut(300);
        jQuery('body').css('cursor', 'default');
    }

    jQuery(document).ajaxStart(function () {
        //show ajax indicator
        ajaxindicatorstart('Please wait..');
    }).ajaxStop(function () {
        ajaxindicatorstop();
    });
</script>