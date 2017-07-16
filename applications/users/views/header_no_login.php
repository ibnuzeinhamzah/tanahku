<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html ⚡ lang="en">
<head>
  <meta charset="utf-8">
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <title>Tanahku :: Investing in Tomorrow's Land</title>
  <link rel="canonical" href="https://uncompiled.github.io/amp-bootstrap/" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <meta name="description" content="tanahku Investing in Tomorrow land">
  <meta name="author" content="tanahku">
  <link rel="icon" href="<?=REALPATH . ASSETS_DIR?>/images/favicon-16x16.png" type="image/x-png">
  <!-- AMP boilerplate -->
  <style amp-boilerplate>
    <?php include REALPATH . ASSETS_DIR . "/stylesheets/amp-boilerplate.css"; ?>
  </style>
  <noscript>
    <style amp-boilerplate>
      body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}
    </style>
  </noscript>
  <style amp-custom>
    <?php include REALPATH . ASSETS_DIR . "/stylesheets/amp-custom.css"; ?>
  </style>
  <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
  <script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
  <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
  <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
  <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
  <script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
  <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.1.js"></script>
</head>

<body>
    <!-- <amp-analytics type="googleanalytics">
    <script type="application/json">
    {
      "vars": {
        "account": "UA-59009169-1"
      },
      "triggers": {
        "trackPageview": {
          "on": "visible",
          "request": "pageview"
        }
      }
    }
    </script>
    </amp-analytics> -->
    <amp-sidebar id="drawermenu" layout="nodisplay" side="right">
      <a href="<?=REALPATH?>projects">Projects</a>
      <a href="<?=REALPATH?>contact">About Us</a>
      <!-- <a href="https://blog.igrow.asia/">Blog</a> -->
      <!-- <amp-accordion>
        <section>
          <h4 class="category">
            Change Language ▼
          </h4>
          <div>
            <div class="item">
              <a href="https://www.igrow.asia/home/change_language?lang=id">
                <amp-img layout="fixed" height="20" width="30" src="https://www.igrow.asia/asset/img/icon/ic_indo.jpg"></amp-img>
                - Bahasa
                </a>
            </div>
            <div class="item">
              <a href="https://www.igrow.asia/home/change_language?lang=en">
                <amp-img layout="fixed" height="20" width="30" src="https://www.igrow.asia/asset/img/icon/ic_usa.png"></amp-img>
                - English
                </a>
            </div>
          </div>
        </section>
      </amp-accordion> -->

      <a href="<?=REALPATH?>users">Sign in</a>
      <a href="<?=REALPATH?>register">Sign up</a>
    </amp-sidebar>
    <nav id="primary_nav_wrap" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?=REALPATH?>welcome">
          <amp-img layout="fixed" height="35" width="400" src="<?=REALPATH . ASSETS_DIR?>/images/logo-header.png"></amp-img>
        </a>
        <ul class="pull-left hidden-xs">
          <!-- <li><a href="https://blog.igrow.asia/">Blog</a></li> -->
        </ul>
        <ul class="pull-right hidden-xs">
          <!-- <li>
            <a href="#">
              <amp-img class="flag" layout="fixed" height="20" width="30" src="https://www.igrow.asia/asset/img/icon/ic_usa.png"></amp-img> ▼
            </a>
          </li> -->
          <li><a href="<?=REALPATH?>projects">Projects</a></li>
          <li><a href="<?=REALPATH?>contact">About Us</a></li>
          <li><a href="<?=REALPATH?>users">Sign in</a></li>
          <li class="green"><a href="<?=REALPATH?>register">Sign up</a></li>
        </ul>
        <button on="tap:drawermenu.toggle" type="button" class="navbar-toggle collapsed visible-xs" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">    
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
      </div>
    </nav>