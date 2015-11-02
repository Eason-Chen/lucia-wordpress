<?php
	include ("metabox.php");

	// resousreces support
	function lucia_css(){
		wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_script('jquery');
		//master slider js
		wp_enqueue_script('jquery-1.10.2', get_template_directory_uri() .'/js/jquery-1.10.2.min.js','','', false);
		wp_enqueue_script('select', get_template_directory_uri() .'/js/select.js', true);
		wp_enqueue_script('jquery.easing.min', get_template_directory_uri() .'/js/jquery.easing.min.js','','', false);
		wp_enqueue_script('masterslider.flickr.min', get_template_directory_uri() .'/js/masterslider.flickr.min.js','','', false);
		wp_enqueue_script('masterslider', get_template_directory_uri() .'/js/masterslider.js','','', false);
		wp_enqueue_script('masterlider.map', get_template_directory_uri() .'/js/masterlider.map','','', false);
		wp_enqueue_script('masterslider.min', get_template_directory_uri() .'/js/masterslider.min.js','','', false);
		wp_enqueue_script('jquery.ui.totop', get_template_directory_uri() .'/js/jquery.ui.totop.js', false);
		wp_enqueue_script('public', get_template_directory_uri() .'/js/public.js', false);

		wp_enqueue_script( 'google', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js' );
        wp_enqueue_script( 'default', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js' );
        wp_enqueue_style( 'default', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css' );
	}
	add_action('wp_enqueue_scripts', 'lucia_css');

	// theme setup
	function lucia_setup(){
		// navgation menu
		register_nav_menus(
			array(
				'primary' => __('Lucia Menu')
			)
		);
		// add featured image support
		add_theme_support('post-thumbnails');
		add_image_size('about-thumbnail', 140, 210, true);
		add_image_size('grape-thumbnail', 200, 145, ture);
		add_image_size('grapeSingle-thumbnail', 570, 400, ture);
		add_image_size('wine-thumbnail', 300, 200, ture);
		// add post format support
		//add_theme_support('post-formats', array('gallery','link'));
	}
	add_action('after_setup_theme', 'lucia_setup');

	//define the template path single
	define(SINGLE_PATH, TEMPLATEPATH . '/single');
	//choose the template template
	function lucia_single_template($single) {
		global $wp_query, $post;
		//通过分类别名或ID选择模板文件
		foreach((array)get_the_category() as $cat) :
			if(file_exists(SINGLE_PATH . '/single-' . $cat->name . '.php'))
				return SINGLE_PATH . '/single-' . $cat->name . '.php';
			elseif(file_exists(SINGLE_PATH . '/single.php'))
				return SINGLE_PATH . '/single.php';
		endforeach;
	}
	add_filter('single_template', 'lucia_single_template');

	// get child id
	function getchild($id){
		$result = explode('/',get_category_children($id));
		$childs = array();
		foreach($result as $i){
			if(!empty($i))$childs[] = get_category($i);
		}
		return $childs;
	}
	/*获取根分类的id*/
function get_category_root_id($cat)
{
$this_category = get_category($cat); // 取得当前分类
while($this_category->category_parent) // 若当前分类有上级分类时，循环
{
$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
}
return $this_category->term_id; // 返回根分类的id号
}
	// remove the gallery
	//add_filter( 'use_default_gallery_style', '__return_false' );

	// remove the logo in the admin
	function annointed_admin_bar_remove() {
        global $wp_admin_bar;
        /* Remove their stuff */
        $wp_admin_bar->remove_menu('wp-logo');
	}
	add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

	function remove_screen_options(){ return false;}
	    //add_filter('screen_options_show_screen', 'remove_screen_options');

	    add_filter( 'contextual_help', 'wpse50723_remove_help', 999, 3 );

	    function wpse50723_remove_help($old_help, $screen_id, $screen){
	    $screen->remove_help_tabs();
	    return $old_help;
	}

	function example_remove_dashboard_widgets() {
	    // Globalize the metaboxes array, this holds all the widgets for wp-admin
	    global $wp_meta_boxes;

	    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);

	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);

	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);

	    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);

	    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);

	    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

	    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	}
	add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );

	function change_footer_admin () {return '';}
	add_filter('admin_footer_text', 'change_footer_admin', 9999);
	function change_footer_version() {return '';}
	add_filter( 'update_footer', 'change_footer_version', 9999);

	// change the backend logo
	add_filter('login_headerurl', create_function(false,"return get_bloginfo( 'siteurl' );"));
	add_filter('login_headertitle', create_function(false,"return get_bloginfo( 'description' );"));

	function add_editor_buttons($buttons) {
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'cleanup';
	$buttons[] = 'styleselect';
	$buttons[] = 'hr';
	$buttons[] = 'del';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'copy';
	$buttons[] = 'paste';
	$buttons[] = 'cut';
	$buttons[] = 'undo';
	$buttons[] = 'image';
	$buttons[] = 'anchor';
	$buttons[] = 'backcolor';
	$buttons[] = 'wp_page';
	$buttons[] = 'charmap';
	$buttons[] = 'table';
	return $buttons;
	}
	add_filter("mce_buttons_3", "add_editor_buttons");
?>