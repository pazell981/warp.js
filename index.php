<!doctype html>
<html>
  <head>
    <meta charset="utf-8">

    <title>Warp JS</title>

    <meta name="robot" content="index,nofollow">
    <meta name="copyright" content="Copyright © 2014 Paul Zellmer. All Rights Reserved.">
    <meta name="author" content="Paul Zellmer">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/stylesheet.css">
    
    <script src="/lib/js/jquery-2.1.1.min.js" charset="utf-8"></script>
    <script src="/lib/js/jquery-ui-1.9.2.custom.min.js" charset="utf-8"></script>    
  
  </head>
  <body>
  <div id='warpContainer' data-offset='150' class='span12'>
    <!-- start php script for project display -->
    <?php 
      $categories = array('abstract', 'animals', 'business', 'city', 'food', 'nightlife', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport')
      $projects = array();
      for ($i; $i<10; $i++){
        $projects[$i] = array();
        $projects[$i]['title'] = 'Title ' .  $i;
        $projects[$i]['description'] = file_get_contents('http://loripsum.net/api/1/short/decorate/headers');
        $projects[$i]['image_location'] = 'http://lorempixel.com/400/200'
      }
      if(!is_null($projects)){
        $i = 0;
        foreach ($projects as $project) {
          ?>
          <div class='warp' class='span-12' >
            <img src='<?php echo $project['image_location']; ?>' class='img-rounded'>
            <div class='warp_desc'>
              <h5><?php echo $project['title'] ?></h5>
              <label>Description: </label><p><?php echo $project['description']; ?></p>
              <p data-link='<?php echo $project['url']; ?>' class='proj_link' id='<?php echo $i; ?>'>View Site</p>
            </div>
          </div>
          <?php
          $i++;
        }
      }
    ?>
  </div><!-- end of #warpContainer -->
  <script src="/assets/javascripts/warp.js" charset="utf-8"></script>
  <script src="/assets/javascripts/portfolio.js" charset="utf-8"></script>
  </body>
</html>