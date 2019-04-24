<?php
/**
 * Math Component with all needed equations for Solver.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

class MathComponent extends Component {
	/**
	 * Delta - important equation for Quadratic Equation.
	 *
	 * @param int $a Number from field a.
	 * @param int $b Number from field b.
	 * @param int $c Number from field c.
	 */
	public function delta( $a, $b, $c ) {
		return pow($b, 2) - 4 * $a * $c;
	}

	/**
	 * Calculation of one solution for result.
	 *
	 * @param int $a Number from field a.
	 * @param int $b Number from field b.
	 */
	public function oneSolution( $a, $b ) {
		return array(
			'x0' => - ( $b / ( 2 * $a ) )
		);
	}

	/**
	 * Calculation of two solutions for result.
	 *
	 * @param int $delta Result of delta.
	 * @param int $a Number from field a.
	 * @param int $b Number from field b.
	 */
	public function twoSolutions( $delta, $a, $b ) {
		return array(
			'x1' => ( - $b - sqrt( $delta ) ) / ( 2 * $a ),
			'x2' => ( - $b + sqrt( $delta ) ) / ( 2 * $a )
		);
	}

	/**
	 * QESolver with conditionals prepared to return result.
	 *
	 * @param int $a Number from field a.
	 * @param int $b Number from field b.
	 * @param int $c Number from field c.
	 */
	public function QESolver( $a, $b, $c ) {
		$delta = $this->delta( $a, $b, $c );

		if ( $delta > 0) { // if delta is greater than zero
			$solutions = $this->twoSolutions( $delta, $a, $b );

			return array(
				'message' => 'Two Solutions',
				'x1'      => $solutions['x1'],
				'x2'      => $solutions['x2']
			);
		} elseif ( $delta == 0 ) { // if delta equals zero
			$solutions = $this->oneSolution( $a, $b );

			return array(
				'message' => 'One Solution',
				'x1'      => $solutions['x0']
			);
		} else { // if delta is less than zero
			return array(
				'message' => 'No Solutions',
			);
		}
	}
}
