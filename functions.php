<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', __( 'Equity Magazine', 'equity-magazine' ) );
define( 'CHILD_THEME_URL', 'http://www.agentevolution.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'equity-magazine', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'equity-magazine' ) );

//* Add Theme Support
add_theme_support( 'equity-top-header-bar' );
add_theme_support( 'equity-after-entry-widget-area' );

//* Load parent theme CSS first
add_action( 'wp_enqueue_scripts', 'equity_child_theme_scripts', 5 );
function equity_child_theme_scripts() {
    wp_enqueue_style( 'equity-theme-css', get_template_directory_uri() . '/style.css', false );
}

//* Register widget areas
equity_register_widget_area(
	array(
		'id'          => 'home-top',
		'name'        => __( 'Home Top', 'equity-magazine' ),
		'description' => __( 'This is the Top section of the Home page', 'equity-magazine' ),
	)
);
equity_register_widget_area(
	array(
		'id'          => 'home-bottom-left',
		'name'        => __( 'Home Bottom Left', 'equity-magazine' ),
		'description' => __( 'This is the Bottom Left section of the Home page', 'equity-magazine' ),
	)
);
equity_register_widget_area(
	array(
		'id'          => 'home-bottom-right',
		'name'        => __( 'Home Bottom Right', 'equity-magazine' ),
		'description' => __( 'This is the Bottom Right section of the Home page', 'equity-magazine' ),
	)
);
equity_register_widget_area(
	array(
		'id'          => 'home-sidebar',
		'name'        => __( 'Home Sidebar', 'equity-magazine' ),
		'description' => __( 'This is the Sidebar section of the Home page', 'equity-magazine' ),
	)
);

//* Remove welcome screen (getting started links)
add_filter( 'equity_display_welcome_screen', 'equity_no_welcome' );
function equity_no_welcome() {
	return false;
}

// * Home page - markup and default widgets
function equity_child_home() {
	?>
	<div class="columns small-8 content">
		<div class="home-top">
			<div class="row">
				<div class="columns small-12">
					<?php equity_widget_area( 'home-top' ); ?>
				</div><!-- end .columns .small-12 -->
			</div><!-- end .row -->
		</div><!-- end .home-top -->
		<div class="home-top">
			<div class="row">
				<div class="columns small-12 large-6 home-bottom-left">
					<?php equity_widget_area( 'home-bottom-left' ); ?>
				</div><!-- end .home-bottom-left .columns .small-12 -->
				<div class="columns small-12 large-6 home-bottom-right">
					<?php equity_widget_area( 'home-bottom-right' ); ?>
				</div><!-- end .home-bottom-right .columns .small-12 -->
			</div><!-- end .row -->
		</div><!-- end .home-bottom-left -->
	</div><!-- end .content -->
	<div class="columns small-4 sidebar">
		<?php equity_widget_area( 'home-sidebar' ); ?>
	</div><!-- end .sidebar -->

<?php
}

# Theme Customizatons
require_once get_stylesheet_directory() . '/lib/customizer.php';