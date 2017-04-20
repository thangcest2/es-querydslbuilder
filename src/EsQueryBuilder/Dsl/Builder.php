<?php

namespace Sky\EsQueryBuilder\Dsl;

use Sky\EsQueryBuilder\AbstractBuilder;
use Sky\EsQueryBuilder\Dsl\Compound\BoolBuilder;
use Sky\EsQueryBuilder\Dsl\LeafLevel\LeafTrait;

/**
 * Class Builder
 * @package Sky\EsQueryBuilder\Dsl
 */
class Builder extends AbstractBuilder
{
    use LeafTrait;

    const BOOL_MUST = 'must';
    const BOOL_MUST_NOT = 'must_not';
    const BOOL_SHOULD = 'should';
    const BOOL_FILTER = 'filter';

    const CONSTANT_SCORE_FILTER = 'filter';

    protected $queryBody = [];

    public function constantScoreWithTerm($field, $val)
    {
        $this->queryBody['constant_score'][self::CONSTANT_SCORE_FILTER][] = [
            $this->term($field, $val),
        ];

        return $this;
    }

    public function constantScoreWithTerms($field, $val)
    {
        $this->queryBody['constant_score'][self::CONSTANT_SCORE_FILTER][] = [
            $this->terms($field, $val),
        ];

        return $this;
    }

    public function constantScoreWithRange($field, $val)
    {
        $this->queryBody['constant_score'][self::CONSTANT_SCORE_FILTER][] = [
            $this->range($field, $val),
        ];

        return $this;
    }

    public function constantScoreWithExists($field, $val)
    {
        $this->queryBody['constant_score'][self::CONSTANT_SCORE_FILTER][] = [
            $this->exists($field, $val),
        ];

        return $this;
    }

    public function constantScoreWithRegexp($field, $val)
    {
        $this->queryBody['constant_score'][self::CONSTANT_SCORE_FILTER][] = [
            $this->regexp($field, $val),
        ];

        return $this;
    }

    public function boolWithTerm($field, $val, $type = self::BOOL_MUST)
    {
        $this->queryBody['bool'][$type][] = [
            $this->term($field, $val),
        ];

        return $this;
    }

    public function boolWithTerms($field, $val, $type = self::BOOL_MUST)
    {
        $this->queryBody['bool'][$type][] = [
            $this->terms($field, $val),
        ];

        return $this;
    }

    public function boolWithRange($field, $val, $type = self::BOOL_MUST)
    {
        $this->queryBody['bool'][$type][] = [
            $this->range($field, $val),
        ];

        return $this;
    }

    public function boolWithExists($field, $val, $type = self::BOOL_MUST)
    {
        $this->queryBody['bool'][$type][] = [
            $this->exists($field, $val),
        ];

        return $this;
    }

    public function boolWithPrefix($field, $val, $type = self::BOOL_MUST)
    {
        $this->queryBody['bool'][$type][] = [
            $this->prefix($field, $val),
        ];

        return $this;
    }

    public function boolWithWillCard($field, $val, $type = self::BOOL_MUST)
    {
        $this->queryBody['bool'][$type][] = [
            $this->willcard($field, $val),
        ];

        return $this;
    }

    public function boolWithRegexp($field, $pattern, $type = self::BOOL_MUST)
    {
        $this->queryBody['bool'][$type][] = [
            $this->regexp($field, $pattern),
        ];

        return $this;
    }

    public function boolWithMatch($field, $val, $type = self::BOOL_MUST)
    {
        $this->queryBody['bool'][$type][] = [
            $this->match($field, $val),
        ];

        return $this;
    }

    public function boolWithBool(BoolBuilder $boolBuilder, $type = self::BOOL_MUST)
    {
        $this->queryBody['bool'][$type][] = $boolBuilder->toArray();

        return $this;
    }
}
