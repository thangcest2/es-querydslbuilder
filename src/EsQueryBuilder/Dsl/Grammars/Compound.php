<?php

namespace Sky\EsQueryBuilder\Dsl\Grammars;

use Sky\EsQueryBuilder\AbstractGrammar;
use Sky\EsQueryBuilder\Dsl\Grammars\Compound\BoolCompound;

class Compound extends AbstractGrammar
{
    public function constantScore()
    {

    }

    public function boolCompound()
    {
        $this->queryBody['bool'] = [];
        
        return new BoolCompound($this->builder);
    }

    public function disMax()
    {
        
    }

    public function functionScore()
    {

    }

    public function boosting()
    {

    }
}
