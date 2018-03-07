<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>O2System Framework | Documentations</title>
    <meta name="description" content="Simple Wiki Documentations">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    {{$assets->head}}
</head>
<body class="documentation-project" data-spy="scroll" data-target="#toc">
<div class="mobile-header">
    <a href="#" class="mobile-logo">
        <div class="media">
            <img src="./assets/img/logo/logo-50px.png" class="d-flex">
            <div class="media-body">
                <div class="title">
                    <span class="logo-title">O2System Framework</span>
                    <span class="logo-subtitle">Documentation</span>
                </div>
            </div>
        </div>
    </a>
    <a href="#" class="button-open-menu">
        <span class="icon-wrap top-line"></span>
        <span class="icon-wrap middle-line"></span>
        <span class="icon-wrap bottom-line"></span>
    </a>
    <div class="responsive-mask"></div>
</div>
<div id="documentation-sidebar">
    <a href="#" id="documentation-logo">
        <div class="media">
            <img src="./assets/img/logo/logo-50px.png" class="d-flex">
            <div class="media-body">
                <div class="title">
                    <span class="logo-title">O2System Framework</span>
                    <span class="logo-subtitle">Documentation</span>
                </div>
            </div>
        </div>
    </a>
    <nav class="sidebar-menu-container" id="toc" data-toggle='toc'>
        {{$navigation}}
    </nav>
    <!-- <div id="documentation-copyright">
        <img src="assets/img/creative-commons-logo.png" height="40" class="ml-3">
    </div> -->
</div>
<div id="documentation-content">
    <section class="content">
        {{$partials->content}}
    </section>

    <footer>
        <p class="m-0">
            Written by Steeven Andrian <span class="float-right">Designed by Teguh Rianto</span>
        </p>
    </footer>
</div>

{{$assets->body}}
</body>
</html>