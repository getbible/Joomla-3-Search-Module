<?php
/**
* 
* 	@version 	1.0.1  November 7, 2014
* 	@package 	Get Bible - Search Module
* 	@author  	Llewellyn van der Merwe <llewellyn@vdm.io>
* 	@copyright	Copyright (C) 2013 Vast Development Method <http://www.vdm.io>
* 	@license	GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
*
**/
defined( '_JEXEC' ) or die;

?>
<?php if($params->get('mode')): ?>
<button class="uk-button searchbuttons" data-uk-offcanvas="{target:'#search_<?php echo $module->uniqueId; ?>'}"><?php echo $params->get('search_button'); ?></button>

<div id="search_<?php echo $module->uniqueId; ?>" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
        <form action="<?php echo $module->action; ?>" class="uk-form uk-search" id="search_form_<?php echo $module->uniqueId; ?>" method="post">
            <input class="uk-search-field" type="input" name="search" placeholder="<?php echo $params->get('search_phrase'); ?>">
            <?php if($params->get('search_options') == 1): ?>
                <div class="uk-margin">
                    <input class="uk-button" type="submit"  value="Search">
                </div>
            <?php endif; ?>
            <input 
            	class="uk-hidden" type="hidden" name="search_crit" id="search_crit_<?php echo $module->uniqueId; ?>" 
            	value="<?php echo $params->get('search_crit1'); ?>_<?php echo $params->get('search_crit2'); ?>_<?php echo $params->get('search_crit3'); ?>"
             >
            <input class="uk-hidden" type="hidden" name="search_type" id="search_type_<?php echo $module->uniqueId; ?>" value="<?php echo $params->get('search_type'); ?>">
            <input class="uk-hidden" type="hidden" name="search_version" id="search_version_<?php echo $module->uniqueId; ?>" value="<?php echo $params->get('version'); ?>">
            <input class="uk-hidden" type="hidden" name="search_app" id="search_app_<?php echo $module->uniqueId; ?>" value="true">
        </form>
		<?php if($params->get('search_options') == 1): ?>
        <div class="uk-panel uk-container-center">
            <div class="uk-margin">
                <div class="uk-button-group"  data-uk-button-radio="">
                    <?php 
                        switch($params->get('search_crit1')){
                            case 1:
                            $active_crit1_1 = 'uk-active'; $active_crit1_2 = ''; $active_crit1_3 = '';
                            break;
                            
                            case 2:
                            $active_crit1_1 = ''; $active_crit1_2 = 'uk-active'; $active_crit1_3 = '';
                            break;
                            
                            case 3:
                            $active_crit1_1 = ''; $active_crit1_2 = ''; $active_crit1_3 = 'uk-active';
                            break;
                        }
                    ?>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_1 ?> search_crit1_<?php echo $module->uniqueId; ?>" value="1"><?php echo JText::_('MOD_GETBIBLESEARCH_ALL_WORDS'); ?></button>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_2 ?> search_crit1_<?php echo $module->uniqueId; ?>" value="2"><?php echo JText::_('MOD_GETBIBLESEARCH_ANY_WORDS'); ?></button>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_3 ?> search_crit1_<?php echo $module->uniqueId; ?>" value="3"><?php echo JText::_('MOD_GETBIBLESEARCH_PHRASE'); ?></button>
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-button-group"  data-uk-button-radio="">
                    <?php 
                        switch($params->get('search_type')){
                            case 'all':
                            $active_type_all = 'uk-active'; $active_type_ot = ''; $active_type_nt = '';
                            break;
                            
                            case 'ot':
                            $active_type_all = ''; $active_type_ot = 'uk-active'; $active_type_nt = '';
                            break;
                            
                            case 'nt':
                            $active_type_all = ''; $active_type_ot = ''; $active_type_nt = 'uk-active';
                            break;
                        }
                    ?>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_type_all ?> search_type_<?php echo $module->uniqueId; ?>" value="all"><?php echo JText::_('MOD_GETBIBLESEARCH_BIBLE'); ?></button>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_type_ot ?> search_type_<?php echo $module->uniqueId; ?>" value="ot"><?php echo JText::_('MOD_GETBIBLESEARCH_OT'); ?></button>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_type_nt ?> search_type_<?php echo $module->uniqueId; ?>" value="nt"><?php echo JText::_('MOD_GETBIBLESEARCH_NT'); ?></button>
                    <button type="button" class="uk-button uk-button-primary search_type" id="search_book_<?php echo $module->uniqueId; ?>" ><?php echo JText::_('MOD_GETBIBLESEARCH_A_BOOK'); ?></button>
                </div>
            </div>
            <div class="uk-margin books_<?php echo $module->uniqueId; ?>" style="display:none;">
                <select id="books_<?php echo $module->uniqueId; ?>" class="uk-margin-small-top" >
                </select>
            </div>
            <div class="uk-margin">
                <div class="uk-button-group"  data-uk-button-radio="">
                    <?php 
                        switch($params->get('search_crit2')){
                            case 1:
                            $active_crit2_1 = 'uk-active'; $active_crit2_2 = '';;
                            break;
                            
                            case 2:
                            $active_crit2_1 = ''; $active_crit2_2 = 'uk-active';;
                            break;
                        }
                    ?>
                    <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit2_1 ?> search_crit2_<?php echo $module->uniqueId; ?>" type="button" value="1"><?php echo JText::_('MOD_GETBIBLESEARCH_EXACT_MATCH'); ?></button>
                    <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit2_2 ?> search_crit2_<?php echo $module->uniqueId; ?>" type="button" value="2"><?php echo JText::_('MOD_GETBIBLESEARCH_PARTIAL_MATCH'); ?></button>
                 </div>
            </div>
            <div class="uk-margin">
                <div class="uk-button-group"  data-uk-button-radio="">
                    <?php 
                        switch($params->get('search_crit3')){
                            case 1:
                            $active_crit3_1 = 'uk-active'; $active_crit3_2 = '';;
                            break;
                            
                            case 2:
                            $active_crit3_1 = ''; $active_crit3_2 = 'uk-active';;
                            break;
                        }
                    ?>
                    <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit3_1 ?> search_crit3_<?php echo $module->uniqueId; ?>" type="button" value="1"><?php echo JText::_('MOD_GETBIBLESEARCH_CASE_INSENSITIVE'); ?></button>
                    <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit3_2 ?> search_crit3_<?php echo $module->uniqueId; ?>" type="button" value="2"><?php echo JText::_('MOD_GETBIBLESEARCH_CASE_SENSITIVE'); ?></button>
                 </div>
            </div>
            <div class="uk-margin">
                <select class="uk-margin-small-top search_version_<?php echo $module->uniqueId; ?>" >
                    <?php foreach($module->versions as $key => $version): ?>
                        <?php if($key == $params->get('version')) :?>
                            <option value="<?php echo $key; ?>" selected="selected" >(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $key; ?>">(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php else: ?>

<div id="getbible_search">
	<form action="<?php echo $module->action; ?>" class="uk-search" id="search_form_<?php echo $module->uniqueId; ?>" method="post">
        <input class="uk-search-field" type="input" name="search" placeholder="<?php echo $params->get('search_phrase'); ?>">
        <?php if($params->get('search_options') == 1): ?>
            <div class="uk-margin">
                <input class="uk-button" type="submit"  value="Search">
            </div>
        <?php endif; ?>
        <input 
            class="uk-hidden" type="hidden" name="search_crit" id="search_crit_<?php echo $module->uniqueId; ?>" 
            value="<?php echo $params->get('search_crit1'); ?>_<?php echo $params->get('search_crit2'); ?>_<?php echo $params->get('search_crit3'); ?>"
         >
        <input class="uk-hidden" type="hidden" name="search_type" id="search_type_<?php echo $module->uniqueId; ?>" value="<?php echo $params->get('search_type'); ?>">
        <input class="uk-hidden" type="hidden" name="search_version" id="search_version_<?php echo $module->uniqueId; ?>" value="<?php echo $params->get('version'); ?>">
        <input class="uk-hidden" type="hidden" name="search_app" id="search_app_<?php echo $module->uniqueId; ?>" value="true">
    </form>
	<?php if($params->get('search_options') == 1): ?>
    <div class="uk-panel uk-container-center">
        <div class="uk-margin">
            <div class="uk-button-group"  data-uk-button-radio="">
                <?php 
                    switch($params->get('search_crit1')){
                        case 1:
                        $active_crit1_1 = 'uk-active'; $active_crit1_2 = ''; $active_crit1_3 = '';
                        break;
                        
                        case 2:
                        $active_crit1_1 = ''; $active_crit1_2 = 'uk-active'; $active_crit1_3 = '';
                        break;
                        
                        case 3:
                        $active_crit1_1 = ''; $active_crit1_2 = ''; $active_crit1_3 = 'uk-active';
                        break;
                    }
                ?>
                <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_1 ?> search_crit1_<?php echo $module->uniqueId; ?>" value="1"><?php echo JText::_('MOD_GETBIBLESEARCH_ALL_WORDS'); ?></button>
                <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_2 ?> search_crit1_<?php echo $module->uniqueId; ?>" value="2"><?php echo JText::_('MOD_GETBIBLESEARCH_ANY_WORDS'); ?></button>
                <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_3 ?> search_crit1_<?php echo $module->uniqueId; ?>" value="3"><?php echo JText::_('MOD_GETBIBLESEARCH_PHRASE'); ?></button>
            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-button-group"  data-uk-button-radio="">
                <?php 
                    switch($params->get('search_type')){
                        case 'all':
                        $active_type_all = 'uk-active'; $active_type_ot = ''; $active_type_nt = '';
                        break;
                        
                        case 'ot':
                        $active_type_all = ''; $active_type_ot = 'uk-active'; $active_type_nt = '';
                        break;
                        
                        case 'nt':
                        $active_type_all = ''; $active_type_ot = ''; $active_type_nt = 'uk-active';
                        break;
                    }
                ?>
                <button type="button" class="uk-button uk-button-primary <?php echo $active_type_all ?> search_type_<?php echo $module->uniqueId; ?>" value="all"><?php echo JText::_('MOD_GETBIBLESEARCH_BIBLE'); ?></button>
                <button type="button" class="uk-button uk-button-primary <?php echo $active_type_ot ?> search_type_<?php echo $module->uniqueId; ?>" value="ot"><?php echo JText::_('MOD_GETBIBLESEARCH_OT'); ?></button>
                <button type="button" class="uk-button uk-button-primary <?php echo $active_type_nt ?> search_type_<?php echo $module->uniqueId; ?>" value="nt"><?php echo JText::_('MOD_GETBIBLESEARCH_NT'); ?></button>
                <button type="button" class="uk-button uk-button-primary search_type" id="search_book_<?php echo $module->uniqueId; ?>" ><?php echo JText::_('MOD_GETBIBLESEARCH_A_BOOK'); ?></button>
            </div>
        </div>
        <div class="uk-margin books_<?php echo $module->uniqueId; ?>" style="display:none;">
            <select id="books_<?php echo $module->uniqueId; ?>" class="uk-margin-small-top">
            </select>
        </div>
        <div class="uk-margin">
            <div class="uk-button-group"  data-uk-button-radio="">
                <?php 
                    switch($params->get('search_crit2')){
                        case 1:
                        $active_crit2_1 = 'uk-active'; $active_crit2_2 = '';;
                        break;
                        
                        case 2:
                        $active_crit2_1 = ''; $active_crit2_2 = 'uk-active';;
                        break;
                    }
                ?>
                <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit2_1 ?> search_crit2_<?php echo $module->uniqueId; ?>" type="button" value="1"><?php echo JText::_('MOD_GETBIBLESEARCH_EXACT_MATCH'); ?></button>
                <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit2_2 ?> search_crit2_<?php echo $module->uniqueId; ?>" type="button" value="2"><?php echo JText::_('MOD_GETBIBLESEARCH_PARTIAL_MATCH'); ?></button>
             </div>
        </div>
        <div class="uk-margin">
            <div class="uk-button-group"  data-uk-button-radio="">
                <?php 
                    switch($params->get('search_crit3')){
                        case 1:
                        $active_crit3_1 = 'uk-active'; $active_crit3_2 = '';;
                        break;
                        
                        case 2:
                        $active_crit3_1 = ''; $active_crit3_2 = 'uk-active';;
                        break;
                    }
                ?>
                <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit3_1 ?> search_crit3_<?php echo $module->uniqueId; ?>" type="button" value="1"><?php echo JText::_('MOD_GETBIBLESEARCH_CASE_INSENSITIVE'); ?></button>
                <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit3_2 ?> search_crit3_<?php echo $module->uniqueId; ?>" type="button" value="2"><?php echo JText::_('MOD_GETBIBLESEARCH_CASE_SENSITIVE'); ?></button>
             </div>
        </div>
        <div class="uk-margin">
            <select class="uk-margin-small-top search_version_<?php echo $module->uniqueId; ?>" >
                <?php foreach($module->versions as $key => $version): ?>
                    <?php if($key == $params->get('version')) :?>
                        <option value="<?php echo $key; ?>" selected="selected" >(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $key; ?>">(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>
<?php if($params->get('search_options') == 1): ?>
<script type="application/javascript">
jQuery(document).ready(function() {
// set the criteria for the search
	var crit1 = 1;
	var crit2 = 1;
	var crit3 = 1;
	jQuery('.search_crit1_<?php echo $module->uniqueId; ?>').click(function() {
		crit1 = jQuery(this).attr("value");
		setCrit();
	});
	jQuery('.search_crit2_<?php echo $module->uniqueId; ?>').click(function() {
		crit2 = jQuery(this).attr("value");
		setCrit();
	});
	jQuery('.search_crit3_<?php echo $module->uniqueId; ?>').click(function() {
		crit3 = jQuery(this).attr("value");
		setCrit();
	});
	function setCrit(){
		jQuery('#search_crit_<?php echo $module->uniqueId; ?>').val(crit1+'_'+crit2+'_'+crit3);
	}
	// set the type of search
	jQuery('.search_type_<?php echo $module->uniqueId; ?>').click(function() {
		jQuery('#search_type_<?php echo $module->uniqueId; ?>').val(jQuery(this).attr("value"));
		jQuery('.books_<?php echo $module->uniqueId; ?>').hide();
		jQuery('#books_<?php echo $module->uniqueId; ?>').empty();
	});
	
	// set the search version
	jQuery('.search_version_<?php echo $module->uniqueId; ?>').change(function() {
		jQuery('#search_version_<?php echo $module->uniqueId; ?>').val(jQuery(this).attr("value"));
		BookVersion = jQuery(this).attr("value");
		if(jQuery('.books_<?php echo $module->uniqueId; ?>').is(":visible")){
			getDataBo(BookVersion);
		}
	});
	
	// set the search book ref
	jQuery('#books_<?php echo $module->uniqueId; ?>').change(function() {
		jQuery('#search_type_<?php echo $module->uniqueId; ?>').val(jQuery(this).attr("value"));
	})
	
	var BookVersion = '<?php echo $params->get('version'); ?>';
	// set the books selection options
	jQuery('#search_book_<?php echo $module->uniqueId; ?>').click(function() {
		getDataBo(BookVersion);
		jQuery('.books_<?php echo $module->uniqueId; ?>').show();
	});
	
});
<?php

if ($module->params->get('jsonQueryOptions') == 1){
	// loacal
} elseif ($module->params->get('jsonQueryOptions') == 2) {
	echo "var cPanelUrl_".$module->uniqueId." = 'https://getbible.net/';";
} else {
	echo "var cPanelUrl_".$module->uniqueId." = 'http://getbible.net/';";
}

?>
// Ajax Call to get Books
function getDataBo(version) {
	jQuery('#books_<?php echo $module->uniqueId; ?>').empty();
	if (typeof cPanelUrl_<?php echo $module->uniqueId; ?> !== 'undefined') {
		getUrl = cPanelUrl_<?php echo $module->uniqueId; ?>+"index.php?option=com_getbible&task=bible.books&format=json";     	
	} else {
		getUrl = "index.php?option=com_getbible&task=bible.books&format=json";
	}
	jQuery.ajax({
		type: "GET",
		dataType: "jsonp",
		url: getUrl,
		// the name of the callback parameter, as specified by the getBible API
		jsonp: "callback",
		data: { v: version }
	})
	.done(function( json ) {
			var op = new Option('- Select Book -', '');
			/// jquerify the DOM object 'o' so we can use the html method
			jQuery(op).html('- Select Book -');
			jQuery('#books_<?php echo $module->uniqueId; ?>').append(op);
		jQuery.each(json, function() {
				var str = this.ref.replace(/\s+/g, '');
				var op = new Option(this.book_name, str);
				/// jquerify the DOM object 'o' so we can use the html method
				jQuery(op).html(this.book_name);
				jQuery('#books_<?php echo $module->uniqueId; ?>').append(op);
        });
	});
}
</script>
<?php endif; ?>