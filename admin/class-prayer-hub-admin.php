<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Prayer_Hub
 * @subpackage Prayer_Hub/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Prayer_Hub
 * @subpackage Prayer_Hub/admin
 * @author     Developer Junayed <admin@easeare.com>
 */
class Prayer_Hub_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/prayer-hub-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'wp-color-picker');
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/prayer-hub-admin.js', array( 'jquery' ), $this->version, false );
	}

	function admin_menu_page(){
		add_menu_page("Prayer Hub","Prayer Hub","manage_options","prayer-hub",[$this, "prayer_hub_menupage"],'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA1MTEuNzIgNDI3LjUxIj48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6I2ZmZjt9PC9zdHlsZT48L2RlZnM+PHRpdGxlPkFzc2V0IDM8L3RpdGxlPjxnIGlkPSJMYXllcl8yIiBkYXRhLW5hbWU9IkxheWVyIDIiPjxnIGlkPSJMYXllcl8xLTIiIGRhdGEtbmFtZT0iTGF5ZXIgMSI+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMTk2Ljg1LjdBMjMsMjMsMCwwLDEsMjI0LDMxLjA3cS0yMy4wNiw2NC4yOC00Ni4yMywxMjguNTFjLTMuODgsMTEuMDYtOC4xMywyMi0xMS43OCwzMy4xMy4yOCwxMC40NywxLjExLDIwLjkzLDEuNzMsMzEuMzksNi4yNy0xNywxMi4xNy0zNC4wNiwxOC40My01MUEzMC43OSwzMC43OSwwLDAsMSwyNDUuMywxODkuNmMtNy42MSw0NC4zNS0xNS4xLDg4LjcyLTIyLjgyLDEzM2EzNi4zOSwzNi4zOSwwLDAsMS0xOC45MSwyNS44NVExMzMuNzksMzg1LjI5LDYzLjksNDIxLjg2Yy04LjgzLDQuNjYtMTkuMTIsNi45Mi0yOSw0LjkyQTQyLjQ5LDQyLjQ5LDAsMCwxLDMuNCwzNjguNGMzLjgzLTkuNDYsMTEuNDctMTYuOTQsMjAuNDEtMjEuNjdxMzctMTkuNDksNzQtMzguODgtLjIxLTYwLS40LTEyMGEzMS4wOCwzMS4wOCwwLDAsMSwzLjU3LTE1UTE0MS4yLDkzLjEyLDE4MS40NywxMy40MkEyMy40MSwyMy40MSwwLDAsMSwxOTYuODUuN1oiLz48cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik0zMDEuNDksMS40YTIzLDIzLDAsMCwxLDIzLjczLDVjMy41NywzLjM4LDUuNTQsOCw3Ljc0LDEyLjI4cTM3LjU2LDc0LjM4LDc1LjE1LDE0OC43NmMyLDQsNC4yNSw4LDUuMzksMTIuMzgsMS4xMiw0Ljg5LjgzLDkuOTQuODMsMTQuOTFxLS4xOSw1Ni41NS0uMzgsMTEzLjEsMzQuMzIsMTguMDgsNjguNjgsMzYuMDhjNiwzLjExLDEyLjE0LDYuMywxNi44NCwxMS4yNmE0Mi40Nyw0Mi40NywwLDAsMS0zNS42OCw3MS45M2MtMTAuNjktMS4zLTE5Ljc1LTcuNTItMjkuMTctMTIuMmwtMTE0LTU5Ljg3Yy02LTMuMjktMTIuMzctNi4wNS0xNy45LTEwLjE0LTcuNDQtNS41Mi0xMi4wNy0xNC4xNC0xMy42My0yMy4xN1EyNzguMTIsMjU4LjMsMjY3LjMsMTk0Ljg0QzI2NiwxODguMSwyNjUsMTgxLDI2Ny4yNSwxNzQuMzFhMzAuODIsMzAuODIsMCwwLDEsMjguNjEtMjEuNjNjMTIuNy0uNTEsMjUsNy44NCwyOS40NCwxOS43MUMzMzEuNzEsMTg5LjYsMzM3LjY5LDIwNywzNDQsMjI0LjIxYy42NS05LjgsMS4xNi0xOS42MiwxLjc2LTI5LjQyLjI5LTIuODYtMS4xOC01LjQ0LTItOC4wN1EzMTYuNDQsMTExLDI4OS4xOCwzNS4yYy0xLjcyLTQuNTctMy4zNi05LjM4LTIuNzktMTQuMzNBMjMsMjMsMCwwLDEsMzAxLjQ5LDEuNFoiLz48L2c+PC9nPjwvc3ZnPg==',45 );

		add_settings_section( 'prayer_hub_section', '', '', 'prayer_hub_page' );
		// Email
		add_settings_field( 'ph_email', 'Email', [$this, 'ph_email_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_email' );
		
		// Logo URL
		add_settings_field( 'ph_logo_url', 'Logo URL', [$this, 'ph_logo_url_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_logo_url' );
		// Google font url
		add_settings_field( 'ph_google_font_url', 'Google font URL', [$this, 'ph_google_font_url_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_google_font_url' );
		// Font family
		add_settings_field( 'ph_font_family', 'Font family', [$this, 'ph_font_family_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_font_family' );
		// Form title
		add_settings_field( 'ph_form_title', 'Form title', [$this, 'ph_form_title_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_form_title' );
		// Form title font size
		add_settings_field( 'ph_form_title_font_size', 'Form title font size', [$this, 'ph_form_title_font_size_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_form_title_font_size' );
		// Question font size
		add_settings_field( 'ph_qsn_font_size', 'Question font size', [$this, 'ph_qsn_font_size_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_qsn_font_size' );
		// Label font size
		add_settings_field( 'ph_label_font_size', 'Label font size', [$this, 'ph_label_font_size_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_label_font_size' );
		// Text font size
		add_settings_field( 'ph_text_font_size', 'Text font size', [$this, 'ph_text_font_size_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_text_font_size' );
		// Circle color
		add_settings_field( 'ph_circle_bg_color', 'Circle background color', [$this, 'ph_circle_bg_color_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_circle_bg_color' );
		// Buttons background color
		add_settings_field( 'ph_btns_bg_color', 'Buttons background color', [$this, 'ph_btns_bg_color_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_btns_bg_color' );
		// Buttons text color
		add_settings_field( 'ph_btns_txts_color', 'Buttons text color', [$this, 'ph_btns_txts_color_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_btns_txts_color' );
		// Popup background color
		add_settings_field( 'ph_popup_bg_color', 'Popup background color', [$this, 'ph_popup_bg_color_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_popup_bg_color' );
		// Popup texts color
		add_settings_field( 'ph_popup_texts_color', 'Popup texts color', [$this, 'ph_popup_texts_color_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_popup_texts_color' );
		// First description
		add_settings_field( 'ph_popup_description', 'First description', [$this, 'ph_popup_description_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_popup_description' );
		// Thank you text
		add_settings_field( 'ph_thank_you_text', 'Thank you text', [$this, 'ph_thank_you_text_cb'], 'prayer_hub_page','prayer_hub_section' );
		register_setting( 'prayer_hub_section', 'ph_thank_you_text' );
		
	}

	function ph_email_cb(){
		echo '<input type="email" value="'.get_option( 'ph_email' ).'" placeholder="'.get_option( 'admin_email' ).'" name="ph_email">';
	}
	
	function ph_logo_url_cb(){
		echo '<input type="url" class="widefat" value="'.get_option( 'ph_logo_url' ).'" name="ph_logo_url">';
	}
	function ph_google_font_url_cb(){
		echo '<input type="url" placeholder="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600&display=swap" class="widefat" value="'.get_option( 'ph_google_font_url' ).'" name="ph_google_font_url">';
	}
	function ph_font_family_cb(){
		echo '<input type="text" placeholder="\'Montserrat\', sans-serif" class="widefat" value="'.get_option( 'ph_font_family' ).'" name="ph_font_family">';
	}
	function ph_form_title_cb(){
		echo '<input type="text" value="'.get_option( 'ph_form_title' ).'" placeholder="Join us in prayer" name="ph_form_title">';
	}
	function ph_form_title_font_size_cb(){
		echo '<input type="number" value="'.get_option( 'ph_form_title_font_size' ).'" placeholder="28" name="ph_form_title_font_size">';
		echo '<p style="margin: 0">Join us in prayer & Thank you</p>';
	}
	function ph_qsn_font_size_cb(){
		echo '<input type="number" value="'.get_option( 'ph_qsn_font_size' ).'" placeholder="18" name="ph_qsn_font_size">';
		echo '<p style="margin: 0">How can we pray for you?</p>';
	}
	function ph_label_font_size_cb(){
		echo '<input type="number" value="'.get_option( 'ph_label_font_size' ).'" placeholder="16" name="ph_label_font_size">';
	}
	function ph_text_font_size_cb(){
		echo '<input type="number" value="'.get_option( 'ph_text_font_size' ).'" placeholder="14" name="ph_text_font_size">';
	}
	function ph_circle_bg_color_cb(){
		echo '<input type="text" value="'.((get_option( 'ph_circle_bg_color' ))?get_option( 'ph_circle_bg_color' ):'#1D9BF0').'" data-default-color="#1D9BF0" name="ph_circle_bg_color" id="ph_circle_bg_color">';
	}
	function ph_btns_bg_color_cb(){
		echo '<input type="text" value="'.((get_option( 'ph_btns_bg_color' ))?get_option( 'ph_btns_bg_color' ):'#1D9BF0').'" data-default-color="#1D9BF0" name="ph_btns_bg_color" id="ph_btns_bg_color">';
	}
	function ph_btns_txts_color_cb(){
		echo '<input type="text" value="'.((get_option( 'ph_btns_txts_color' ))?get_option( 'ph_btns_txts_color' ):'#FFFFFF').'" data-default-color="#FFFFFF" name="ph_btns_txts_color" id="ph_btns_txts_color">';
	}
	function ph_popup_bg_color_cb(){
		echo '<input type="text" value="'.((get_option( 'ph_popup_bg_color' ))?get_option( 'ph_popup_bg_color' ):'#FFFFFF').'" data-default-color="#FFFFFF" name="ph_popup_bg_color" id="ph_popup_bg_color">';
	}
	function ph_popup_texts_color_cb(){
		echo '<input type="text" value="'.((get_option( 'ph_popup_texts_color' ))?get_option( 'ph_popup_texts_color' ):'#1D9BF0').'" data-default-color="#1D9BF0" name="ph_popup_texts_color" id="ph_popup_texts_color">';
	}
	function ph_popup_description_cb(){
		echo '<textarea placeholder="We enjoy praying together, seeking God\'s guidance and praising Him for His mercies in our lives. You can submit your prayer request by clicking on the \'Get Started\' button below." style="width: 350px; height: 150px; resize: none;" name="ph_popup_description">'.get_option( 'ph_popup_description' ).'</textarea>';
	}
	function ph_thank_you_text_cb(){
		echo '<textarea placeholder="We are so blessed you shared your prayer with us." style="width: 350px; height: 150px; resize: none;" name="ph_thank_you_text">'.get_option( 'ph_thank_you_text' ).'</textarea>';
	}
	

	function prayer_hub_menupage(){
		?>
		<h3>Settings</h3>
		<hr>
		<div class="ph-settings">
            <form method="post" action="options.php">
                <?php
                settings_fields( 'prayer_hub_section' );
                do_settings_sections('prayer_hub_page');
				echo '<i>Pro Church Studios, a project by <a href="#" target="_blank">David Reid Studios</a></i>';
                echo get_submit_button( 'Save Changes', 'secondary', 'save-ph-setting' );
                ?>
            </form>
        </div>
		<?php
	}

}
