<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'ES_Base_Mailer' ) ) {
	/**
	 * Class ES_Base_Mailer
	 *
	 * @since 4.3.2
	 */
	class ES_Base_Mailer {
		/**
		 * Mailer name
		 *
		 * @since 4.3.2
		 * @var
		 *
		 */
		public $name;

		/**
		 * Mailer Slug
		 *
		 * @since 4.3.2
		 * @var
		 *
		 */
		public $slug;

		/**
		 * Mailer Version
		 *
		 * @since 4.3.2
		 * @var string
		 *
		 */
		public $version = '1.0';

		/**
		 * Request headers
		 *
		 * @var array
		 */
		public $headers = array();

		/**
		 * Request body
		 *
		 * @var array
		 */
		public $body = array();

		/**
		 * Added Logger Context
		 *
		 * @since 4.2.0
		 * @var array
		 *
		 */
		public $logger_context = array(
			'source' => 'ig_es_email_sending'
		);

		/**
		 * ES_Base_Mailer constructor.
		 *
		 * @since 4.3.2
		 */
		public function __construct() {

		}

		/**
		 * Send Method
		 *
		 * @since 4.3.2
		 */
		public function send( ES_Message $message ) {
			return new WP_Error( 'ig_es_email_sending_failed', 'Send Method Not Implemented' );
		}

		/**
		 * Method will be called before email send
		 *
		 * @since 4.3.2
		 */
		public function pre_send( ES_Message $message ) {

		}

		/**
		 * Method will be called after email send
		 *
		 * @since 4.3.2
		 */
		public function post_send( ES_Message $message ) {

		}

		/**
		 * Prepare Response
		 *
		 * @param string $status
		 * @param string $message
		 *
		 * @return bool|WP_Error
		 *
		 * @since 4.3.2
		 */
		public function do_response( $status = 'success', $message = '' ) {

			if ( 'success' !== $status ) {
				return new WP_Error( 'ig_es_email_sending_failed', $message );
			}

			return true;
		}

		/**
		 * Set individual header key=>value pair for the email.
		 *
		 * @param string $name
		 * @param string $value
		 * 
		 * @since 4.6.14
		 */
		public function set_header( $name, $value ) {

			$name = sanitize_text_field( $name );

			$this->headers[ $name ] = sanitize_text_field( $value );
		}

		/**
		 * Set email subject.
		 *
		 * @param string $subject
		 * 
		 * @since 4.6.14
		 */
		public function set_subject( $subject ) {

			$this->set_body_param(
				array(
					'subject' => $subject,
				)
			);
		}

		/**
		 * Set the request params, that goes to the body of the HTTP request.
		 *
		 * @param array $param Key=>value of what should be sent to a 3rd party mailing API.
		 *
		 * @since 4.6.14
		 */
		public function set_body_param( $param ) {
			$this->body = array_merge_recursive( $this->body, $param );
		}

		/**
		 * Get the default params
		 *
		 * @return array
		 * 
		 * @since 4.6.14
		 */
		public function get_default_params() {

			return apply_filters(
				'ig_es_mailer_default_params',
				array(
					'timeout'     => 15,
					'httpversion' => '1.1',
					'blocking'    => true,
				)
			);
		}

		/**
		 * Get the email body.
		 *
		 * @return string|array
		 *
		 * @since 4.6.14
		 */
		public function get_body() {

			return apply_filters( 'ig_es_mailer_get_body', $this->body, $this );
		}

		/**
		 * Get the email headers.
		 *
		 * @return array
		 *
		 * @since 4.6.14
		 */
		public function get_headers() {

			return apply_filters( 'ig_es_mailer_get_headers', $this->headers, $this );
		}
		
		/**
		 * Reset mailer data
		 *
		 * @return array
		 *
		 * @since 4.6.14
		 */
		public function reset_mailer_data() {

			$this->body    = array();
			$this->headers = array();
		}
	}
}
