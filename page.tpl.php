<!--
  * ICZN (International Commission on Zoological Nomenclature) Theme for Drupal 6.x
  * ===============================================================================
  *
  * page.tpl.php (PHPTemplate file)
  * 
  * Developed by Ed Baker (http://ebaker.me.uk) for the ICZN (http://iczn.org)
  *
  * Revision: 20100601
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
      xml:lang="<?php print $language->language ?>" 
	  lang="<?php print $language->language ?>" 
	  dir="<?php print $language->dir ?>"
>

<head>
  <title>
    <?php print $head_title; ?>
  </title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>

<body class="<?php print $body_classes; ?>">
  <div id="page-wrapper">
    <!-- secondary links -->
    <?php if ($secondary_links): ?>
      <div id="secondary-links">
      <?php print theme('links', $secondary_links); ?>
      </div>
    <?php endif; ?>

	<!-- BEGIN Header -->
    <div id="header-wrapper">
      <!-- site name -->
      <div id="sitename">
          <div id="logo-area">
	      <?php if ($logo) { ?><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>">
          <img class="iczn_logo" src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a><?php } ?>
	      </div>
		  <div id="header-text">
            <h1>International Commission <br/>on Zoological Nomenclature</h1>
		  </div>
      </div>

      <!-- Region: header -->
      <?php if ($header): ?>
        <div id="header-region">
          <?php print $header; ?>
        </div>
      <?php endif; ?>
    </div>

    <div id="slogan-area">
      <div id="slogan-text"
	    <p>standards, sense, and stability for animal names in science</p>
	  </div>
    </div>

    <!-- BEGIN Center Content -->
      <div id="main-wrapper">
        <!-- Region: sidebar left -->
        <?php if ($left): ?>
          <div id="sidebar-left-region">
            <?php if ($search_box): ?><div id="search-box"><?php print $search_box ?></div><?php endif; ?>
            <?php print $left; ?>
          </div>
        <?php endif; ?>

        <div id="content-wrapper">
		  <div id="breadcrumb">
		      <?php if ($breadcrumb) : ?>
			  <?php print $breadcrumb; ?>
			  <?php endif; ?>
		  </div>
		  <!-- tabs -->
          <?php if ($tabs): ?>
            <div class="tabs">
              <?php print $tabs; ?>
            </div>
          <?php endif; ?>
		            
		<div id="content">
            <!-- title -->
            <?php if ($title): ?>
              <h2 class="content-title"><?php print $title; ?></h2>
            <?php endif; ?>

            <!-- help -->
            <?php print $help; ?>

			<!-- messages -->
            <?php print $messages; ?>

			<!-- Region: content -->
            <?php print $content; ?>
          </div>
        </div>
      </div>
      <!-- END Content Area -->

	  <!-- BEGIN Footer -->
	    <!-- Region: footer -->
		<div id="footer-region">
		  <?php print $footer; ?>
          <div style="width:100% !important; width:860px; background:#063455">
            <div id="iczn-img-footer" style="height:75px;">
			</div>
          </div>
		  
		  <!-- feed icons -->
          <div id="feed-icons">
            <?php print $feed_icons; ?>
          </div>

		  <!-- footer text -->
		  <div id="footer-text">
            <?php print $footer_message; ?>
		  </div>
        </div>
      </div>
	  
	  <?php print $closure; ?>


	  
	  <!-- JavaScript for ICZN Image Footer -->
	  <script type="text/javascript">
        window.onresize = generateFooter;
        window.onload= generateFooter;

        function generateFooter() { //Used to calculate number of images to display, then display them
          //Define some facts about the images
          var imageSize = 75;
		  
		  //Define array of HTML for images
		  var images = new Array();
		  
		  //Define images and hyperlinks
		  images[0] = '<div class="img-foot" style="width: ' + imageSize + 'px"><a href="http://www.iczn.org/content/biodiversity-studies"><img src="http://www.iczn.org/sites/iczn.org/files/images/Felis_silvestris.jpg" height="75px"/></a></div>';
		  images[1] = '<div class="img-foot" style="width: ' + imageSize + 'px"><a href="http://iczn.org/category/history-case/all-cases/cases-3000-present/cases-3400-3499/case-3463"><img src="http://iczn.org/sites/iczn.org/files/images/Giant_Tortoise.thumbnail.JPG" height="75px" /></a></div>';  
          images[2] = '<div class="img-foot" style="width: ' + imageSize + 'px"><a href="http://www.iczn.org/content/conservation"><img src="http://www.iczn.org/sites/iczn.org/files/images/Varanus_gouldii.jpg" height="75px" /></a></div>';
          images[3] = '<div class="img-foot" style="width: ' + imageSize + 'px"><a href="http://iczn.org/category/history-case/all-cases/cases-3000-present/cases-3400-3499/case-3407"><img src="http://iczn.org/sites/iczn.org/files/images/Drosophila_melanogaster_-_top_(aka).jpg" height="75px" /></a></div>';
          images[4] = '<div class="img-foot" style="width: ' + imageSize + 'px"><a href="http://www.iczn.org/content/otala-punctata"><img src="http://www.iczn.org/sites/iczn.org/files/images/Otala_punctata_sq.JPG" height="75px" /></a></div>';

          //Calculate number of items that fit
		  var totalWidth = document.getElementById("iczn-img-footer").offsetWidth;
		  var imageNumber = parseInt(totalWidth / imageSize);
		  var croppedImageSize = totalWidth - imageNumber * imageSize;
		  var numImages = images.length;
  
          //Output HTML
          var output = '';
          output += '<div id="first-iczn-img" style="width:' + (croppedImageSize/2) + 'px"></div>';;
          for (var i=0; i<(imageNumber); i++) {
            output += images[(i % numImages)];
		  }
          output += '<div id="final-iczn-img" style="width:' + (croppedImageSize/2 - 1) + 'px"></div>';
          document.getElementById("iczn-img-footer").innerHTML = output;
        }
      </script>
</body>
</html>