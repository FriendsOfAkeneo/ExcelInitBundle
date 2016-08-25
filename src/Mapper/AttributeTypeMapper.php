<?php

namespace Pim\Bundle\ExcelInitBundle\Mapper;

/**
 * Attributes types mapper
 * return internal PIM internal attribute type from a human readable key
 *
 * @author    JM Leroux <jean-marie.leroux@akeneo.com>
 * @copyright 2016 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class AttributeTypeMapper implements AttributeTypeMapperInterface
{
    /** @var string[] */
    protected $attributeTypes = [];

    /**
     * {@inheritdoc}
     */
    public function addAttributeTypeMapping($key, $value)
    {
        $this->attributeTypes[$key] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getMappedValue($key)
    {
        if (array_key_exists($key, $this->attributeTypes)) {
            return $this->attributeTypes[$key];
        }

        return null;
    }
}
