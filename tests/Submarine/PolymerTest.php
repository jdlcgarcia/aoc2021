<?php

namespace Submarine;

use Jdlcgarcia\Aoc2021\Submarine\Polymer;
use Jdlcgarcia\Aoc2021\Submarine\PolymerInsertionRule;
use PHPUnit\Framework\TestCase;

class PolymerTest extends TestCase
{
    public function testCreatePolymerAndOneRuleAndGiveANaiveStep()
    {
        $template = 'NNCB';
        $dictionary = [
            'NN' => new PolymerInsertionRule('NN -> C')
        ];
        $polymer = new Polymer($template, $dictionary);
        $polymer->naiveStep();
        //$this->assertEquals('NCNCB', $polymer->getChain());
        $this->assertEquals(2-1, $polymer->getSummary());
    }

    public function testCreatePolymerAndOneRuleAndGiveASmartStep()
    {
        $template = 'NNCB';
        $dictionary = [
            'NN' => new PolymerInsertionRule('NN -> C')
        ];
        $polymer = new Polymer($template, $dictionary);
        $polymer->process(1);
        $this->assertEquals(2-1, $polymer->getSummary());
    }

    public function testCreatePolymerAndMultipleRulesWithNaiveSteps()
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
        $polymer->naiveStep();
        $this->assertEquals('NCNBCHB', $polymer->getChain());
        $this->assertEquals(2-1, $polymer->getSummary());
        $polymer->naiveStep();
        $this->assertEquals('NBCCNBBBCBHCB', $polymer->getChain());
        $this->assertEquals(6-1, $polymer->getSummary());
        $polymer->naiveStep();
        $this->assertEquals('NBBBCNCCNBBNBNBBCHBHHBCHB', $polymer->getChain());
        $polymer->naiveStep();
        $this->assertEquals('NBBNBNBBCCNBCNCCNBBNBBNBBBNBBNBBCBHCBHHNHCBBCBHCB', $polymer->getChain());
        $polymer->naiveStep();
        $this->assertEquals(97, strlen($polymer->getChain()));
        $polymer->naiveStep();
        $polymer->naiveStep();
        $polymer->naiveStep();
        $polymer->naiveStep();
        $polymer->naiveStep();
//        $this->assertEquals(1588, $polymer->getSummary());
//        for ($i = 11; $i < 40; $i++) {
//            $polymer->naiveStep();
//        }
//        $this->assertEquals(2188189693529, $polymer->getSummary());
    }

    public function testCreatePolymerAndMultipleRulesWithSmartSteps()
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
        $polymer->process(1);
        $this->assertEquals(2-1, $polymer->getSummary());
        $polymer->process(2);
        $this->assertEquals(5, $polymer->getSummary());
        $polymer->process(10);
        $this->assertEquals(1588, $polymer->getSummary());
//        $polymer->process(40);
//        $this->assertEquals(2188189693529, $polymer->getSummary());
    }
}