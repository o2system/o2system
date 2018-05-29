jQuery(document).ready(function ($) {
    var iForm = $('form');

    iForm.on('change', '[data-role="image-browse"] input:file', function(){
        var iFeaturedImage = $(this).closest('[data-role="featured-image"]');
        var iPreview = iFeaturedImage.find('[data-pattern="image-preview"]').addClass('hidden').clone();
        var iFile = this.files[0];
        var iReader = new FileReader();
        
        iReader.onload = function(image) {
            iFeaturedImage.find('[data-role="image-preview"]').remove();
            iPreview
                .removeAttr('style')
                .removeAttr('data-pattern')
                .attr('src', image.target.result)
                .attr('data-role', 'image-preview')
                .removeClass('hidden');
            iFeaturedImage.find('[data-pattern="image-preview"]').after( iPreview );
            iFeaturedImage.find('[data-role="image-filename"]').val(iFile.name);
        };
        
        iReader.readAsDataURL(iFile);
    });

    $('[data-action="alias"]').keyup(function () {
        var iValue = $(this).val();
        iValue = iValue.trim().replace(/[^a-zA-Z0-9 ]/g, '');
        iValue = iValue.replace(/\s+/g, '-').toLowerCase();

        iForm.find('[name="alias"]').val(iValue);
    });

    $('[data-action="edit-alias"]').click(function () {
        if ($('[name="alias"]').attr('disabled')) {
            $('[name="alias"]').removeAttr('disabled');
        } else {
            $('[name="alias"]').attr('disabled', true);
        }
    });

    $('[data-state="collapse"]').find('div.panel-body').addClass('collapse');

    // Panel Collapse
    $('.panel-collapse').click(function (e) {
        e.preventDefault();
        var iPanel = $(this).closest('div.panel');
        var iButton = $(this).find('i');
        var iContent = iPanel.find('div.panel-body');
        iContent.slideToggle(200);
        iButton.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
        iPanel.toggleClass('').toggleClass('border-bottom');
        setTimeout(function () {
            iPanel.resize();
            iPanel.find('[id^=map-]').resize();
        }, 50);
    });

    $(".chosen-select-basic").chosen({
        disable_search: true,
        width: "95%"
    });

    //SELECT2
    $('.select2').select2();

    //SELECT2
    $('.select2-standard').select2({
        minimumResultsForSearch: Infinity
    });

    //SELECT2 MULTIPLE
    $('.select2-multiple').select2();

    //iSwitch
    var elems = Array.prototype.slice.call(document.querySelectorAll('.iswitch'));
    elems.forEach(function (html) {
        var switchery = new Switchery(html, {size: 'small'});
    });
});

