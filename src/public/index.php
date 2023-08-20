<?php
// First we import all the important variables which we will use in app_layout.php
// the config.php defines the page title and the content to load based on the URL GET parameters
require_once __DIR__ . '/configurations/config.php';

// the app_layout.php is the HTML Skeleton in which the content will be wrapped
// the content is defined in the config.php based on the GET parameters
// the GET parameters are injected from the navigational links which are defined in the app_layout.php
// ex: <a class="nav-link" href="index.php?section=list&pageTitle=Product List">Product List</a>
// the 'section' variable will determine which php file to load and render in the front end
// the 'pageTitle' defines the <title> of the application based on what page we are currently
require_once  __DIR__ . '/views/templates/app_layout.php';