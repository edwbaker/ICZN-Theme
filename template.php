<?php
/**
  * ICZN (International Commission on Zoological Nomenclature) Theme for Drupal 6.x
  * ===============================================================================
  *
  * template.php (PHPTemplate file)
  * 
  * Developed by Ed Baker (http://ebaker.me.uk) for the ICZN (http://iczn.org)
  *
  * Revision: 20100601
  */


function phptemplate_preprocess_page(&$variables) {
  /*
   * Provides alternative breadcrumbs for trails for:
   *  - biblio nodes (articles in Bulletin of Zoologival Nomenclature)
   *  - profile nodes (for Secretariat staff, Trustees & Commissioners)
   */

  if ($variables['node']->type == 'biblio') {
    //Set vid to BZN Volume/Issue taxonomy
    $BZN_vid = 14;
  
    $vi_links = array();
    
	//Get first term
	$terms = taxonomy_node_get_terms_by_vocabulary($variables['node'], $BZN_vid, $key = 'tid');
	
	//Check for parents (use first value only, there should be no multiple terms)
	$parents = taxonomy_get_parents_all($terms[1]->tid, 'tid');
	
	foreach ($parents as $parent) { //add parent terms to breadcrumb trail
	  $vi_links[] = l($parent->name, 'taxonomy/term/'.$parent->tid);
	}

    //Replace existing breadcrumb
    $variables['breadcrumb'] = theme('breadcrumb', array_reverse($vi_links));
  }

  if ($variables['node']->type == 'profile') {
    //Get roles for profile and build breadcrumb array
    $role_links = array();
	$role_links[] = l('About the ICZN', 'content/about-iczn');
	
	switch ($variables['node']->field_iczn_section[0]['value']) {
	  case "Trustee":
	    $role_links[] = l('Trustees', 'trustees');
		break;
	  case "Secretariat":
	    $role_links[] = l('Secretariat', 'secretariat');
		break;
	  case "Commissioner":
	    $role_links[] = l('Commissioners', 'commissioners');
		break;
	}
  
    //Replace existing breadcrumb
    $variables['breadcrumb'] = theme('breadcrumb', $role_links);
  }
}
?>