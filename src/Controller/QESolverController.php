<?php
/**
 * QESolver API Simple Controller
 */

namespace App\Controller;

/**
 * QESolverController Class
 */
class QESolverController extends AppController {
	/**
	 * Initialize class and load components.
	 */
	public function initialize() {
        parent::initialize();
        $this->loadComponent( 'RequestHandler' );
		$this->loadComponent( 'Api' );
    }

	/**
	 * Request from API is preparing here.
	 */
	public function request() {
		$this->layout = false; // disable layout for json return.
		$response     = array( 'status' => 'error', 'message' => 'Error with query to API' ); // default return.
		$token        = sha1( "a"."b"."c" ); // token to compare with request token.

		if ( $this->request->is('post') ) { // if request is a post type.
			// Check Token from form and APP like Postman.
			if ( $token === $this->request->query('token') || $token === $this->request->data('token') ) {

				if ( empty( $this->request->query ) ) { // if empty query set data like args
					$args = $this->request->data();
				} else {
					$args = $this->request->query;
				}

				/**
				 * Get Result of API Request from API Helper.
				 */
				$result = $this->Api->helper( $args );
				if ( $result ) {
					$response = $result;
				} else {
					$response = array( 'status' => 'error', 'message' => 'Error with API controler' );
				}

			} else {
				$response = array( 'status' => 'error', 'message' => 'Wrong token' );
			}
		}

		/**
		 * Return API Response like json.
		 */
		$this->response->type( 'application/json' );
		$this->response->body( json_encode( $response ) );
		return $this->response->send();
	}
}
