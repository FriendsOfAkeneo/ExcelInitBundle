<?php

namespace Pim\Bundle\ExcelInitBundle\Mapper;

/**
 * Attributes types mapper
 * return internal PIM internal attribute type from a human readable key
 *
 * @author    JM Leroux <jean-marie.leroux@akeneo.com>
 * @author    Antoine Guigan <antoine@akeneo.com>
 * @copyright 2013 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface AttributeTypeMapperInterface
{
    /**
     * @param string $key
     * @param string $value
     */
    public function addAttributeTypeMapping($key, $value);

    /**
     * @param $key
     *
     * @return null|string
     */
    public function getMappedValue($key);
}
