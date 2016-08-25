<?php

namespace spec\Pim\Bundle\ExcelInitBundle\Mapper;

use PhpSpec\ObjectBehavior;

class AttributeTypeMapperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldImplement('Pim\Bundle\ExcelInitBundle\Mapper\AttributeTypeMapperInterface');
    }

    function it_should_get_mapped_attribute_types()
    {
        $this->addAttributeTypeMapping('label1', 'type1');
        $this->addAttributeTypeMapping('label2', 'type2');

        $this->getMappedValue('label1')->shouldReturn('type1');
        $this->getMappedValue('label2')->shouldReturn('type2');
    }

    function it_should_return_null_for_non_mapped_attribute_types()
    {
        $this->addAttributeTypeMapping('label1', 'type1');
        $this->addAttributeTypeMapping('label2', 'type2');

        $this->getMappedValue('label3')->shouldReturn(null);
    }
}
