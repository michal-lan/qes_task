<?php
/**
 * Api Helper.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

/**
 * ApiComponent Class.
 */
class ApiComponent extends Component {
	/**
	 * Include component Math to Api Helper.
	 */
	public $components = ['Math'];

	/**
	 * Helper which compare request with database and return new if not exists or read old result.
	 *
	 * @param array $args Array with arguments for helper like fields a,b,c.
	 */
	public function helper( $args ) {
		if ( ! isset( $args) ) { // Bail if not set parameters.
			return;
		}

		// Create Variables for quick table query.
		$requestsTable  = TableRegistry::get('Requests');
		$responsesTable = TableRegistry::get('Responses');

		// Check exists this request in Database.
		$get_requests = $requestsTable->find()
			->select(['id', 'response_id', 'queries'])
			->where([ 'a' => $args['a'] ])
			->where([ 'b' => $args['b'] ])
			->where([ 'c' => $args['c'] ])
			->where([ 'token' => $args['token'] ])
			->all();

		/**
		 *  If not exists try to resolve Quadratic Equation and add record to database.
		 */
		if ( $get_requests->isEmpty() ) {

			// Resolve and get results to variable.
			$QESolver = $this->Math->QESolver( $args['a'], $args['b'], $args['c'] );

			// Create new Object of Responeses and save record to database.
			$response          = $responsesTable->newEntity();
			$response->message = $QESolver['message'];
			if ( isset( $QESolver['x1'] ) ) {
				$response->x1 = $QESolver['x1'];
			}
			if ( isset( $QESolver['x2'] ) ) {
				$response->x2 = $QESolver['x2'];
			}

			if ( $responsesTable->save( $response ) ) { // If save is done.
				$response_id = $response->id; // set ID for response_id

				// Create new Object of Requests and save record to database.
				$request              = $requestsTable->newEntity();
				$request->response_id = $response_id;
				$request->token       = $args['token'];
				$request->a           = $args['a'];
				$request->b           = $args['b'];
				$request->c           = $args['c'];

		        if ( $requestsTable->save( $request ) ) { // If save is done.

					// Prepare Result.
					$result = array( 'status' => true );

					if ( isset( $QESolver['message'] ) ) {
						$result['message'] = $QESolver['message'];
					}
					if ( isset( $QESolver['x1'] ) ) {
						$result['x1'] = $QESolver['x1'];
					}
					if ( isset( $QESolver['x2'] ) ) {
						$result['x2'] = $QESolver['x2'];
					}

		        } else {
					$result = array( 'status' => false, 'message' => 'Error while saving Request to database' );
				}

	        } else {
				$result = array( 'status' => false, 'message' => 'Error while saving Response to database' );
			}

		} else { // if exists - get Response for this request.
			$good_request = $get_requests->first();

			try {
				// Get Response by ID from database.
				$response  = $responsesTable->get( $good_request->response_id );

				$response = $responsesTable->find()
					->select(['message', 'x1', 'x2'])
					->where([ 'id' => $good_request->response_id ])
					->first();

				// Prepare Result.
				$result = array( 'status' => true );

				if ( isset( $response->message ) ) {
					$result['message'] = $response->message;
				}
				if ( isset( $response->x1 ) ) {
					$result['x1'] = $response->x1;
				}
				if ( isset( $response->x2 ) ) {
					$result['x2'] = $response->x2;
				}

				// Update queries number of request.
				$updated_record = $requestsTable->get( $good_request->id );
				$updated_record->queries = $good_request->queries + 1;
				$requestsTable->save( $updated_record );

			} catch (\Exception $e) {
				$result = array( 'status' => false, 'message' => 'Caught exception: ' . $e->getMessage() );
			}
		}

		return $result;
	}
}
