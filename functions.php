<?php

add_action('wp_enqueue_scripts', 'theme_styles');
add_action('wp_enqueue_scripts', 'theme_js');

function theme_styles() {
    wp_enqueue_style( 'uikit', get_template_directory_uri() . '/assets/css/uikit.min.css' );
    wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css', array('uikit') );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array('uikit','bootstrap-grid') );
}

function theme_js() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
    wp_enqueue_script( 'uikit', get_template_directory_uri() . '/assets/js/uikit.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'uikit-icons', get_template_directory_uri() . '/assets/js/uikit-icons.min.js', array('jquery'), null, true);
}

add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support( 'widgets' );
// add_theme_support( 'custom-logo');

// Register menu
register_nav_menus( array(
    'primary'  => __( 'Header menu', 'fe_starter' ),
) );

// Adding standart menu function
function courage_default_menu() {
    echo '<ul id="mainnav-menu" class="menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}

function create_post_type() {
    $labels = array(
        'name' => __('Articles'),
        'singular_name' => __('Article'),
        'add_new' => __('New Article'),
        'add_new_item' => __('Add New Article'),
        'edit_item' => __('Edit Article'),
        'new_item' => __('New Article'),
        'view_item' => __('View Article'),
        'search_items' => __('Search Articles'),
        'not_found' => __('No Articles Found'),
        'not_found_in_trash' => __('No Articles found in Trash'),
    );
    $args = array(
        'labels' => $labels,
        'description' => '',
        'public' => true,
        'rewrite' => true,
        'query_var' => true,
        'has_archive' => true,
        'menu_position' => null,
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        ),
    );
    register_post_type('articles', $args);
}
add_action('init', 'create_post_type');

if (function_exists('add_image_size')) {
    add_image_size('article-image', 350, 380, true);
}

function my_register_sidebars() {
    register_sidebar( array(
        'name' => esc_html__( 'Footer left', 'nd_dosth' ),
        'id' => 'footer-left',
        'description'   => esc_html__( 'Widgets added here would appear inside the left section of the footer', 'nd_dosth' ),
        'before_widget' => '<aside id="%1$s" class="selfWidget1">', // то что стоит пред блоком виджета
        'after_widget' => '</aside>', // то что стоит после блока виджета
        'before_title' => '<p class="widget-title">', // стоит перед тайтлом
        'after_title' => '</p>', // после тайтла.
    ));
    register_sidebar( array(
        'name' => esc_html__( 'Footer right', 'nd_dosth' ),
        'id' => 'footer-right',
        'description'   => esc_html__( 'Widgets added here would appear inside the right section of the footer', 'nd_dosth' ),
        'before_widget' => '<aside id="%1$s" class="selfWidget2">', // то что стоит пред блоком виджета
        'after_widget' => '</aside>', // то что стоит после блока виджета
        'before_title' => '<p class="widget-title">', // стоит перед тайтлом
        'after_title' => '</p>', // после тайтла.
    ));
        register_sidebar( array(
        'name' => esc_html__( 'Counter area', 'nd_dosth' ),
        'id' => 'counter',
        'description'   => esc_html__( 'There should be added a counter that would appear inside the counter section in front of page', 'nd_dosth' ),
        'before_widget' => '<aside id="%1$s" class="selfCounter">', // то что стоит пред блоком виджета
        'after_widget' => '</aside>', // то что стоит после блока виджета
        'before_title' => '<p class="widget-title">', // стоит перед тайтлом
        'after_title' => '</p>', // после тайтла.
    ));
}
add_action( 'widgets_init', 'my_register_sidebars' );



// Register and load the copyright widget
function copyright_load_widget() {
    register_widget( 'copyright_widget' );
}
add_action( 'widgets_init', 'copyright_load_widget' );

// Creating the widget
class copyright_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of widget
            'copyright_widget',

// Widget name will appear in UI
            __('COPYRIGHT'),

// Widget description
            array( 'description' => __( 'Edit your copyright' ), )
        );
    }

// Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Copyright &copy; 2019 Строительная компания' );
        }
// Widget admin form
        ?>


        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Text:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />


        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class copyright_widget ends here



// Register and load the developer widget
function developer_load_widget() {
    register_widget( 'developer_widget' );
}
add_action( 'widgets_init', 'developer_load_widget' );

// Creating the widget
class developer_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of widget
            'developer_widget',

// Widget name will appear in UI
            __('DEVELOPER'),

// Widget description
            array( 'description' => __( 'Edit your developer' ), )
        );
    }

// Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Сделано в IT Decision' );
        }
// Widget admin form
        ?>


        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Text:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />


        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class developer_widget ends here

