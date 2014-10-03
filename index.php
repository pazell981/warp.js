<!doctype html>
<html>
  <?php     
    session_start();
    include 'new-connection.php';
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
    } elseif (isset($_SESSION['error'])) {
      $errors = $_SESSION['error'];
    } else{
      $errors = array('email'=>FALSE, 'password'=>FALSE);
    }
  ?>
  <head>
    <meta charset="utf-8">

    <title>Paul's Launchpad - Portfolio of a Junior Web Developer</title>

    <meta name="description" content="The portfolio of Front End/Junior Web Developer, Paul Zellmer.  ">
    <meta name="keywords" content="Paul Zellmer, Junior Web Developer, Front End Developer, Portfolio, Resume, HTML, HTML5, CSS, CSS3, PHP, CodeIgniter, jQuery, D3 JS, JavaScript, Node JS, Express JS, Angular JS, MongoDB, PostgreSQL, MySQL, SQL, Ruby, Ruby on Rails, Git">
    <meta name="robot" content="index,nofollow">
    <meta name="copyright" content="Copyright © 2014 Paul Zellmer. All Rights Reserved.">
    <meta name="author" content="Paul Zellmer">
    <meta name="revisit-after" content="30">

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="http://www.pazellmer.com/assets/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://www.pazellmer.com/assets/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://www.pazellmer.com/assets/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://www.pazellmer.com/assets/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="http://www.pazellmer.com/assets/favicon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="http://www.pazellmer.com/assets/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="http://www.pazellmer.com/assets/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="http://www.pazellmer.com/assets/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="http://www.pazellmer.com/assets/favicon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="http://www.pazellmer.com/assets/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="http://www.pazellmer.com/assets/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="http://www.pazellmer.com/assets/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="http://www.pazellmer.com/assets/favicon/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="Paul's Launchpad"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="http://www.pazellmer.com/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="http://www.pazellmer.com/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="http://www.pazellmer.com/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="http://www.pazellmer.com/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="http://www.pazellmer.com/mstile-310x310.png" />


    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="white-translucent" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="lib/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/css/jquery-ui-vader.min.css">
    <link rel="stylesheet" href="lib/css/reveal.css">
    <link rel="stylesheet" href="lib/css/theme/default.css" id="theme">
    <link rel="stylesheet" href="lib/css/zenburn.css">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    

    <script src="/lib/js/jquery-2.1.1.min.js" charset="utf-8"></script>
    <script src="/lib/js/jquery-ui-1.9.2.custom.min.js" charset="utf-8"></script>    
    <script src="/lib/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="/lib/js/transition.js" charset="utf-8"></script>
    <script src="/lib/js/tooltip.js" charset="utf-8"></script>
    <script src="/lib/js/popover.js" charset="utf-8"></script>
    <script src="/lib/js/jquery.touchy.min.js" charset="utf-8"></script>
    <script src="/lib/js/d3.min.js" charset="utf-8"></script>
  
    <script type="text/javascript">
      $(document).ready(function (){
        $("#project_accord").accordion({ 
          header: "h3",
          heightStyle: "content"
        });
      })
    </script> 
  </head>
  <body>
    <div class='row-fluid'>
      <div id = 'wrapper1' class='span12'>
        <script charset="utf-8">
          var size = 3;
          var arrayC=[];
          for (var j=1; j<size; j++){
            arrayC[j]=[];
            for(i=0; i<500*j; i++){
              arrayC[j].push({
                "x_axis": parseInt(Math.random()*$("#wrapper1").width()),
                "y_axis": parseInt(Math.random()*$("#wrapper1").height()), 
                "radius": (size-j)
              });
            }
          }
          var container = d3.select("#wrapper1").append("svg").attr("width", "100%").attr("height", "100%").attr("xmlns", "http://www.w3.org/2000/svg").attr("id", "starry");

          for (var i=1; i<size; i++ ){
            var circles = 
            container.selectAll("circle")
            .data(arrayC[i]).enter()
            .append("circle")
            var circleAttributes = circles
            .attr("cx", function (d){return d.x_axis;})
            .attr("cy", function (d){return d.y_axis;})
            .attr("r", function (d){return d.radius;})
            .style("fill", function(){
              return "rgb("+parseInt(Math.random()*125)+","+parseInt(Math.random()*125)+","+parseInt(Math.random()*125)+")";
            });
          };
          var container2 = d3.select("#starry").append("svg").attr("width", "100%").attr("height", "100%").attr("xmlns", "http://www.w3.org/2000/svg").attr("id", "overlay");
          var counter = 1;
          for (var i=1; i<size; i++ ){
            var overlay = 
            container2.selectAll("circle")
            .data(arrayC[i]).enter()
            .append("circle")
            var overlayAttributes = overlay
            .attr("cx", function (d){return d.x_axis;})
            .attr("cy", function (d){return d.y_axis;})
            .attr("r", function (d){return d.radius;})
            .attr("class", function(){
              if (counter == 1){
                counter++
                return "stars1"
              } else if (counter == 2) {
                counter++
                return "stars2"
              } else if (counter == 3){
                counter++
                return "stars3"
              } else {
                counter=1
                return "stars4"
              }
            })
            .style("fill", "rgb(255,255,255)")
          };
        </script>
        <div id='topbar' class='row'>
          <div class='span12 visible-desktop visible-tablet hidden-phone'>
            <ul>
              <li><a href='#/bio' class='nav inset'>Bio</a></li>
              <li><a href='#/skills' class='nav inset'>Skills</a></li>
              <li><a href='#/resume' class='nav inset'>Resume</a></li>
              <li><a href='#/contact' class='nav inset'>Contact</a></li>
              <li><a href='#/social' class='nav inset'>Social</a></li>
            </ul>
          </div><!-- end of #topbar large/med screen -->
          <div class='span12 hidden-tablet hidden-desktop visible-phone'>
            <ul>
              <li><a href='#/bio' class='nav inset'>Bio</a></li>
              <li><a href='#/skills' class='nav inset'>Skills</a></li>
              <li><a href='#/resume' class='nav inset'>Resume</a></li>
            </ul>
          </div><!-- end of #topbar pt1 smallscreen -->
          <div id='topbarsecondline' class='span12 hidden-tablet hidden-desktop visible-phone'>
            <ul>
              <li><a href='#/contact' class='nav inset'>Contact</a></li>
              <li><a href='#/profiles' class='nav inset'>Profiles</a></li>
            </ul>
          </div><!-- end of #topbar pt2 smallscreen -->
        </div><!-- end of #topbar -->
      </div><!-- end of #wrapper1 -->
      <div class='row'>
        <div id='warpContainer' data-offset='150' class='span12'>
          <!-- start php script for project display -->
          <?php 
            $proj_query = "SELECT * FROM projects ORDER BY date DESC";
            $projects = fetch_all($proj_query);
            if(!is_null($projects)){
              $i = 0;
              foreach ($projects as $project) {
                ?>
                <div class='warp' class='span-12' >
                  <img src='<?php echo $project['image_location']; ?>' class='img-rounded'>
                  <div class='warp_desc'>
                    <h5><?php echo $project['title'] ?></h5>
                    <label>Date: </label><p><?php echo $project['date']; ?></p>
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
      </div><!-- end of .row-fluid -->
      <div id='wrapper3' class='row-fluid'>
        <div id='topbar2' class='row-fluid'>
          <div class='span-12'>
            <ul>
              <li id='back_to_warp'><a href='#'><i class='icon-arrow-left icon-white'></i>Back to Portfolio</a></li>
            </ul>
          </div><!-- end of .span-12 -->
        </div><!-- end of #topbar2 -->
        <div class='row'>
          <div id='project_nav' class='col-xs-2 col-md-2 col-lg-2'>
            <div id='nav_open' class='pull-right'>
              <img src='assets/fonts/svgs/fi-list.svg'>
            </div><!-- end of #nav_open -->
            <div id='project_accord'>
              <!-- start php script for project accordion -->
              <?php 
                $proj_query = "SELECT * FROM projects ORDER BY date DESC";
                $projects = fetch_all($proj_query);
                if(!is_null($projects)){
                  $i = 0;
                  foreach ($projects as $project) {
                    ?>
                    <h3 id='project<?php echo $i; ?>' data-link='<?php echo $project['url']; ?>' class='proj_link_a'><?php echo $project['title']; ?></a></h3>
                      <div>
                        <p>Description: <?php echo $project['description']; ?></p>
                        <p>Technical description:  <?php echo $project['tech_info']; ?></p>
                      </div>
                    <?php
                    $i++;
                  }
                }
              ?>
            </div><!-- end of #project_accord -->
          </div><!-- end of #project nav -->
          <div id='iframe' class='col-xs-10 col-md-10 col-lg-10'>
            <iframe src='' id='project_view_screen' sandbox='allow-same-origin allow-scripts allow-forms allow-top-navigation' class='span-10'></iframe>
          </div><!-- end of #iframe -->
        </div><!-- end of .row -->
      </div><!-- end of #wrapper3 .row -->
      <div id = 'wrapper2' class='span12'>
        <div class='reveal'>
          <div class = 'slides row'> 
            <section id='home' class='span12'>
              <h2>Welcome to</h2>
              <h1>Paul's Launchpad</h1>
            </section>
            <section id='bio' class='span12'>
              <h1 class='pointer'>Bio</h1>
              <div id='biopanel' class='row'>
                <div class='span12'>
                  <img src="assets/images/paulzellmerbio.jpg" alt="Paul Zellmer Junior Web Developer" class="pull-left img-circle img-responsive">
                  <p class='pull-right'>Hello there!!! My name is Paul Zellmer and I am a recent alumnus of the coding boot camp Coding Dojo.  During my time in the boot camp I trained and developed skills in:</p>
                      <ul>
                        <li>PHP</li>
                        <li>JavaScript</li>
                        <li>Ruby</li>
                      </ul>
                  <p class='pull-right'>I have found a love for not only the problem solving and troubleshooting aspects of web development but also the design aspect... even if troubleshooting sometimes makes you want to pull out your hair.</p>
                  <p class='pull-right'>So please explore my site, if you have any questions or are interested in hiring me please <a href="index.php#/contact">contact me</a>.</p>
              </div>
            </section>
            <section id='skills' class='span12'>
              <h1>Skill Set</h1>
              <div tagcloud bw>
                Website Design
                HTML5
                CSS3
                d3 JS
                Foundation
                jQuery UI
                Twitter Bootstrap
                jQuery
                JavaScript
                Node JS
                Express
                Angular
                MongoDB
                npm
                socket.io
                Git
                Ruby
                PHP
                AJAX
                Ruby on Rails
                Database Design
                MySQL
                SQLite
                CodeIgniter
                PostgreSQL
                Adobe Photoshop
              </div>
            </section>
            <section id='portfolio' class='span12'>
              <h2>Enter my</h2>
              <h1 class='pointer'>Portfolio</h1>
            </section>
            <section id='resume' class='span12'>
              <div class='row'>
                <div id='resumepanel' class='span12'>
                  <button class='close pull-right'>&times;</button>
                  <iframe src="http://docs.google.com/viewer?url=http%3A%2F%2Fwww.pazellmer.com%2Fresume.pdf&embedded=true" id='resumeviewer'></iframe>
                </div><!-- end of #resumepanel -->
                <h1 class='pointer'>Resum&eacute;</h1>
              </div><!-- end of row -->
            </section>
            <section id='contact' class='span12'>
              <h1 class='pointer'>Contact</h1>
                <table>
                  <tbody>
                    <tr>
                      <td>
                        <table id='contactinfo'>
                          <tbody>
                            <tr>
                              <td><a href='mailto:paul@pazellmer.com'><img src='/assets/fonts/svgs/fi-mail.svg'></td>
                              <td><span class='small'>Mail Me: <a href='mailto:paul@pazellmer.com'>paul@pazellmer.com</a></span></td>
                            </tr>
                            <tr>
                              <td><a href='http://www.linkedin.com/in/paulzellmer9/'><img src='/assets/images/linkedin.svg'></a></td>
                              <td><span class='small'>LinkedIn: <a href='http://www.linkedin.com/in/paulzellmer9/'>paulzellmer9</a></span></td>
                            </tr>
                            <tr>
                              <td><a href='skype:pzellmer81?call'><img src='/assets/fonts/svgs/fi-social-skype.svg'></a></td>
                              <td><span class='small'>Skype: <a href='skype:pzellmer81?chat'>pzellmer81</a></span></td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                      <td>
                        <div id='contactpanel'>
                          <div class='alert alert-success' id='form_success'>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <p>Thank you for your interest, your message has been sent!</p>
                          </div><!-- end of #form_success -->
                          <div class='alert alert-error' id='form_failure'>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <p>I am sorry there was an issues sending your message please try again.</p>
                          </div><!-- end of #form_failure -->
                          <form id='contact_form' action='email.php' method='post'>
                            <input type='hidden' name='secure' value='secure'>
                            <input type='text' name='name' placeholder='Your name' class='input-block-level' required>
                            <div class="input-prepend pull-left">
                              <span class="add-on"><i class="icon-envelope"></i></span>
                              <input type='email' name='email' placeholder='Your E-mail Address' class="input-xxlarge" required>
                            </div>
                            <input type='text' name='subject' class='input-block-level' placeholder='Subject'>
                            <textarea name='message' rows='4' class='input-block-level' placeholder='message' required></textarea>
                            <input type='submit' value='Send' class='btn pull-right'>
                          </form>
                        </div><!-- end of #contactpanel -->
                      </td>
                    </tr>
                  </tbody>
                </table>
            </section>
            <section id='profiles' class='span12'>
              <h1 class='pointer'>Profiles</h1>
              <a href='http://github.com/pazell981'><img src='/assets/images/github.svg'></a>
              <a href='http://www.linkedin.com/in/paulzellmer9/'><img src='/assets/images/linkedin.svg'></a>
              <a href='http://www.beknown.com/paul-zellmer'><img src='/assets/images/monster.svg'></a>
              <a href='http://www.angel.co/paul-zellmer'><img src='/assets/images/angellist.svg'></a>
            </section>
          </div><!-- end of #slides .row-fluid -->
        </div><!-- end of .reveal -->
        <div id='control' >
          <p id='pi' class='pointer'>&pi;</p>
          <div id='controlpanel' class='info'>
            <button class='close pull-right'>&times;</button>
            <h1>I am sorry you are not allowed to administer this site!</h1>
          </div><!-- end of #controlpanel -->
          <div id='controlpanelallowed' class='info'>
            <button class='close pull-right'>&times;</button>
            <?php
              if($errors['email']==TRUE){
                echo "$('#controlpanelallowed').slideToggle()";
                echo "<h3 class='error'>There was an error verifying your e-mail, please try to log-in again or <a href='register.php'>create a new account</a>.</h3>";
              }
              if($errors['password']==TRUE){
                echo "$('#controlpanelallowed').slideToggle()";
                echo "<h3 class='error'>There was an error verifying your password, please try to log-in again.</h3>";
              }
            ?>
            <h3 class='pull-left'>Please login:</h3>
              <form action='login.php' method='post'>
                <input type='hidden' value='secure' name='secure'>
                <input type='text' placeholder='E-mail' name='email'>
                <input type='password' placeholder='Password' name='password'>
                <input type='submit' class='btn btn-info btn-large'>
              </form>
          </div><!-- end of #controlpanelallowed -->
        </div><!-- end of #control -->
      </div><!-- end of #wrapper2 .span12 -->
    </div><!-- end of .row-fluid -->
    <script src="lib/js/head.min.js"></script>
    <script src="lib/js/reveal.min.js"></script>
    <script src="/assets/javascripts/warp.js" charset="utf-8"></script>
    <script src="/assets/javascripts/portfolio.js" charset="utf-8"></script>
    
    <script>
      <!-- Reveal JS Code -->
      Reveal.initialize({
        controls: true,
        progress: false,
        history: false,
        center: true,
        loop: true,
        touch: true,
        keyboard: true,
        overview: true,
        viewDistance: 3,

          theme: Reveal.getQueryHash().theme,
          transition: Reveal.getQueryHash().transition || 'default', // default/cube/page/concave/zoom/linear/fade/none

          dependencies: [
          { src: 'lib/js/classList.js', condition: function() { return !document.body.classList; } },
          { src: 'plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
          { src: 'plugin/tagcloud/tagcloud.js', async: true},
          { src: 'plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
          { src: 'plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
              // 
              ]
            });

      <!-- Google Analytics Code -->
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-55360839-1', 'auto');
      ga('require', 'displayfeatures');
      ga('send', 'pageview');

    </script>
  </body>
</html>