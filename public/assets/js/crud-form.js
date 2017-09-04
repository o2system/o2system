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

    // tinyMCE
    tinymce.init({
        menubar: false,
        selector: '.tinymce-full',
        height: 400,
        plugins: [
            'contextmenu textcolor colorpicker advlist lists link image imagetools charmap print anchor autoresize hr',
            'paste media emoticons spellchecker searchreplace visualblocks visualchars code bbcode table wordcount fullscreen pagebreak'
        ],
        toolbar1: 'styleselect | bold italic underline strikethrough forecolor backcolor | bullist numlist outdent indent | blockquote hr alignleft aligncenter alignright alignjustify | table',
        toolbar2: 'undo redo copy paste removeformat | pagebreak anchor link unlink insertfile image media |  charmap emoticons',
        image_advtab: true,
        visualblocks_default_state: false,
        contextmenu: "print code | spellchecker searchreplace fullscreen visualchars visualblocks"
    });

    tinymce.init({
        menubar: false,
        selector: '.tinymce-minimal',
        height: 200,
        plugins: 'contextmenu textcolor visualblocks autoresize code wordcount',
        toolbar1: 'bold italic underline strikethrough forecolor backcolor | bullist numlist outdent indent | blockquote alignleft aligncenter alignright alignjustify',
        visualblocks_default_state: false,
        end_container_on_empty_block: true,
        contextmenu: "code | visualblocks"
    });

    tinymce.init({
        menubar: false,
        selector: '.tinymce-bootstrap',
        height: 400,
        script_url: o2system.URL.Base('tinymce-bootstrap-plugin/examples/tinymce/tinymce.min.js'), // replace with your own path
        document_base_url: o2system.URL.Base(),
        height: 400,
        plugins: [
            'contextmenu textcolor colorpicker advlist lists link image imagetools charmap print anchor autoresize hr',
            'paste media emoticons spellchecker searchreplace visualblocks visualchars code bbcode table wordcount fullscreen pagebreak bootstrap'
        ],
        toolbar1: 'styleselect | bold italic underline strikethrough forecolor backcolor | bullist numlist outdent indent | blockquote hr alignleft aligncenter alignright alignjustify | table',
        toolbar2: 'undo redo copy paste removeformat | pagebreak anchor link unlink insertfile image media |  charmap emoticons',
        toolbar3: "bootstrap",
        image_advtab: true,
        visualblocks_default_state: false,
        contextmenu: "print code | spellchecker searchreplace fullscreen visualchars visualblocks",
        bootstrapConfig: {
            'imagesPath': $('.tinymce-bootstrap').data('path') // replace with your images folder path
        }
    });
});

