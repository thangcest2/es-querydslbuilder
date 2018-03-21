<?php

namespace Sky\EsQueryBuilder\Dsl\Compound;

use Sky\EsQueryBuilder\Object;

class BoolBuilder extends Object
{
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
            'term' => [
                $field => $val,
            ],
        ];

        return $this;
    }

    public function withTerms($field, $val, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            'terms' => [
                $field => $val,
            ],
        ];

        return $this;
    }

    public function withRange($field, $val, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            'range' => [
                $field => $val,
            ],
        ];

        return $this;
    }

    public function withExists($field, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            'exists' => [
                'field' => $field,
            ],
        ];

        return $this;
    }

    public function withPrefix($field, $val, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            'prefix' => [
                $field => $val,
            ],
        ];

        return $this;
    }

    public function withWildcard($field, $val, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            'wildcard' => [
                $field => $val,
            ],
        ];

        return $this;
    }

    public function withRegexp($field, $pattern, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            'regexp' => [
                $field => $pattern,
            ],
        ];

        return $this;
    }

    public function withMatch($field, $val, $type = self::BOOL_MUST)
    {
        $this->body['bool'][$type][] = [
            'match' => [
                $field => $val,
            ],
        ];

        return $this;
    }
}
