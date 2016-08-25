<?php

namespace Pim\Bundle\ExcelInitBundle\Iterator;

/**
 * Helper methods for arrays
 *
 * @author    Antoine Guigan <antoine@akeneo.com>
 * @copyright 2013 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class ArrayHelper
{
    /**
     * Combines array of different sizes
     *
     * @param array $keys
     * @param array $values
     *
     * @return array
     */
    public function combineArrays(array $keys, array $values)
    {
        return array_combine($keys, $this->resizeArray($values, count($keys)));
    }

    /**
     * Resizes an array to the specified data count
     *
     * @param array $data
     * @param int   $count
     *
     * @return array
     */
    protected function resizeArray(array $data, $count)
    {
        if (count($data) < $count) {
            $data = array_merge($data, array_fill(0, $count - count($data), ''));
        }

        return array_slice($data, 0, $count);
    }
}
