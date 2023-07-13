<?php
/**
 * @package JET WordPress Tools
 * @version 1.0
 */
/*
Plugin Name: JET Feature Panels
Plugin URI: http://trianglewebtech.com/wordpress/plugins/jet-feature-panels
Description: Enable clickable feature panels
Author: Jonathan Tweedy
Version: 1.0
Author URI: http://jonathantweedy.com
*/

//// create post type
function cptui_register_jet_feature_panels() {
    /**
     * Post Type: JET Feature Panels.
     */
    $labels = array(
        "name" => __( "JET Feature Panels", "virtue" ),
        "singular_name" => __( "JET Feature Panel", "virtue" ),
    );
    $args = array(
        "label" => __( "JET Feature Panels", "virtue" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "jet_feature_panel", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail" ),
        "taxonomies" => array("category"),
    );
    register_post_type( "jet_feature_panel", $args );
}
add_action( 'init', 'cptui_register_jet_feature_panels' );


//// Register taxonomy
function cptui_register_my_taxes_feature_panel_group() {
    /**
     * Taxonomy: Feature Panel Groups.
     */
    $labels = array(
        "name" => "Feature Panel Groups",
        "singular_name" => "Feature Panel Group",
    );

    $args = array(
        "label" => "Feature Panel Groups",
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "label" => "Feature Panel Groups",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'feature_panel_group', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "feature_panel_group",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "feature_panel_group", array( "jet_feature_panel" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_feature_panel_group' );




//// create field group
if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
    'key' => 'group_5bb3d83450ba7',
    'title' => 'jet-feature-panels',
    'fields' => array(
        array(
            'key' => 'field_5bb3dc9b91544',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'url',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
        array(
            'key' => 'field_5bb3dcbd91545',
            'label' => 'URL',
            'name' => 'url',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
        ),
        array(
            'key' => 'field_5bb3dcdca3c38',
            'label' => 'ShortText',
            'name' => 'short_text',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        array(
            'key' => 'field_5bb3dce5a3c39',
            'label' => 'Medium Text',
            'name' => 'medium_text',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        array(
            'key' => 'field_5bb3dce5a3c40',
            'label' => 'Long Text',
            'name' => 'long_text',
            'type' => 'wysiwyg',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
            'delay' => 0,
        ),
		array(
			'key' => 'field_5bc10d19445cc',
			'label' => 'New Tab',
			'name' => 'new_tab',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'no',
			'layout' => 'vertical',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),		
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'jet_feature_panel',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
));

endif;


remove_filter("the_content", "wptexturize");
remove_filter("comment_text", "wptexturize");
remove_filter("the_excerpt", "wptexturize");
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);

function jet_feature_panels( $atts, $content ){
    $output = "";
    global $use_wpautop;
    $_SESSION['use_wpautop'] = false;   
    $queryParams = array(); 
    $post_id = false;
    if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];
    }
    if (!!$post_id) {
        $queryParams['p'] = $post_id;
    }
    
    $queryParams['post_type'] = "jet_feature_panel";
    if (isset($atts['category'])) {
        $queryParams['category_name'] = $atts['category'];
    }
    $queryParams['tax_query'] = array();
	$queryParams['posts_per_page'] = -1;
    $nonTaxParams = array("post-type","category","offset","paginate");
    if (!empty($atts)) {
        foreach($atts as $tax=>$values) {
            if ( !in_array($tax,$nonTaxParams) && taxonomy_exists($tax) ) {
                $values = is_array($values) ? $values : explode(",",$values);
                $queryParams['tax_query'][] = array(
                    'taxonomy' => $tax,
                    'field'    => 'slug',
                    'terms'    => $values,
                );              
            }
        }
    }
    $query = new WP_Query( $queryParams );
    

    
    if (isset($query)) {
        
        while($query->have_posts()) : $query->the_post();
            $post_id = get_the_id();
            $linkurl = get_field("url");
            $imageurl = get_field("image");
            $shorttext = trim(get_field("short_text"));
            $mediumtext = trim(get_field("medium_text"));
            $longtext = trim(get_field("long_text"));
			$newtab = trim(get_field("new_tab"));
			

            $_SESSION['jet-feature-panels-longtexts'][$post_id] = $longtext;

            $onclicker = "";
            if ($linkurl=="" && $longtext!="") {
                $linkurl = "javascript:initJetFeaturePanelPopup(".$post_id.");";
            }
			$href = " href=\"$linkurl\"";
			$target = "";
			if ($newtab=="yes") {
				$target = " target='_blank'";
			}
            $output .= "<div class=\"jet-feature-panel\">
    <a".$href.$target."><img src=\"".$imageurl."\"></a><div class=\"content bottom\">
        <div class=\"content-bg\"></div>
        <div class=\"title\"><a".$href.$target.">".$shorttext."</a></div>
        <div class=\"text\"><a".$href.$target.">".$mediumtext."</a></div>
    </div>
</div>";

        endwhile;
        wp_reset_postdata();
    }
    return $output;
}
add_shortcode( 'jet-feature-panels', 'jet_feature_panels' );




///// CREATE OPTIONS MENU LINK

add_action( 'admin_menu', 'jetFeaturePanels_add_admin_menu' );
add_action( 'admin_init', 'jetFeaturePanels_settings_init' );


function jetFeaturePanels_add_admin_menu(  ) { 
//    add_menu_page( 'jetFeaturePanels', 'jetFeaturePanels', 'manage_options', 'jetFeaturePanels', 'jetFeaturePanels_Settings_init' );
//    add_submenu_page( 'jetFeaturePanels', 'Options', 'Options', 'manage_options', 'jetFeaturePanels', 'jetFeaturePanels_options_page' );
    add_submenu_page( 'edit.php?post_type=jet_feature_panel', 'Feature Panel Options', 'Options', 'manage_options', 'jet-feature-panel-options', 'jetFeaturePanels_options_page' );
}


function jetFeaturePanels_settings_init(  ) { 

    register_setting( 'jetFeaturePanels_pluginPage', 'jetFeaturePanels_settings' );

    add_settings_section(
        'jetFeaturePanels_pluginPage_section', 
        __( 'jetFeaturePanels Settings', 'wordpress' ), 
        'jetFeaturePanels_settings_section_callback', 
        'jetFeaturePanels_pluginPage'
    );

    add_settings_field( 
        'jetFeaturePanels_BackgroundColor', 
        __( 'Background Color', 'wordpress' ), 
        'jetFeaturePanels_text_field_BackgroundColor_render', 
        'jetFeaturePanels_pluginPage', 
        'jetFeaturePanels_pluginPage_section' 
    );
    add_settings_field( 
        'jetFeaturePanels_TextColor', 
        __( 'Text Color', 'wordpress' ), 
        'jetFeaturePanels_text_field_TextColor_render', 
        'jetFeaturePanels_pluginPage', 
        'jetFeaturePanels_pluginPage_section' 
    );

    add_settings_field( 
        'jetFeaturePanels_PopupBgColor', 
        __( 'Popup Background Color', 'wordpress' ), 
        'jetFeaturePanels_text_field_PopupBgColor_render', 
        'jetFeaturePanels_pluginPage', 
        'jetFeaturePanels_pluginPage_section' 
    );
	
	
}

function jetFeaturePanels_text_field_BackgroundColor_render(  ) { 
    $options = get_option( 'jetFeaturePanels_settings' );
    ?>
    <input class='color-picker' name='jetFeaturePanels_settings[jetFeaturePanels_BackgroundColor]' value='<?php echo $options['jetFeaturePanels_BackgroundColor']; ?>' />
    <?php
}
function jetFeaturePanels_text_field_TextColor_render(  ) { 
    $options = get_option( 'jetFeaturePanels_settings' );
    ?>
    <input class='color-picker' name='jetFeaturePanels_settings[jetFeaturePanels_TextColor]' value='<?php echo $options['jetFeaturePanels_TextColor']; ?>' />
    <?php
}

function jetFeaturePanels_text_field_PopupBgColor_render(  ) { 
    $options = get_option( 'jetFeaturePanels_settings' );
    ?>
    <input class='color-picker' name='jetFeaturePanels_settings[jetFeaturePanels_PopupBgColor]' value='<?php echo $options['jetFeaturePanels_PopupBgColor']; ?>' />
    <?php
}


function jetFeaturePanels_settings_section_callback(  ) { 
    echo __( '', 'wordpress' );
}

function jetFeaturePanels_options_page(  ) { 

    ?>
    <form action='options.php' method='post'>

        <?php
        settings_fields( 'jetFeaturePanels_pluginPage' );
        do_settings_sections( 'jetFeaturePanels_pluginPage' );
        submit_button();
        ?>

    </form>
    <?php

}





//// ENQUEUE STYLE AND SCRIPTS

/*
add_action( 'admin_enqueue_scripts', 'jetFeaturePanels_admin_scripts' );
function jetFeaturePanels_admin_scripts($hook) {
    if('appearance_page_sl-theme-options' != $hook) {
       return;
    }
*/
    wp_enqueue_script('jquery');
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script('wp-color-picker');
    wp_register_style( "jet-feature-panels-css", plugins_url()."/jet-feature-panels/jet-feature-panels-css.php" );
    wp_enqueue_style( 'jet-feature-panels-css' );
    wp_register_script( "jet-feature-panels-js", plugins_url()."/jet-feature-panels/jet-feature-panels-js.php" );
    wp_enqueue_script( 'jet-feature-panels-js' , array( 'wp-color-picker','jquery' ));
//}










?>
