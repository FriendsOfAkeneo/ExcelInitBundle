<?php

namespace Pim\Bundle\ExcelInitBundle\Iterator;

use Pim\Bundle\ExcelInitBundle\Mapper\AttributeTypeMapperInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * XSLX file iterator
 *
 * @author    JM Leroux <jean-marie.leroux@akeneo.com>
 * @author    Antoine Guigan <antoine@akeneo.com>
 * @copyright 2013 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class InitAttributesFileIterator extends InitFileIterator
{
    /** @var AttributeTypeMapperInterface */
    protected $attributeTypesMapper;

    public function __construct($type, $filePath, array $options)
    {
        parent::__construct($type, $filePath, $options);
        $this->attributeTypesMapper = $options['attribute_types_mapper'];
    }

    /**
     * @return AttributeTypeMapperInterface
     */
    public function getAttributeTypesMapper()
    {
        return $this->attributeTypesMapper;
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->initializeAttributeTypes();
        parent::rewind();
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults(
            [
                'skip_empty' => true,
            ]
        );
        $resolver->setRequired([
            'attribute_types_mapper',
        ]);
    }

    /**
     * Returns the Excel Helper service
     *
     * @throws \RuntimeException
     */
    protected function initializeAttributeTypes()
    {
        $spout = $this->reader;
        $spout->getSheetIterator()->rewind();

        $attributeTypesWorksheet = null;

        foreach ($spout->getSheetIterator() as $worksheet) {
            if ('attribute_types' === $worksheet->getName()) {
                $attributeTypesWorksheet = $worksheet;
                break;
            }
        }

        if (null === $attributeTypesWorksheet) {
            throw new \RuntimeException('No attribute_types worksheet in the excel file');
        }

        foreach ($attributeTypesWorksheet->getRowIterator() as $key => $row) {
            if ($key >= 2) {
                $this->attributeTypesMapper->addAttributeTypeMapping($row[1], $row[0]);
            }
        }
    }
}
