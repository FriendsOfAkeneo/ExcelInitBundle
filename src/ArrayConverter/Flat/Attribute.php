<?php

namespace Pim\Bundle\ExcelInitBundle\ArrayConverter\Flat;

use Pim\Bundle\ExcelInitBundle\Mapper\AttributeTypeMapperInterface;
use Akeneo\Pim\Structure\Component\ArrayConverter\FlatToStandard\Attribute as PimAttributeConverter;

/**
 * Convert flat format to standard format for attribute
 *
 * @author    JM Leroux <jean-marie.leroux@akeneo.com>
 * @copyright 2016 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Attribute extends PimAttributeConverter
{
    /** @var AttributeTypeMapperInterface */
    protected $attributeTypesMapper;

    public function convert(array $item, array $options = [])
    {
        $this->attributeTypesMapper = $options['attribute_types_mapper'];
        return parent::convert($item, $options);
    }

    protected function convertFields($field, $booleanFields, $data, $convertedItem)
    {
        if (empty($field) || 'use_as_label' === $field) {
            return $convertedItem;
        }
        if (0 !== $data && empty($data)) {
            return $convertedItem;
        }

        if ('type' === $field) {
            $pimType = $this->attributeTypesMapper->getMappedValue($data);
            if (null !== $pimType) {
                $convertedItem['type'] = $pimType;
            }
        } else {
            $convertedItem = parent::convertFields($field, $booleanFields, $data, $convertedItem);
        }

        return $convertedItem;
    }
}
