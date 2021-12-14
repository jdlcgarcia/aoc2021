<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Polymer;
use Jdlcgarcia\Aoc2021\Submarine\PolymerInsertionRule;
use PHPUnit\Framework\TestCase;

class PolymerTest extends TestCase
{
    public function testCreatePolymerAndOneRule()
    {
        $template = 'NNCB';
        $dictionary = [
            'NN' => new PolymerInsertionRule('NN -> C')
        ];
        $polymer = new Polymer($template, $dictionary);
        $polymer->step();
        $this->assertEquals('NCNCB', $polymer->getChain());
    }

    public function testCreatePolymerAndMultipleRules()
    {
        $template = 'NNCB';
        $listOfRules = [
            'CH -> B',
            'HH -> N',
            'CB -> H',
            'NH -> C',
            'HB -> C',
            'HC -> B',
            'HN -> C',
            'NN -> C',
            'BH -> H',
            'NC -> B',
            'NB -> B',
            'BN -> B',
            'BB -> N',
            'BC -> B',
            'CC -> N',
            'CN -> C',
        ];
        $dictionary = [];
        foreach($listOfRules as $rawRule) {
            $rule = new PolymerInsertionRule($rawRule);
            $dictionary[$rule->getPair()] = $rule;
        }
        $polymer = new Polymer($template, $dictionary);
        $polymer->step();
        $this->assertEquals('NCNBCHB', $polymer->getChain());
        $polymer->step();
        $this->assertEquals('NBCCNBBBCBHCB', $polymer->getChain());
        $polymer->step();
        $this->assertEquals('NBBBCNCCNBBNBNBBCHBHHBCHB', $polymer->getChain());
        $polymer->step();
        $this->assertEquals('NBBNBNBBCCNBCNCCNBBNBBNBBBNBBNBBCBHCBHHNHCBBCBHCB', $polymer->getChain());
        $polymer->step();
        $this->assertEquals(97, strlen($polymer->getChain()));
        $polymer->step();
        $polymer->step();
        $polymer->step();
        $polymer->step();
        $polymer->step();
        $this->assertEquals(1588, $polymer->getSummary());
    }
}