<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root.'/backend/funcs.php');

$head = '<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="web@summerbo.at" />
    <meta name="rating" content="general" />
    <meta property="og:url" content="https://summerbo.at" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="summerbo.at" />

    <meta property="og:image" content="https://reg.summerbo.at/images/2022-color-logo.png">
    <meta property="og:image:width" content="1415">
    <meta property="og:image:height" content="741">

    <!-- ToDo: Move itemprop name and description to individual pages -->
    <meta itemprop="name" content="All Paws on Deck '.getPartyDate('Y').'" />
    <meta itemprop="description" content="All Paws on Deck '.getPartyDate('Y').' &mdash; Summerbo.at is a super awesome furry party, on a boat, in Berlin, at Eurofurence! '.getPartyDate('d F Y').'" />
    <meta itemprop="startDate" content="' . $config['start'] . '" />
    <meta itemprop="endDate" content="' . $config['start'] . '" />
    <meta itemprop="location" content="Estrel Hotel, Berlin, Germany" />

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@summerbo_at">
    <meta name="twitter:title" content="All Paws on Deck '.getPartyDate('Y').'">
    <meta name="twitter:description" content="All Paws on Deck '.getPartyDate('Y').' &mdash; Summerbo.at is a super awesome furry party, on a boat, in Berlin, at Eurofurence! '.getPartyDate('d F Y').'">
    <meta name="twitter:image" content="https://reg.summerbo.at/images/2022-color-logo.png">
    <meta name="twitter:image:alt" content="Summerbo.at Logo">
    <meta name="twitter:creator" content="@summerbo_at" />
    
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#3ec1c7">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#3ec1c7">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#3ec1c7">

    <meta name="apple-mobile-web-app-title" content="All Paws on Deck '.getPartyDate('Y').' Summerbo.at Party">
    <meta name="application-name" content="All Paws on Deck '.getPartyDate('Y').' Summerbo.at Party">
    <script src="/js/yall-2.2.0.min.js"></script>
    <link rel="stylesheet" href="/css/css.css">
    <link rel="stylesheet" href="/css/badger-accordion.css">
    <link rel="stylesheet" href="/css/line-awesome.min.css">
    <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "Organization",
        "name": "Summerbo.at",
        "url": "https://summerbo.at",
        "logo": "https://summerbo.at/android-icon-192x192.png",
        "sameAs": [
          "https://twitter.com/summerbo_at",
          "https://t.me/summerboat",
          "https://instagram.com/Summerbo_at"
        ]
      }
    </script>
';

if ($_SERVER['SERVER_NAME'] !== 'dev.summerbo.at') {
    $head .= '<!-- Matomo -->
    <script type="text/javascript">
      var _paq = window._paq = window._paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      //consent remembered upon click of cookie notice
      //require user consent before processing data
      _paq.push(["setExcludedQueryParams", ["token"]]);
      _paq.push([\'requireConsent\']);
        _paq.push([\'setDomains\', [\'*.summerbo.at\', \'summerbo.at\']]);
      _paq.push([\'trackPageView\']);
      _paq.push([\'enableLinkTracking\']);
      (function() {
        var u="https://stats.summerbo.at/";
        _paq.push([\'setTrackerUrl\', u+\'matomo.php\']);
        _paq.push([\'setSiteId\', \'1\']);
        var d=document, g=d.createElement(\'script\'), s=d.getElementsByTagName(\'script\')[0];
        g.async=true; g.src=u+\'matomo.js\'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <noscript><p><img src="https://stats.summerbo.at/matomo.php?idsite=1&amp;rec=1" style="border:0;" alt="" /></p></noscript>
    <!-- End Matomo Code -->';
}

$nav = '<nav id="nav" class="nav inactive">
    <div class="wrapper">
      <div class="navContent">
        <button class="navItem js-showNav">
          <i class="la la-bars"></i><span>Menu</span>
        </button>

        <div class="navLinks">
          <div class="navItem navItemLogo">
            <a class="navLink" href="https://summerbo.at"><img alt="Summerboat Logo" src="/images/logo@2x.png" width="48">
              <p style="margin-left: 1rem; line-height:1;" class="heading5 subheadline nomargin">
              Summerbo.at '.getPartyDate('Y').':<br>
              All Paws on Deck
              </p></a>
          </div>
          <div class="navItem">
            <a class="navLink" href="/attendees">Attendees</a>
          </div>
        </div>
        <div class="navButtons">
          <div class="navItem">
            <a class="button navItemButton buttonPrimary" href="/"><i
                      style="font-size: 24px; margin-right: .5rem; margin-top:-4px;"
                      class="la la-ticket"></i>Register</a>
          </div>
          <div class="navItem">
            <a class="button navItemButton buttonSecondary" href="/login"><i
                      style="font-size: 24px; margin-right: .5rem; margin-top:-4px;" class="la la-key"></i>Login</a>
          </div>
        </div>
      </div>
    </div>
  </nav>';

$footer = '<section id="footer">
    <div class="footer" style="background-color: var(--colorSecondary); color: white;">
      <div class="wrapper row">
        <div class="content">
          <ul class="blankList textSmall" style="margin-bottom: 2rem">
            <li><a href="https://summerbo.at/tos" class="unselectable flexCentered">Terms of Service</a></li>
            <li><a href="https://summerbo.at/conduct" class="unselectable flexCentered">Rules of Conduct</a></li>
            <li><a href="https://summerbo.at/privacy" class="unselectable flexCentered">Privacy</a></li>
            <li><a href="https://summerbo.at/privacy#cookies" class="unselectable flexCentered">Cookies</a></li>
            <li><a href="https://github.com/datdraggy/summerbo.at" rel="noopener" target="_blank" class="unselectable flexCentered">Source</a></li>
          </ul>
          <p class="textSmall">Content Copyright &copy; Summerbo.at Organization Group 2018-22</p>
        </div>
      </div>
    </div>
  </section>
</div> <!-- App -->
<script>document.addEventListener("DOMContentLoaded", yall);</script>
<script src="/js/badger-accordion.min.js"></script>
<script src="/js/app.js"></script>
<!-- Start Cookie Plugin -->
<script>
  window.cookieconsent_options = {
    message: \'This website uses cookies and anonymous tracking to fully function.\',
    dismiss: \'Ok, I accept\',
    learnMore: \'More infos and opt-out\',
    link: \'https://summerbo.at/tos#optout\',
    theme: \'light-floating\'
  };
</script>
<script src="/js/cookie-consent/script.js"></script>';
//This website uses cookies to fully function. To login, you will have to allow them.
