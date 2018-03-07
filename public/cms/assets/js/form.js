// TinyMCE Inlite Editor
tinymce.init({
    selector: 'div.tinymce',
    theme: 'inlite',
    plugins: 'image media table link paste contextmenu textpattern autolink codesample',
    insert_toolbar: 'quickimage quicktable media codesample',
    selection_toolbar: 'bold italic | quicklink h2 h3 blockquote',
    inline: true,
    paste_data_images: true,
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css']
});

tinymce.init({
    selector: 'textarea.tinymce',
    height: 500,
    menubar: false,
    themes: "inlite",
    statusbar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code help wordcount'
    ],
    toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'],
});
