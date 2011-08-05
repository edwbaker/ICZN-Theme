<dt class="title">
  <a href="<?php print $url; ?>"><?php print $title; ?></a>
</dt>
<dd>
  <?php if ($snippet) : ?>
    <p class="search-snippet"><?php print $snippet; ?></p>
  <?php endif; ?>
  <?php if ($info) : ?>
  <?php //Check whether node type is biblio, if so: get more data!
  if ($info_split['type'] == 'Biblio') {
	  $info_split['journal'] = $result['node']->biblio_secondary_title;
	  $info_split['volume'] = $result['node']->biblio_volume; 
	  $info_split['issue'] = $result['node']->biblio_issue;
	  $info_split['pages'] = $result['node']->biblio_pages;
	  $iczn_biblio_ref = '<em>'.$info_split['journal'].'</em> <strong>'.$info_split['volume'].'</strong>('.$info_split['issue'].'):'.$info_split['pages'];
	  ?>
	  <p class="search-info"><?php print $iczn_biblio_ref; ?></p>
  <?php
  } 
  else { ?>
  <p class="search-info"><?php print $info_split['type']; ?></p>
  <?php } endif; ?> 
</dd>
