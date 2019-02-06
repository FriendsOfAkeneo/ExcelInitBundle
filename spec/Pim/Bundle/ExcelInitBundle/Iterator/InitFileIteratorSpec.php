<?php

namespace spec\Pim\Bundle\ExcelInitBundle\Iterator;

use PhpSpec\ObjectBehavior;

class InitFileIteratorSpec extends ObjectBehavior
{
    public function it_can_read_multiple_tabs()
    {
        $this->beConstructedWith(
            'xlsx',
            $this->getPath() . DIRECTORY_SEPARATOR . 'dummy1.xlsx',
            [
                'header_key'         => 'header1',
                'include_worksheets' => ['/^Sheet1$/', '/^Sheet2$/'],
            ]
        );
        $this->rewind();
        $values = [
            ['header1', 'header2', 'header3', 'header4', 'header5',],
            ['Value-1-1-1', 'Value-1-1-2', 'Value-1-1-3', 'Value-1-1-4', 'Value-1-1-5',],
            ['Value-1-2-1', 'Value-1-2-2', 'Value-1-2-3', 'Value-1-2-4', 'Value-1-2-5',],
            ['Value-1-3-1', 'Value-1-3-2', 'Value-1-3-3', 'Value-1-3-4', 'Value-1-3-5',],
            ['Value-1-4-1', 'Value-1-4-2', 'Value-1-4-3', 'Value-1-4-4', 'Value-1-4-5',],
            ['Value-1-5-1', 'Value-1-5-2', 'Value-1-5-3', 'Value-1-5-4', 'Value-1-5-5',],
            ['Value-2-1-1', 'Value-2-1-2', 'Value-2-1-3', 'Value-2-1-4', 'Value-2-1-5',],
            ['Value-2-2-1', 'Value-2-2-2', 'Value-2-2-3', 'Value-2-2-4', 'Value-2-2-5',],
            ['Value-2-3-1', 'Value-2-3-2', 'Value-2-3-3', 'Value-2-3-4', 'Value-2-3-5',],
            ['Value-2-4-1', 'Value-2-4-2', 'Value-2-4-3', 'Value-2-4-4', 'Value-2-4-5',],
            ['Value-2-5-1', 'Value-2-5-2', 'Value-2-5-3', 'Value-2-5-4', 'Value-2-5-5',],
        ];
        foreach ($values as $row) {
            $this->current()->shouldReturn($row);
            $this->next();
        }
        $this->valid()->shouldReturn(false);
    }

    public function it_can_filter_excluded_tabs()
    {
        $this->beConstructedWith(
            'xlsx',
            $this->getPath() . DIRECTORY_SEPARATOR . 'dummy1.xlsx',
            [
                'header_key'         => 'header1',
                'exclude_worksheets' => ['/^Sheet[134]$/'],
            ]
        );
        $this->rewind();
        $values = [
            ['header1', 'header2', 'header3', 'header4', 'header5',],
            ['Value-2-1-1', 'Value-2-1-2', 'Value-2-1-3', 'Value-2-1-4', 'Value-2-1-5',],
            ['Value-2-2-1', 'Value-2-2-2', 'Value-2-2-3', 'Value-2-2-4', 'Value-2-2-5',],
            ['Value-2-3-1', 'Value-2-3-2', 'Value-2-3-3', 'Value-2-3-4', 'Value-2-3-5',],
            ['Value-2-4-1', 'Value-2-4-2', 'Value-2-4-3', 'Value-2-4-4', 'Value-2-4-5',],
            ['Value-2-5-1', 'Value-2-5-2', 'Value-2-5-3', 'Value-2-5-4', 'Value-2-5-5',],
        ];
        foreach ($values as $row) {
            $this->current()->shouldReturn($row);
            $this->next();
        }
        $this->valid()->shouldReturn(false);
    }

    public function it_can_filter_included_and_excluded_tabs()
    {
        $this->beConstructedWith(
            'xlsx',
            $this->getPath() . DIRECTORY_SEPARATOR . 'dummy1.xlsx',
            [
                'header_key'         => 'header1',
                'include_worksheets' => ['/^Sheet1$/', '/^Sheet2$/'],
                'exclude_worksheets' => ['/^Sheet1$/'],
            ]
        );
        $this->rewind();
        $values = [
            ['header1', 'header2', 'header3', 'header4', 'header5',],
            ['Value-2-1-1', 'Value-2-1-2', 'Value-2-1-3', 'Value-2-1-4', 'Value-2-1-5',],
            ['Value-2-2-1', 'Value-2-2-2', 'Value-2-2-3', 'Value-2-2-4', 'Value-2-2-5',],
            ['Value-2-3-1', 'Value-2-3-2', 'Value-2-3-3', 'Value-2-3-4', 'Value-2-3-5',],
            ['Value-2-4-1', 'Value-2-4-2', 'Value-2-4-3', 'Value-2-4-4', 'Value-2-4-5',],
            ['Value-2-5-1', 'Value-2-5-2', 'Value-2-5-3', 'Value-2-5-4', 'Value-2-5-5',],
        ];
        foreach ($values as $row) {
            $this->current()->shouldReturn($row);
            $this->next();
        }
        $this->valid()->shouldReturn(false);
    }

    public function it_can_use_a_different_valdata_range()
    {
        $this->beConstructedWith(
            'xlsx',
            $this->getPath() . DIRECTORY_SEPARATOR . 'dummy1.xlsx',
            [
                'header_key'         => 'header1',
                'include_worksheets' => ['/^Sheet3$/'],
            ]
        );
        $this->rewind();
        $values = [
            ['header1', 'header2', 'header3', 'header4', 'header5',],
            ['Value-3-1-1', 'Value-3-1-2', 'Value-3-1-3', 'Value-3-1-4', 'Value-3-1-5',],
            ['Value-3-2-1', 'Value-3-2-2', 'Value-3-2-3', 'Value-3-2-4', 'Value-3-2-5',],
            ['Value-3-3-1', 'Value-3-3-2', 'Value-3-3-3', 'Value-3-3-4', 'Value-3-3-5',],
            ['Value-3-4-1', 'Value-3-4-2', 'Value-3-4-3', 'Value-3-4-4', 'Value-3-4-5',],
            ['Value-3-5-1', 'Value-3-5-2', 'Value-3-5-3', 'Value-3-5-4', 'Value-3-5-5',],
        ];
        foreach ($values as $row) {
            $this->current()->shouldReturn($row);
            $this->next();
        }
        $this->valid()->shouldReturn(false);
    }


    private function getPath()
    {
        return __DIR__ . DIRECTORY_SEPARATOR . '..' .
        DIRECTORY_SEPARATOR . 'fixtures';
    }
}
