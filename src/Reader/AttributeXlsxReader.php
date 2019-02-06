<?php

namespace Pim\Bundle\ExcelInitBundle\Reader;

use Pim\Bundle\ExcelInitBundle\Iterator\InitAttributesFileIterator;
use Akeneo\Tool\Component\Connector\Reader\File\Xlsx\Reader;

class AttributeXlsxReader extends Reader
{
    /** @var InitAttributesFileIterator */
    protected $fileIterator;

    protected function getArrayConverterOptions()
    {
        return [
            'attribute_types_mapper' => $this->fileIterator->getAttributeTypesMapper()
        ];
    }
}
