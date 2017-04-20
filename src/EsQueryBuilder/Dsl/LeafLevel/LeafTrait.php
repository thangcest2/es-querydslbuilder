<?php

namespace Sky\EsQueryBuilder\Dsl\LeafLevel;

use Sky\EsQueryBuilder\Dsl\Compound\BoolBuilder;

/**
 * Class TermLevelTrait
 * @package Sky\EsQueryBuilder\Dsl
 */
trait LeafTrait
{
    /**
     * @param $field
     * @param $val
     * @return array
     */
    public function term($field, $val)
    {
        return [
            'term' => [
                $field => $val,
            ]
        ];
    }

    /**
     * @param $field
     * @param $val
     * @return array
     */
    public function terms($field, $val)
    {
        return [
            'terms' => [
                $field => $val,
            ]
        ];
    }

    /**
     * @param $field
     * @param $val
     * @return array
     */
    public function range($field, $val)
    {
        return [
            'range' => [
                $field => $val,
            ]
        ];
    }

    /**
     * @param $field
     * @return array
     */
    public function exists($field)
    {
        return [
            'exists' => [
                'field' => $field,
            ]
        ];
    }

    /**
     * @param $field
     * @param $val
     * @return array
     */
    public function prefix($field, $val)
    {
        return [
            'prefix' => [
                $field => $val,
            ]
        ];
    }

    /**
     * @param $field
     * @param $val
     * @return array
     */
    public function wildcard($field, $val)
    {
        return [
            'wildcard' => [
                $field => $val,
            ]
        ];
    }

    /**
     * @param $field
     * @param $pattern
     * @return array
     */
    public function regexp($field, $pattern)
    {
        return [
            'regexp' => [
                $field => $pattern,
            ]
        ];
    }

    /**
     * @param $field
     * @param $val
     * @return array
     */
    public function fuzzy($field, $val)
    {
        return [
            'fuzzy' => [
                $field => $val,
            ]
        ];
    }

    /**
     * Filters documents matching the provided document / mapping type.
     *
     * @param $value
     * @return array
     */
    public function mappingType($value)
    {
        return [
            'type' => [
                'value' => $value
            ]
        ];
    }

    /**
     * Filters documents that only have the provided ids. Note, this query uses the _uid field.
     * The type is optional and can be omitted, and can also accept an array of values.
     * If no type is specified, all types defined in the index mapping are tried.
     *
     * @param $type
     * @param $ids
     * @return array
     */
    public function docIds($ids, $type = '')
    {
        $query = [
            'ids' => [
                'values' => $ids,
            ]
        ];
        if ($type) {
            $query['ids']['type'] = $type;
        }

        return $query;
    }

    public function getBoolBuilder()
    {
        return new BoolBuilder();
    }
    
    /*       FULLTEXT      */

    public function match($field, $val)
    {
        return [
            'match' => [
                $field => $val,
            ]
        ];
    }

    public function matchPhrase($field, $val)
    {
        return [
            'match_phrase' => [
                $field => $val,
            ]
        ];
    }

    public function matchPhrasePrefix($field, $val)
    {
        return [
            'match_phrase_prefix' => [
                $field => $val,
            ]
        ];
    }

    public function multiMatch($query, $type = 'best_fields', array $fields = [])
    {
        return [
            'multi_match' => [
                'query' => $query,
                'type' => $type,
                'fields' => $fields,
            ]
        ];
    }

    public function commonTerm($field, $val)
    {
        return [
            'common' => [
                $field => $val,
            ]
        ];
    }

    public function queryString($field, $val)
    {
        return [
            'query_string' => [
                $field => $val,
            ]
        ];
    }

    public function simpleQueryString($field, $val)
    {
        return [
            'simple_query_string' => [
                $field => $val,
            ]
        ];
    }

}
