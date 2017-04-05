<?php

namespace Sky\EsQueryBuilder;

use Sky\EsQueryBuilder\Dsl\Builder;

abstract class AbstractGrammar
{
    protected $builder;
    
    protected $queryBody = [];
    
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
        $this->queryBody['tmp_pos'] = '';
    }
}
