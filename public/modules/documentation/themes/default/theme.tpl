<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>O2System | Documentations</title>
    <meta name="description" content="Simple Wiki Documentations">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">
    {{$assets->head}}
</head>
<body class="documentation-project" data-spy="scroll" data-target="#toc">
<div class="mobile-header">
    <a href="#" class="mobile-logo">
        <img src="{{$assets->image('logo.png')}}">
        <div class="title">
            <span class="logo-title">O2System</span>
            <span class="logo-subtitle">The Liquid PHP Framework</span>
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
        <img src="{{$assets->image('logo.png')}}">
        <div class="title">
            <span class="logo-title">O2System</span>
            <span class="logo-subtitle">The Liquid PHP Framework</span>
        </div>
    </a>
    <nav class="sidebar-menu-container" id="toc" data-toggle="toc">

    </nav>
    <div id="documentation-copyright">
        <img src="{{$assets->image('creative-commons-logo.png')}}" height="50">
        <p>
            O2System is Trademark of Steeven Andrian Salim<br>
            Copyright &copy; Steeven Andrian Salim<br><br>

            Designed by Teguh Rianto
        </p>
    </div>
</div>
<div id="documentation-content">
    <section class="content">
        <h1 class="page-header" id="table-of-contents-plugin-for-bootstrap">Table of Contents plugin for Bootstrap</h1>

        <p>This <a href="http://getbootstrap.com/">Bootstrap</a> plugin allows you to generate a table of contents for
            any page, based on the heading elements. It is meant to emulate the sidebar you see on <a
                    href="http://getbootstrap.com/css/">the Bootstrap documentation site</a>.</p>

        <p>This page is an example of the plugin in action – the table of contents you see on the left (or top, on
            mobile) was automatically generated, without having to manually keep all of the navigation items in sync
            with the headings.</p>

        <h2 id="usage">Usage</h2>

        <p>On top of the normal Bootstrap setup (see their <a href="http://getbootstrap.com/getting-started/">Getting
                Started</a> guide), you will need to include the Bootstrap Table of Contents stylesheet and JavaScript
            file.</p>

        <div class="language-html highlighter-rouge"><pre class="highlight"><code><span class="c">&lt;!-- add after bootstrap.min.css --&gt;</span>
        <span class="nt">&lt;link</span> <span class="na">rel=</span><span class="s">"stylesheet"</span> <span
                            class="na">href=</span><span class="s">"https://cdn.rawgit.com/afeld/bootstrap-toc/v0.4.1/dist/bootstrap-toc.min.css"</span><span
                            class="nt">&gt;</span>
        <span class="c">&lt;!-- add after bootstrap.js --&gt;</span>
        <span class="nt">&lt;script </span><span class="na">src=</span><span class="s">"https://cdn.rawgit.com/afeld/bootstrap-toc/v0.4.1/dist/bootstrap-toc.min.js"</span><span
                            class="nt">&gt;&lt;/script&gt;</span>
        </code></pre>
        </div>

        <p><a href="https://github.com/afeld/bootstrap-toc/tree/gh-pages/dist">Unminified versions</a> are also
            available.</p>

        <p>Next, pick one of the two options below.</p>

        <h3 id="via-data-attributes">Via data attributes</h3>

        <p><em>Simplest.</em>
        </p>

        <p>Create a <code class="highlighter-rouge">&lt;nav&gt;</code> element with a <code class="highlighter-rouge">data-toggle="toc"</code>
            attribute.</p>

        <div class="language-html highlighter-rouge"><pre class="highlight"><code><span class="nt">&lt;nav</span> <span
                            class="na">id=</span><span class="s">"toc"</span> <span class="na">data-toggle=</span><span
                            class="s">"toc"</span><span class="nt">&gt;&lt;/nav&gt;</span>
        </code></pre>
        </div>

        <p>You can put this wherever on the page you like. Since this plugin leverages Bootstrap’s <a
                    href="http://getbootstrap.com/javascript/#scrollspy">Scrollspy</a> plugin, you will also need to add
            a couple attributes to the <code class="highlighter-rouge">&lt;body&gt;</code>:</p>

        <div class="language-html highlighter-rouge"><pre class="highlight"><code><span class="nt">&lt;body</span> <span
                            class="na">data-spy=</span><span class="s">"scroll"</span> <span
                            class="na">data-target=</span><span class="s">"#toc"</span><span class="nt">&gt;</span>
        </code></pre>
        </div>

        <h3 id="via-javascript">Via JavaScript</h3>

        <p><em>If you need customization.</em>
        </p>

        <p>If you prefer to create your navigation element another way (e.g. within single-page apps), you can pass a
            jQuery object into <code class="highlighter-rouge">Toc.init()</code>.</p>

        <div class="language-html highlighter-rouge"><pre class="highlight"><code><span class="nt">&lt;nav</span> <span
                            class="na">id=</span><span class="s">"toc"</span><span class="nt">&gt;&lt;/nav&gt;</span>
        </code></pre>
        </div>

        <div class="language-javascript highlighter-rouge"><pre class="highlight"><code><span class="nx">$</span><span
                            class="p">(</span><span class="kd">function</span><span class="p">()</span> <span
                            class="p">{</span>
                        <span class="kd">var</span> <span class="nx">navSelector</span> <span class="o">=</span> <span class="s1">'#toc'</span><span class="p">;</span>
                        <span class="kd">var</span> <span class="nx">$myNav</span> <span class="o">=</span> <span class="nx">$</span><span class="p">(</span><span class="nx">navSelector</span><span class="p">);</span>
                        <span class="nx">Toc</span><span class="p">.</span><span class="nx">init</span><span class="p">(</span><span class="nx">$myNav</span><span class="p">);</span>
                        <span class="nx">$</span><span class="p">(</span><span class="s1">'body'</span><span class="p">).</span><span class="nx">scrollspy</span><span class="p">({</span>
                        <span class="na">target</span><span class="p">:</span> <span class="nx">navSelector</span>
                        <span class="p">});</span>
                        <span class="p">});</span>
        </code></pre>
        </div>

        <p>See the <a href="http://getbootstrap.com/javascript/#scrollspy">Scrollspy</a> documentation for more
            information about initializing that plugin.</p>

        <h4 id="options">Options</h4>

        <p>When calling <code class="highlighter-rouge">Toc.init()</code>, you can either pass in the jQuery object for
            the <code class="highlighter-rouge">&lt;nav&gt;</code> element (as seen above), or an options object:</p>

        <div class="language-javascript highlighter-rouge"><pre class="highlight"><code><span class="nx">Toc</span><span
                            class="p">.</span><span class="nx">init</span><span class="p">({</span>
                        <span class="na">$nav</span><span class="p">:</span> <span class="nx">$</span><span class="p">(</span><span class="s1">'#myNav'</span><span class="p">),</span>
                        <span class="c1">// ...</span>
                        <span class="p">});</span>
        </code></pre>
        </div>

        <p>All options are optional, unless otherwise indicated.</p>

        <table class="table">
            <thead>
            <tr>
                <th>option</th>
                <th>type</th>
                <th>notes</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><code class="highlighter-rouge">$nav</code>
                </td>
                <td>jQuery Object</td>
                <td>(required) The element that the navigation will be created in.</td>
            </tr>
            <tr>
                <td><code class="highlighter-rouge">$scope</code>
                </td>
                <td>jQuery Object</td>
                <td>The element where the search for headings will be limited to, or the list of headings that will be
                    used in the navigation. Defaults to <code class="highlighter-rouge">$(document.body)</code>.
                </td>
            </tr>
            </tbody>
        </table>

        <h2 id="customization">Customization</h2>

        <p>The following options can be specified at the heading level via <code
                    class="highlighter-rouge">data-toc-*</code> attributes.</p>

        <h3 id="displayed-text">Displayed text</h3>

        <p>displays “Longer text” as the heading, but “Short text” in the sidebar.</p>


        <h2 id="see-also">See also</h2>

        <p>This plugin was heavily inspired by:</p>

        <ul>
            <li><a href="https://jsfiddle.net/gableroux/S2SMK/">Bootstrap Docs Sidebar example</a>
            </li>
            <li><a href="http://gregfranko.com/jquery.tocify.js/">Tocify plugin</a>
            </li>
            <li><a href="http://projects.jga.me/toc/">TOC plugin</a>
            </li>
        </ul>

        <h2 id="contributing">Contributing</h2>

        <p>Questions, feature suggestions, and bug reports/fixes welcome!</p>

        <h3 id="manual-testing">Manual testing</h3>

        <ol>
            <li>Run <code class="highlighter-rouge">bundle</code>.</li>
            <li>Run <code class="highlighter-rouge">bundle exec jekyll serve</code>.</li>
            <li>Open the various test templates:
                <ul>
                    <li><a href="http://localhost:4000/bootstrap-toc/test/templates/h2s.html">H2’s</a>
                    </li>
                    <li><a href="http://localhost:4000/bootstrap-toc/test/templates/markdown.html">Markdown</a>
                    </li>
                    <li><a href="http://localhost:4000/bootstrap-toc/test/templates/no-ids.html">No IDs</a>
                    </li>
                </ul>
            </li>
        </ol>

        <h3 id="automated-testing">Automated testing</h3>

        <ol>
            <li>Run <code class="highlighter-rouge">npm install</code>.</li>
            <li>Run <code class="highlighter-rouge">gulp test</code>/<code class="highlighter-rouge">gulp watch</code>
                (command-line), or <code class="highlighter-rouge">open test/index.html</code> (browser).
            </li>
        </ol>

    </section>
</div>

{{$assets->body}}
</body>
</html>