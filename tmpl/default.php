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

if($params->get('search_mode') == 2){
	switch($params->get('mode_set')){
		case 1:
		$submit_search 	= '';
		$submit_load	= 'style="display:none;"';
		$search_button 	= 'uk-active';
		$load_button	= '';
		
		break;
		case 2:
		$submit_search 	= 'style="display:none;"';
		$submit_load	= '';
		$search_button 	= '';
		$load_button	= 'uk-active';
		break;
		
	}
} else {
	$submit_search 	= '';
	$submit_load	= 'style="display:none;"';
}
?>
<?php if($params->get('display_mode') == 1): ?>
	<?php if($params->get('search_display') == 1): ?>
    <form class="uk-form">
        <fieldset data-uk-margin="">
            <button class="uk-button submit_search_<?php echo $module->uniqueId; ?>" data-uk-offcanvas="{target:'#search_scripture_<?php echo $module->uniqueId; ?>'}" <?php echo $submit_search; ?>><i class="uk-icon-search"></i> <?php echo $params->get('search_button'); ?></button>
            <?php if($params->get('search_mode') == 2): ?>
			<button class="uk-button submit_load_<?php echo $module->uniqueId; ?>" data-uk-offcanvas="{target:'#search_scripture_<?php echo $module->uniqueId; ?>'}" <?php echo $submit_load; ?>><i class="uk-icon-book"></i> <?php echo $params->get('load_button'); ?></button>
            <?php endif; ?>
    <?php elseif($params->get('search_display') == 2):?>
    <form action="<?php echo $module->action; ?>" class="uk-form uk-search" id="search_form" method="post">
        <fieldset data-uk-margin="">
            <input class="search_field_<?php echo $module->uniqueId; ?> uk-search-field" type="input" name="search" placeholder="<?php echo $params->get('search_phrase'); ?>" <?php echo $submit_search; ?>>
            <input type="submit" style="display:none;" >
            <input  class="uk-hidden search_crit_<?php echo $module->uniqueId; ?>" type="hidden" name="search_crit"  
            value="<?php echo $params->get('search_crit1'); ?>_<?php echo $params->get('search_crit2'); ?>_<?php echo $params->get('search_crit3'); ?>" >
            <input class="uk-hidden search_type_<?php echo $module->uniqueId; ?>" type="hidden" name="search_type" value="<?php echo $params->get('search_type'); ?>">
            <input class="uk-hidden search_version_<?php echo $module->uniqueId; ?>" type="hidden" name="search_version" value="<?php echo $params->get('version'); ?>">
            <input class="uk-hidden search_app_<?php echo $module->uniqueId; ?>" type="hidden" name="search_app" value="1"> 
            <input class="uk-hidden load_app_<?php echo $module->uniqueId; ?>" type="hidden" name="load_app" value="0"> 
    <?php elseif($params->get('search_display') == 3):?>
    <form action="<?php echo $module->action; ?>" class="uk-form uk-search" id="search_form" method="post">
        <fieldset data-uk-margin="">
			<?php if($params->get('search_mode') == 2): ?>
            <input class="passage_<?php echo $module->uniqueId; ?> uk-search-field" type="input" name="passage" placeholder="<?php echo $params->get('load_phrase'); ?>" <?php echo $submit_load; ?>>
            <input class="uk-button submit_load_<?php echo $module->uniqueId; ?>" type="submit"  value="<?php echo $params->get('load_button'); ?>" <?php echo $submit_load; ?>>
            <?php endif; ?>
            <input class="search_field_<?php echo $module->uniqueId; ?> uk-search-field" type="input" name="search" placeholder="<?php echo $params->get('search_phrase'); ?>" <?php echo $submit_search; ?>>
            <input class="uk-button submit_search_<?php echo $module->uniqueId; ?>" type="submit"  value="<?php echo $params->get('search_button'); ?>" <?php echo $submit_search; ?>>
            <input  class="uk-hidden search_crit_<?php echo $module->uniqueId; ?>" type="hidden" name="search_crit"  
            value="<?php echo $params->get('search_crit1'); ?>_<?php echo $params->get('search_crit2'); ?>_<?php echo $params->get('search_crit3'); ?>" >
            <input class="uk-hidden search_type_<?php echo $module->uniqueId; ?>" type="hidden" name="search_type" value="<?php echo $params->get('search_type'); ?>">
            <input class="uk-hidden search_version_<?php echo $module->uniqueId; ?>" type="hidden" name="search_version" value="<?php echo $params->get('version'); ?>">
            <input class="uk-hidden search_app_<?php echo $module->uniqueId; ?>" type="hidden" name="search_app" value="1"> 
            <input class="uk-hidden load_app_<?php echo $module->uniqueId; ?>" type="hidden" name="load_app" value="0"> 
    <?php elseif($params->get('search_display') == 4):?>
    <form action="<?php echo $module->action; ?>" class="uk-form uk-search" id="search_form" method="post">
        <fieldset data-uk-margin="">
			<?php if($params->get('search_mode') == 2): ?>
            <input class="passage_<?php echo $module->uniqueId; ?> uk-search-field" type="input" name="passage" placeholder="<?php echo $params->get('load_phrase'); ?>" <?php echo $submit_load; ?>>
            <input class="uk-button submit_load_<?php echo $module->uniqueId; ?>" type="submit"  value="<?php echo $params->get('load_button'); ?>" <?php echo $submit_load; ?>>
            <?php endif; ?>
            <input class="search_field_<?php echo $module->uniqueId; ?> uk-search-field" type="input" name="search" placeholder="<?php echo $params->get('search_phrase'); ?>" <?php echo $submit_search; ?>>
            <input class="uk-button submit_search_<?php echo $module->uniqueId; ?>" type="submit"  value="<?php echo $params->get('search_button'); ?>" <?php echo $submit_search; ?>>
            <?php if($params->get('search_options') == 1 || $params->get('search_mode') == 2): ?>
            <button class="uk-button" data-uk-offcanvas="{target:'#search_scripture_<?php echo $module->uniqueId; ?>'}"><?php echo $params->get('advanced_button'); ?></button>
            <?php endif; ?>
            <input  class="uk-hidden search_crit_<?php echo $module->uniqueId; ?>" type="hidden" name="search_crit"  
            value="<?php echo $params->get('search_crit1'); ?>_<?php echo $params->get('search_crit2'); ?>_<?php echo $params->get('search_crit3'); ?>" >
            <input class="uk-hidden search_type_<?php echo $module->uniqueId; ?>" type="hidden" name="search_type" value="<?php echo $params->get('search_type'); ?>">
            <input class="uk-hidden search_version_<?php echo $module->uniqueId; ?>" type="hidden" name="search_version" value="<?php echo $params->get('version'); ?>">
            <input class="uk-hidden search_app_<?php echo $module->uniqueId; ?>" type="hidden" name="search_app" value="1"> 
            <input class="uk-hidden load_app_<?php echo $module->uniqueId; ?>" type="hidden" name="load_app" value="0"> 
    <?php elseif($params->get('search_display') == 5):?>
    <form action="<?php echo $module->action; ?>" class="uk-form uk-search" id="search_form" method="post">
        <fieldset data-uk-margin="">
			<?php if($params->get('search_mode') == 2): ?>
            <input class="passage_<?php echo $module->uniqueId; ?> uk-search-field" type="input" name="passage" placeholder="<?php echo $params->get('load_phrase'); ?>" <?php echo $submit_load; ?>>
            <?php endif; ?>
            <input class="search_field_<?php echo $module->uniqueId; ?> uk-search-field" type="input" name="search" placeholder="<?php echo $params->get('search_phrase'); ?>">
            <input type="submit" style="display:none;" >
            <?php if($params->get('search_options') == 1 || $params->get('search_mode') == 2): ?>
            <button class="uk-button" data-uk-offcanvas="{target:'#search_scripture_<?php echo $module->uniqueId; ?>'}"><?php echo $params->get('advanced_button'); ?></button>
            <?php endif; ?>
            <input  class="uk-hidden search_crit_<?php echo $module->uniqueId; ?>" type="hidden" name="search_crit"  
            value="<?php echo $params->get('search_crit1'); ?>_<?php echo $params->get('search_crit2'); ?>_<?php echo $params->get('search_crit3'); ?>" >
            <input class="uk-hidden search_type_<?php echo $module->uniqueId; ?>" type="hidden" name="search_type" value="<?php echo $params->get('search_type'); ?>">
            <input class="uk-hidden search_version_<?php echo $module->uniqueId; ?>" type="hidden" name="search_version" value="<?php echo $params->get('version'); ?>">
            <input class="uk-hidden search_app_<?php echo $module->uniqueId; ?>" type="hidden" name="search_app" value="1">  
            <input class="uk-hidden load_app_<?php echo $module->uniqueId; ?>" type="hidden" name="load_app" value="0"> 
    <?php endif; ?>
    	</fieldset>
    </form>

<div id="search_scripture_<?php echo $module->uniqueId; ?>" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
    	<?php if($params->get('search_display') == 1):?>
            <form action="<?php echo $module->action; ?>" class="uk-form uk-search" id="search_form" method="post">
                <input class="search_field_<?php echo $module->uniqueId; ?> uk-search-field" type="input" name="search" placeholder="<?php echo $params->get('search_phrase'); ?>" <?php echo $submit_search; ?>>
                <?php if($params->get('search_mode') == 2): ?>
            	<input class="passage_<?php echo $module->uniqueId; ?> uk-search-field" type="input" name="passage" placeholder="<?php echo $params->get('load_phrase'); ?>" <?php echo $submit_load; ?>>
                <?php endif; ?>
                <?php if($params->get('search_options') == 1): ?>
                    <div class="uk-margin">
                        <input class="uk-button submit_search_<?php echo $module->uniqueId; ?>" type="submit"  value="<?php echo $params->get('search_button'); ?>" <?php echo $submit_search; ?>>
                        <?php if($params->get('search_mode') == 2): ?>
                        <input class="uk-button submit_load_<?php echo $module->uniqueId; ?>" type="submit"  value="<?php echo $params->get('load_button'); ?>" <?php echo $submit_load; ?>>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <input  class="uk-hidden search_crit_<?php echo $module->uniqueId; ?>" type="hidden" name="search_crit"  
                value="<?php echo $params->get('search_crit1'); ?>_<?php echo $params->get('search_crit2'); ?>_<?php echo $params->get('search_crit3'); ?>" >
                <input class="uk-hidden search_type_<?php echo $module->uniqueId; ?>" type="hidden" name="search_type" value="<?php echo $params->get('search_type'); ?>">
                <input class="uk-hidden search_version_<?php echo $module->uniqueId; ?>" type="hidden" name="search_version" value="<?php echo $params->get('version'); ?>">
                <input class="uk-hidden search_app_<?php echo $module->uniqueId; ?>" type="hidden" name="search_app" value="1"> 
                <input class="uk-hidden load_app_<?php echo $module->uniqueId; ?>" type="hidden" name="load_app" value="0"> 
            </form>
        <?php endif; ?>
        <div class="uk-panel uk-container-center">
			<?php if($params->get('search_mode') == 2): ?>
            <div class="uk-margin">
                <select class="uk-margin-small-top search_version_select_<?php echo $module->uniqueId; ?>" >
                    <?php foreach($module->versions as $key => $version): ?>
                        <?php if($key == $params->get('version')) :?>
                            <option value="<?php echo $key; ?>" selected="selected" >(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $key; ?>">(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        	<div class="uk-margin">
                <div class="uk-button-group"  data-uk-button-radio="">
                    <button type="button" class="uk-button uk-button-primary <?php echo $search_button; ?> mode_<?php echo $module->uniqueId; ?>" value="1"><?php echo $params->get('search_button'); ?></button>
                    <button type="button" class="uk-button uk-button-primary <?php echo $load_button; ?> mode_<?php echo $module->uniqueId; ?>" value="2"><?php echo $params->get('load_button'); ?></button>
                </div>
            </div>
            <?php endif; ?>
           	<?php if($params->get('search_options') == 1): ?>
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
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_1 ?> search_crit1_<?php echo $module->uniqueId; ?>" value="1" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_ALL_WORDS'); ?></button>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_2 ?> search_crit1_<?php echo $module->uniqueId; ?>" value="2" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_ANY_WORDS'); ?></button>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_3 ?> search_crit1_<?php echo $module->uniqueId; ?>" value="3" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_PHRASE'); ?></button>
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
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_type_all ?> search_type_select_<?php echo $module->uniqueId; ?>" value="all" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_BIBLE'); ?></button>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_type_ot ?> search_type_select_<?php echo $module->uniqueId; ?>" value="ot" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_OT'); ?></button>
                    <button type="button" class="uk-button uk-button-primary <?php echo $active_type_nt ?> search_type_select_<?php echo $module->uniqueId; ?>" value="nt" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_NT'); ?></button>
                    <button type="button" class="uk-button uk-button-primary search_type_select_<?php echo $module->uniqueId; ?>" id="search_book_<?php echo $module->uniqueId; ?>" ><?php echo JText::_('MOD_GETBIBLESEARCH_A_BOOK'); ?></button>
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
                    <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit2_1 ?> search_crit2_<?php echo $module->uniqueId; ?>" type="button" value="1" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_EXACT_MATCH'); ?></button>
                    <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit2_2 ?> search_crit2_<?php echo $module->uniqueId; ?>" type="button" value="2" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_PARTIAL_MATCH'); ?></button>
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
                    <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit3_1 ?> search_crit3_<?php echo $module->uniqueId; ?>" type="button" value="1" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_CASE_INSENSITIVE'); ?></button>
                    <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit3_2 ?> search_crit3_<?php echo $module->uniqueId; ?>" type="button" value="2" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_CASE_SENSITIVE'); ?></button>
                 </div>
            </div>
        	<?php endif; ?>
        </div>
    </div>
</div>

<?php else: ?>

<div id="getbible_search">
	<?php if($params->get('search_display') == 1):?>
        <form action="<?php echo $module->action; ?>" class="uk-form uk-search" id="search_form" method="post">
            <input class="search_field_<?php echo $module->uniqueId; ?> uk-search-field" type="input" name="search" placeholder="<?php echo $params->get('search_phrase'); ?>" <?php echo $submit_search; ?>>
            <?php if($params->get('search_mode') == 2): ?>
            <input class="passage_<?php echo $module->uniqueId; ?> uk-search-field" type="input" name="passage" placeholder="<?php echo $params->get('load_phrase'); ?>" <?php echo $submit_load; ?>>
            <?php endif; ?>
            <?php if($params->get('search_options') == 1): ?>
                <div class="uk-margin">
                    <input class="uk-button submit_search_<?php echo $module->uniqueId; ?>" type="submit"  value="<?php echo $params->get('search_button'); ?>" <?php echo $submit_search; ?>>
                    <?php if($params->get('search_mode') == 2): ?>
                    <input class="uk-button submit_load_<?php echo $module->uniqueId; ?>" type="submit"  value="<?php echo $params->get('load_button'); ?>" <?php echo $submit_load; ?>>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <input  class="uk-hidden search_crit_<?php echo $module->uniqueId; ?>" type="hidden" name="search_crit"  
            value="<?php echo $params->get('search_crit1'); ?>_<?php echo $params->get('search_crit2'); ?>_<?php echo $params->get('search_crit3'); ?>" >
            <input class="uk-hidden search_type_<?php echo $module->uniqueId; ?>" type="hidden" name="search_type" value="<?php echo $params->get('search_type'); ?>">
            <input class="uk-hidden search_version_<?php echo $module->uniqueId; ?>" type="hidden" name="search_version" value="<?php echo $params->get('version'); ?>">
            <input class="uk-hidden search_app_<?php echo $module->uniqueId; ?>" type="hidden" name="search_app" value="1"> 
            <input class="uk-hidden load_app_<?php echo $module->uniqueId; ?>" type="hidden" name="load_app" value="0"> 
        </form>
    <?php endif; ?>
    <div class="uk-panel uk-container-center">
        <?php if($params->get('search_mode') == 2): ?>
        <div class="uk-margin">
            <select class="uk-margin-small-top search_version_select_<?php echo $module->uniqueId; ?>" >
                <?php foreach($module->versions as $key => $version): ?>
                    <?php if($key == $params->get('version')) :?>
                        <option value="<?php echo $key; ?>" selected="selected" >(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $key; ?>">(<?php echo $version->language; ?>) <?php echo $version->version_name; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="uk-margin">
            <div class="uk-button-group"  data-uk-button-radio="">
                <button type="button" class="uk-button uk-button-primary <?php echo $search_button; ?> mode_<?php echo $module->uniqueId; ?>" value="1"><?php echo $params->get('search_button'); ?></button>
                <button type="button" class="uk-button uk-button-primary <?php echo $load_button; ?> mode_<?php echo $module->uniqueId; ?>" value="2"><?php echo $params->get('load_button'); ?></button>
            </div>
        </div>
        <?php endif; ?>
        <?php if($params->get('search_options') == 1): ?>
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
                <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_1 ?> search_crit1_<?php echo $module->uniqueId; ?>" value="1" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_ALL_WORDS'); ?></button>
                <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_2 ?> search_crit1_<?php echo $module->uniqueId; ?>" value="2" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_ANY_WORDS'); ?></button>
                <button type="button" class="uk-button uk-button-primary <?php echo $active_crit1_3 ?> search_crit1_<?php echo $module->uniqueId; ?>" value="3" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_PHRASE'); ?></button>
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
                <button type="button" class="uk-button uk-button-primary <?php echo $active_type_all ?> search_type_select_<?php echo $module->uniqueId; ?>" value="all" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_BIBLE'); ?></button>
                <button type="button" class="uk-button uk-button-primary <?php echo $active_type_ot ?> search_type_select_<?php echo $module->uniqueId; ?>" value="ot" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_OT'); ?></button>
                <button type="button" class="uk-button uk-button-primary <?php echo $active_type_nt ?> search_type_select_<?php echo $module->uniqueId; ?>" value="nt" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_NT'); ?></button>
                <button type="button" class="uk-button uk-button-primary search_type_select_<?php echo $module->uniqueId; ?>" id="search_book_<?php echo $module->uniqueId; ?>" ><?php echo JText::_('MOD_GETBIBLESEARCH_A_BOOK'); ?></button>
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
                <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit2_1 ?> search_crit2_<?php echo $module->uniqueId; ?>" type="button" value="1" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_EXACT_MATCH'); ?></button>
                <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit2_2 ?> search_crit2_<?php echo $module->uniqueId; ?>" type="button" value="2" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_PARTIAL_MATCH'); ?></button>
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
                <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit3_1 ?> search_crit3_<?php echo $module->uniqueId; ?>" type="button" value="1" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_CASE_INSENSITIVE'); ?></button>
                <button class="uk-button uk-button-mini uk-button-primary <?php echo $active_crit3_2 ?> search_crit3_<?php echo $module->uniqueId; ?>" type="button" value="2" <?php echo $submit_search; ?>><?php echo JText::_('MOD_GETBIBLESEARCH_CASE_SENSITIVE'); ?></button>
             </div>
        </div>
        
        <?php endif; ?>
    </div>
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
		jQuery('.search_crit_<?php echo $module->uniqueId; ?>').val(crit1+'_'+crit2+'_'+crit3);
	}
	// set the type of search
	jQuery('.search_type_select_<?php echo $module->uniqueId; ?>').click(function() {
		jQuery('.search_type_<?php echo $module->uniqueId; ?>').val(jQuery(this).attr("value"));
		jQuery('.books_<?php echo $module->uniqueId; ?>').hide();
		jQuery('#books_<?php echo $module->uniqueId; ?>').empty();
	});
	
	// set the search version
	jQuery('.search_version_select_<?php echo $module->uniqueId; ?>').change(function() {
		jQuery('.search_version_<?php echo $module->uniqueId; ?>').val(jQuery(this).attr("value"));
		BookVersion = jQuery(this).attr("value");
		if(jQuery('.books_<?php echo $module->uniqueId; ?>').is(":visible")){
			getDataBo(BookVersion);
		}
	});
	
	// set the search book ref
	jQuery('#books_<?php echo $module->uniqueId; ?>').change(function() {
		jQuery('.search_type_<?php echo $module->uniqueId; ?>').val(jQuery(this).attr("value"));
	})
	
	var BookVersion = '<?php echo $params->get('version'); ?>';
	// set the books selection options
	jQuery('#search_book_<?php echo $module->uniqueId; ?>').click(function() {
		getDataBo(BookVersion);
		jQuery('.books_<?php echo $module->uniqueId; ?>').show();
	});
	<?php if($params->get('search_mode') == 2): ?>
	// set the mode on load
	setMode();
	jQuery('.mode_<?php echo $module->uniqueId; ?>').click(function() {
		mode = jQuery(this).attr("value");
		setMode();
	});
	<?php endif; ?>
	
});
<?php if($params->get('search_mode') == 2): ?>

var mode = <?php echo $params->get('mode_set'); ?>;
// function to change search mode
function setMode(){
	if(mode == 2){
		jQuery('.search_field_<?php echo $module->uniqueId; ?>').hide();
		jQuery('.submit_search_<?php echo $module->uniqueId; ?>').hide();
		jQuery('.search_crit1_<?php echo $module->uniqueId; ?>').hide();
		jQuery('.search_crit2_<?php echo $module->uniqueId; ?>').hide();
		jQuery('.search_crit3_<?php echo $module->uniqueId; ?>').hide();
		jQuery('.search_type_select_<?php echo $module->uniqueId; ?>').hide();
		jQuery('.books_<?php echo $module->uniqueId; ?>').hide();
		jQuery('.search_app_<?php echo $module->uniqueId; ?>').val(0);
		jQuery('.load_app_<?php echo $module->uniqueId; ?>').val(1);
		jQuery('.passage_<?php echo $module->uniqueId; ?>').show();
		jQuery('.submit_load_<?php echo $module->uniqueId; ?>').show();
	} else if(mode == 1){
		jQuery('.passage_<?php echo $module->uniqueId; ?>').hide();
		jQuery('.submit_load_<?php echo $module->uniqueId; ?>').hide();
		jQuery('.search_app_<?php echo $module->uniqueId; ?>').val(1);
		jQuery('.load_app_<?php echo $module->uniqueId; ?>').val(0);
		jQuery('.search_field_<?php echo $module->uniqueId; ?>').show();
		jQuery('.submit_search_<?php echo $module->uniqueId; ?>').show();
		jQuery('.search_crit1_<?php echo $module->uniqueId; ?>').show();
		jQuery('.search_crit2_<?php echo $module->uniqueId; ?>').show();
		jQuery('.search_crit3_<?php echo $module->uniqueId; ?>').show();
		jQuery('.search_type_select_<?php echo $module->uniqueId; ?>').show();		
	}
}
<?php endif; ?>
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