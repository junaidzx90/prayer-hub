<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Prayer_Hub
 * @subpackage Prayer_Hub/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Prayer_Hub
 * @subpackage Prayer_Hub/public
 * @author     Developer Junayed <admin@easeare.com>
 */
class Prayer_Hub_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/prayer-hub-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/prayer-hub-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script($this->plugin_name,"ph_ajax",array(
			"ajaxurl" => admin_url("admin-ajax.php"),
			"nonce" => wp_create_nonce( "ph_form" )
		) );
	}

	function ph_header_script(){
		?>
		<style>
			:root{
				--ph_circle_bg_color: <?php echo ((get_option( 'ph_circle_bg_color' ))?get_option( 'ph_circle_bg_color' ):'#1D9BF0') ?>;
				--ph_btns_bg_color: <?php echo ((get_option( 'ph_btns_bg_color' ))?get_option( 'ph_btns_bg_color' ):'#1D9BF0') ?>;
				--ph_btns_txts_color: <?php echo ((get_option( 'ph_btns_txts_color' ))?get_option( 'ph_btns_txts_color' ):'#FFFFFF') ?>;
				--ph_popup_bg_color: <?php echo ((get_option( 'ph_popup_bg_color' ))?get_option( 'ph_popup_bg_color' ):'#FFFFFF') ?>;
				--ph_popup_texts_color: <?php echo ((get_option( 'ph_popup_texts_color' ))?get_option( 'ph_popup_texts_color' ):'#1D9BF0') ?>;
			}
		</style>
		<?php
	}

	function ph_circle_view(){
		if(!is_admin( )){
			?>
			<div id="ph_box">
				<div id="ph_popup" class="dnone">
					<form action="" method="post" id="ph_form">
						<!-- Step 1 -->
						<div class="phstep phstep_1 ">
							<h3 class="ph_title">Join us in prayer</h3>
							<p><?php echo ((get_option( 'ph_popup_description' ))?get_option( 'ph_popup_description' ):'We enjoy praying together, seeking God\'s guidance and praising Him for His mercies in our lives. You can submit your prayer request by clicking on the "Get Started" button below.') ?></p>
							<button class="getStartStep1">Get Started</button>
						</div>

						<!-- spet 2 -->
						<div class="phstep phstep_2 dnone">
							<h3 class="ph_title_2">How can we pray for you?</h3>
							<div class="pray_field">
								<textarea required name="pray_request" id="pray_request"></textarea>
								<div class="texthints">
									<span class="keylength">0</span>
									<span class="maxlength">/500+</span>
								</div>
								<button class="ph_continue">Continue</button>
							</div>
						</div>

						<!-- spet 3 -->
						<div class="phstep phstep_3 dnone">
							<div class="ph_input_field">
								<label for="ph_username">What is your name?</label>
								<input required type="text" placeholder="First Name" name="username" id="ph_username">
							</div>
							<div class="ph_input_field">
								<label for="ph_useremail">What is your email?</label>
								<input required type="email" placeholder="Email" name="useremail" id="ph_useremail">
							</div>
							<div class="ph_input_field">
								<label for="ph_toogle">Whould you like us to follow up with you?</label>

								<input name="ph_toogle" type="checkbox" id="ph_toogle">
								<label for="ph_toogle" class="ph_toogle-button" data-label-on="Yes" data-label-off="No"></label>
							</div>
							<div class="ph_input_field">
								<input class="ph_submit" type="submit" name="ph_form_submit" value="Submit">
							</div>
						</div>

						<div class="ph_loader dnone">
							<svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
								<path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
								s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
								c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"></path>
								<path fill="<?php echo ((get_option( 'ph_circle_bg_color' ))?get_option( 'ph_circle_bg_color' ):'#1D9BF0') ?>" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
								C22.32,8.481,24.301,9.057,26.013,10.047z">
								<animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="0.9s" repeatCount="indefinite"></animateTransform>
								</path>
							</svg>
						</div>

						<!-- Confirmation -->
						<div class="ph_confirmation dnone">
							<h3 class="ph_thanks_title">Thank you</h3>
							<p>We are so blessed you shared your prayer with us.</p>
						</div>
					</form>
				</div>
				<div id="ph_circle">
					<button class="ph_btn" id="ph_opener"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.72 427.51"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Asset 3</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M196.85.7A23,23,0,0,1,224,31.07q-23.06,64.28-46.23,128.51c-3.88,11.06-8.13,22-11.78,33.13.28,10.47,1.11,20.93,1.73,31.39,6.27-17,12.17-34.06,18.43-51A30.79,30.79,0,0,1,245.3,189.6c-7.61,44.35-15.1,88.72-22.82,133a36.39,36.39,0,0,1-18.91,25.85Q133.79,385.29,63.9,421.86c-8.83,4.66-19.12,6.92-29,4.92A42.49,42.49,0,0,1,3.4,368.4c3.83-9.46,11.47-16.94,20.41-21.67q37-19.49,74-38.88-.21-60-.4-120a31.08,31.08,0,0,1,3.57-15Q141.2,93.12,181.47,13.42A23.41,23.41,0,0,1,196.85.7Z"/><path class="cls-1" d="M301.49,1.4a23,23,0,0,1,23.73,5c3.57,3.38,5.54,8,7.74,12.28q37.56,74.38,75.15,148.76c2,4,4.25,8,5.39,12.38,1.12,4.89.83,9.94.83,14.91q-.19,56.55-.38,113.1,34.32,18.08,68.68,36.08c6,3.11,12.14,6.3,16.84,11.26a42.47,42.47,0,0,1-35.68,71.93c-10.69-1.3-19.75-7.52-29.17-12.2l-114-59.87c-6-3.29-12.37-6.05-17.9-10.14-7.44-5.52-12.07-14.14-13.63-23.17Q278.12,258.3,267.3,194.84C266,188.1,265,181,267.25,174.31a30.82,30.82,0,0,1,28.61-21.63c12.7-.51,25,7.84,29.44,19.71C331.71,189.6,337.69,207,344,224.21c.65-9.8,1.16-19.62,1.76-29.42.29-2.86-1.18-5.44-2-8.07Q316.44,111,289.18,35.2c-1.72-4.57-3.36-9.38-2.79-14.33A23,23,0,0,1,301.49,1.4Z"/></g></g></svg></button>
					<button class="ph_btn dnone" id="ph_close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 421.5 512"><defs><style>.cls-1{fill:#fff;}</style></defs><title>Asset 2</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M209.41,0h2.65c9.84.59,19.48,5.2,25.53,13.07,5.23,6.41,7.54,14.75,7.44,22.94q0,179.72,0,359.45,58.79-58.77,117.47-117.63c7.07-7.26,17.21-11.55,27.39-10.67,14,.82,26.68,11.26,30.32,24.76a34,34,0,0,1-6.14,30.38c-3.72,4.6-8.17,8.52-12.27,12.76L240.27,496.58c-4.33,4.35-8.65,8.94-14.23,11.67a37.91,37.91,0,0,1-13.9,3.75h-2a37.23,37.23,0,0,1-14.73-3.72c-5.39-2.6-9.54-7-13.71-11.2L15.18,330.56c-3.52-3.49-7.13-7-9.84-11.15A34,34,0,0,1,1.9,290C6.26,277,19,267.44,32.72,267.1c9.8-.54,19.41,3.73,26.22,10.68q58.92,58.79,117.74,117.69,0-179.71,0-359.44c-.23-9.33,3-18.82,9.64-25.51C192.3,4.16,200.79.64,209.41,0Z"/></g></g></svg></button>
				</div>
			</div>
			<?php
		}
	}

	function email_template($data){
		$template = '<!doctype html>
		<html lang="en-US">
			<head>
				<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
				<title>Prayer Request</title>
				<meta name="description" content="Prayer request hub">
			</head>
			<style>
				a:hover {text-decoration: underline !important;}
			</style>
			
			<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
				<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
					style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: \'Open Sans\', sans-serif;">
					<tr>
						<td>
							<table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
								align="center" cellpadding="0" cellspacing="0">
								<!-- Email Content -->
								<tr>
									<td>
										<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
											style="max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
											<!-- Details Table -->
											<tr>
												<td>
													<table cellpadding="0" cellspacing="0"
														style="width: 100%; border: 1px solid #ededed">
														<tbody>
															<tr>
																<td
																	style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
																	Name
																</td>
																<td
																	style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
																	'.$data['name'].'
																</td>
															</tr>
															<tr>
																<td
																	style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
																	Email
																</td>
																<td
																	style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
																	'.$data['email'].'
																</td>
															</tr>
															<tr>
																<td
																	style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
																	Follow Up</td>
																<td
																	style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
																	'.$data['follow'].'
																</td>
															</tr>
															<tr>
																<td
																	style="padding: 10px; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)">
																	Request
																</td>
																<td style="padding: 10px; color: #455056;">
																	'.$data['request'].'
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</body>
		</html>';

		return $template;
	}

	function send_prayer_request($data){
		$template = $this->email_template($data);
		$adminEmail = get_option( 'admin_email' );
		$adminEmail = get_bloginfo( 'name' );

		$to = ((get_option( 'ph_email' ))?get_option( 'ph_email' ):$adminEmail);
		$subject = 'Prayer request';
		$body = $template;
		$headers = array('Content-Type: text/html; charset=UTF-8','From: '.$adminEmail.' <'.$adminEmail.'>');

		if(wp_mail( $to, $subject, $body, $headers )){
			return true;
		}
	}

	function submit_ph_form(){
		if(!wp_verify_nonce($_POST['nonce'],"ph_form" )){
			die("Invalid Request!");
		}

		if(isset($_POST['request']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['follow'])){
			$request = sanitize_text_field($_POST['request'] );
			$request = stripslashes($request);
			$uname = sanitize_text_field($_POST['name'] );
			$uname = stripslashes($uname);
			$email = sanitize_email( $_POST['email'] );
			$follow = $_POST['follow'];

			$response = $this->send_prayer_request(array(
				'request' => $request,
				'name' => $uname,
				'email' => $email,
				'follow' => $follow
			));

			if($request){
				echo json_encode(array("success" => "Success"));
				die;
			}
		}

		echo json_encode(array("error" => "Faild"));
		die;
	}
}
