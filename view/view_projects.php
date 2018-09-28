<?php

function displayhtml($result) {
  ob_start(); ?>

  <div class="col-12 col-lg-3">
      <h2><?php echo $result['name']; ?></h2>
      <p>Date limite : <?php echo $result["deadline"]; ?></p>
      <a href="index.php?delete=<?php echo $result['id']; ?>">&#10060;</a>
  </div>

  <?php
   $content = ob_get_clean();
   return $content;
}

 ?>

 <!doctype html>
 <html class="no-js" lang="fr">

   <head>
     <meta charset="utf-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title><?php echo $title; ?></title>
     <meta name="description" content="<?php echo $descript; ?>">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link rel="manifest" href="site.webmanifest">
     <link rel="apple-touch-icon" href="icon.png">
     <!-- Place favicon.ico in the root directory -->
     <!--32x32 le favicon -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
     <link rel="stylesheet" href="public/css/normalize.css">
     <link rel="stylesheet" href="public/css/main.css">
   </head>

   <body class="container">
     <?php //require('header.php'); ?>
     <section class="row">
       <?php
       while ($result = $data->fetch()) {
         echo displayhtml($result);
       }
       ?>

     </section>

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
     <script src="js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
     <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
     <script src="js/plugins.js"></script>
     <script src="js/main.js"></script>

     <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
     <script>
       window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
       ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
     </script>
     <script src="https://www.google-analytics.com/analytics.js" async defer></script>
   </body>

   </html>
