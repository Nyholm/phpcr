<?php
declare(ENCODING = 'utf-8');
namespace PHPCR\Query\QOM;

/*                                                                        *
 * This file was ported from the Java JCR API to PHP by                   *
 * Karsten Dambekalns <karsten@typo3.org> for the FLOW3 project.          *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version. Alternatively, you may use the Simplified   *
 * BSD License.                                                           *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Filters node-tuples based on the outcome of a binary operation.
 *
 * For any comparison, operand2 always evaluates to a scalar value. In contrast,
 * operand1 may evaluate to an array of values (for example, the value of a multi-valued
 * property), in which case the comparison is separately performed for each element
 * of the array, and the Comparison constraint is satisfied as a whole if the
 * comparison against any element of the array is satisfied.
 *
 * If operand1 and operand2 evaluate to values of different property types, the
 * value of operand2 is converted to the property type of the value of operand1.
 * If the type conversion fails, the query is invalid.
 *
 * If operator is not supported for the property type of operand1, the query is invalid.
 *
 * If operand1 evaluates to null (for example, if the operand evaluates the value
 * of a property which does not exist), the constraint is not satisfied.
 *
 * The JCR_OPERATOR_EQUAL_TO operator is satisfied only if the value of operand1
 * equals the value of operand2.
 *
 * The JCR_OPERATOR_NOT_EQUAL_TO operator is satisfied unless the value of
 * operand1 equals the value of operand2.
 *
 * The JCR_OPERATOR_LESSS_THAN operator is satisfied only if the value of
 * operand1 is ordered before the value of operand2.
 *
 * The JCR_OPERATOR_LESS_THAN_OR_EQUAL_TO operator is satisfied unless the value
 * of operand1 is ordered after the value of operand2.
 *
 * The JCR_OPERATOR_GREATER_THAN operator is satisfied only if the value of
 * operand1 is ordered after the value of operand2.
 *
 * The JCR_OPERATOR_GREATER_THAN_OR_EQUAL_TO operator is satisfied unless the
 * value of operand1 is ordered before the value of operand2.
 *
 * The JCR_OPERATOR_LIKE operator is satisfied only if the value of operand1
 * matches the pattern specified by the value of operand2, where in the pattern:
 * * the character "%" matches zero or more characters, and
 * * the character "_" (underscore) matches exactly one character, and
 * * the string "\x" matches the character "x", and
 *   all other characters match themselves.
 *
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 * @license http://opensource.org/licenses/bsd-license.php Simplified BSD License
 * @api
 */
interface ComparisonInterface extends \PHPCR\Query\QOM\ConstraintInterface {

    /**
     *
     * Gets the first operand.
     *
     * @return \PHPCR\Query\QOM\DynamicOperandInterface the operand; non-null
     * @api
     */
    public function getOperand1();

    /**
     * Gets the operator.
     *
     * @return string one of \PHPCR\Query\QOM\QueryObjectModelConstantsInterface.JCR_OPERATOR_*
     * @api
     */
    public function getOperator();

    /**
     * Gets the second operand.
     *
     * @return \PHPCR\Query\QOM\StaticOperandInterface the operand; non-null
     * @api
     */
    public function getOperand2();

}