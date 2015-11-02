<?php
	$new_meta_boxes =
	array(
		"slider" => array(
			"name" => "slider",
			"title" => "幻灯片的code:",
			"type" => "textarea"
		),

		"grapeintro" => array(
			"name" => "grapeintro",
	        "title" => "葡萄的介绍:",
	        "type" => "introtextarea"
		),

		"listgrape" => array(
			"name" => "listgrape",
			"title" => "葡萄种类下拉选项",
			"type" => "grapedropdown"
		),

		"listregion" => array(
			"name" => "listregion",
			"title" => "地域下拉选项",
			"type" => "regiondropdown"
		),

		"listcolor" => array(
			"name" => "listcolor",
			"title" => "颜色下拉选项",
			"type" => "colordropdown"
		),

	    "sort" => array(
	        "name" => "sort",
	        "title" => "葡萄的种类:",
	        "type" => "textarea"
		),

	    "area" => array(
	        "name" => "area",
	        "title" => "葡萄的产区:",
	        "type" => "textarea"
		),

	    "color" => array(
	    	"name" => "color",
	    	"title" => "葡萄的颜色",
	    	"type" => "textarea"
	    ),

	    "manor" => array(
	    	"name" => "manor",
	    	"title" => "庄园",
	    	"type" => "textarea"
	    ),

	    "year" => array(
	    	"name" => "year",
	    	"title" => "年份",
	    	"type" => "textarea"
	    ),

	    "alcohol" => array(
	    	"name" => "alcohol",
	    	"title" => "酒精度",
	    	"type" => "textarea"
	    ),

	    "weight" => array(
	    	"name" => "weight",
	    	"title" => "净含量",
	    	"type" => "textarea"
	    ),

	    "code" => array(
	    	"name" => "code",
	    	"title" => "Lucia 编码",
	    	"type" => "textarea"
	    )
	);

	function new_meta_boxes() {
    global $post, $new_meta_boxes;

    foreach($new_meta_boxes as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];

        echo '<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

        	switch ( $meta_box['type'] ){
        		case 'introtextarea':
        			echo '<h4>'.$meta_box['title'].'</h4>';
       				echo '<textarea cols="60" rows="5" style="resize:none;" name="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea><br />';
       			break;

       			case 'textarea':
        			echo '<h4>'.$meta_box['title'].'</h4>';
       				echo '<textarea cols="60" rows="1" style="resize:none;" name="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea><br />';
       			break;

       			case 'grapedropdown':
	                echo'<h4>'.$meta_box['title'].'</h4>';
	                echo '<select name="'.$meta_box['name'].'_value"> ';
	                echo '<option value="chardonnay">请选择</option>';
	                echo '<option value="chardonnay">霞多丽</option>';
	                echo '<option value="gewurztraminer">琼瑶浆</option>';
	                echo '<option value="malbec">马贝克</option>';
	                echo '<option value="merlot">梅洛</option>';
	                echo '<option value="gris">灰皮诺</option>';
	                echo '<option value="noir">黑皮诺</option>';
	                echo '<option value="red">混酿红葡萄</option>';
	                echo '<option value="riesling">雷司令</option>';
	                echo '<option value="sauvignon">长相思</option>';
	                echo '<option value="syrah">西拉</option>';
	                echo '</select><br />';
                break;

                case 'regiondropdown':
	                echo'<h4>'.$meta_box['title'].'</h4>';
	                echo '<select name="'.$meta_box['name'].'_value"> ';
	                echo '<option value="auckland">请选择</option>';
	                echo '<option value="auckland">奥克兰</option>';
	                echo '<option value="plenty">丰盛湾</option>';
	                echo '<option value="canterbury">坎特伯雷</option>';
	                echo '<option value="otago">奥塔哥</option>';
	                echo '<option value="eastcoast">东海岸</option>';
	                echo '<option value="hawkes">霍克斯湾</option>';
	                echo '<option value="marlborough">马尔堡</option>';
	                echo '<option value="nelson">纳尔逊</option>';
	                echo '<option value="northland">北岛</option>';
	                echo '<option value="wellington">惠灵顿</option>';
	                echo '</select><br />';
                break;

                case 'colordropdown':
	                echo'<h4>'.$meta_box['title'].'</h4>';
	                echo '<select name="'.$meta_box['name'].'_value"> ';
	                echo '<option value="golden">请选择</option>';
	                echo '<option value="golden">金黄</option>';
	                echo '<option value="crimson">赤红</option>';
	                echo '<option value="pink">粉红</option>';
	                echo '<option value="white">金白</option>';
	                echo '<option value="orange">橘黄</option>';
	                echo '<option value="plainer">青白</option>';
	                echo '<option value="peach">桃红</option>';
	                echo '<option value="purple">紫红</option>';
	                echo '<option value="brown">棕黄</option>';
	                echo '</select><br />';
                break;
    		}
    }
	}

	function create_meta_box() {
    global $theme_name;

    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes', '酒的属性', 'new_meta_boxes', 'post', 'normal', 'high' );
    }
	}

	function save_postdata( $post_id ) {
    	global $post, $new_meta_boxes;

	    foreach($new_meta_boxes as $meta_box) {
	        if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) ))  {
	            return $post_id;
	        }

	        if ( 'page' == $_POST['post_type'] ) {
	            if ( !current_user_can( 'edit_page', $post_id ))
	                return $post_id;
	        }
	        else {
	            if ( !current_user_can( 'edit_post', $post_id ))
	                return $post_id;
	        }

	        $data = $_POST[$meta_box['name'].'_value'];

	        if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
	            add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
	        elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
	            update_post_meta($post_id, $meta_box['name'].'_value', $data);
	        elseif($data == "")
	            delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
	    }
	}

	add_action('admin_menu', 'create_meta_box');
	add_action('save_post', 'save_postdata');
?>