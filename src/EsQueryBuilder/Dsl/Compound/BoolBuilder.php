<?php

namespace Sky\EsQueryBuilder\Dsl\Compound;

use Sky\EsQueryBuilder\Dsl\TraitLeaf\FullTextTrait;
use Sky\EsQueryBuilder\Dsl\TraitLeaf\TermLevelTrait;
use Sky\EsQueryBuilder\Object;

class BoolBuilder extends Object
{
    use FullTextTrait, TermLevelTrait;

    const BOOL_MUST = 'must';
    const BOOL_MUST_NOT = 'must_not';
    const BOOL_SHOULD = 'should';
    const BOOL_FILTER = 'filter';

    protected $body = [];

    public function __construct($body = [])
    {
        $this->body = $body;
    }

    public function withBool(BoolBuilder $boolBuilder, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = $boolBuilder->toArray();
        
        return $this;
    }

    public function withTerm($field, $val, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            $this->term($field, $val),
        ];

        return $this;
    }

    public function withTerms($field, $val, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            $this->terms($field, $val),
        ];

        return $this;
    }

    public function withRange($field, $val, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            $this->range($field, $val),
        ];

        return $this;
    }

    public function withExists($field, $val, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            $this->exists($field, $val),
        ];

        return $this;
    }

    public function withPrefix($field, $val, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            $this->prefix($field, $val),
        ];

        return $this;
    }

    public function withWillCard($field, $val, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            $this->willcard($field, $val),
        ];

        return $this;
    }

    public function withRegexp($field, $pattern, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            $this->regexp($field, $pattern),
        ];

        return $this;
    }

    public function withMatch($field, $val, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            $this->match($field, $val),
        ];

        return $this;
    }
}
