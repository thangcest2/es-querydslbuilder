<?php

namespace Sky\EsQueryBuilder\Dsl\Grammars\Compound;

use Sky\EsQueryBuilder\Dsl\Grammars\Compound;
use Sky\EsQueryBuilder\Dsl\Grammars\TermLevel;

class BoolCompound extends Compound
{
    public function must()
    {
        $this->queryBody['bool']['must'] = [];
        
        return $this;
    }
    
    public function mustNot()
    {
        $this->queryBody['bool']['must_not'] = [];

        return $this;
    }

    public function filter()
    {
        $this->queryBody['bool']['filter'] = [];

        return $this;
    }

    public function should()
    {
        $this->queryBody['bool']['should'] = [];

        return $this;
    }

    public function withTermLevel()
    {
        new TermLevel($this->builder);
    }
}
