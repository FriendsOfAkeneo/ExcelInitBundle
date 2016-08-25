<?php

namespace spec\Pim\Bundle\ExcelInitBundle\Iterator;

use PhpSpec\ObjectBehavior;
use Pim\Bundle\ExcelInitBundle\Mapper\AttributeTypeMapperInterface;
use Symfony\Component\OptionsResolver\Exception\MissingOptionsException;

class InitAttributesFileIteratorSpec extends ObjectBehavior
{
    public function let(AttributeTypeMapperInterface $attributeTypesMapper)
    {
        $this->beConstructedWith(
            'xlsx',
            $this->getPath() . DIRECTORY_SEPARATOR . 'dummy1.xlsx',
            [
                'header_key'             => 'header1',
                'include_worksheets'     => ['/^Sheet4$/'],
                'attribute_types_mapper' => $attributeTypesMapper,
            ]
        );
    }

    public function it_must_have_a_mapper_as_option()
    {
        $this->beConstructedWith(
            'xlsx',
            $this->getPath() . DIRECTORY_SEPARATOR . 'dummy2.xlsx',
            [
                'header_key'             => 'header1',
                'include_worksheets'     => ['/^Sheet4$/'],
            ]
        );
        $this->shouldThrow(MissingOptionsException::class)->duringInstantiation();
    }

    public function it_can_get_the_mapper($attributeTypesMapper)
    {
        $this->getAttributeTypesMapper()->shouldReturn($attributeTypesMapper);
    }

    private function getPath()
    {
        return __DIR__ . DIRECTORY_SEPARATOR . '..' .
        DIRECTORY_SEPARATOR . 'fixtures';
    }
}
