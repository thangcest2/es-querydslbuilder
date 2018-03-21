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
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-term-query.html
     *
     * @param string $field
     * @param string|array $val
     * @return $this
     */
    public function term(string $field, $val)
    {
        $this->queryBody['term'] = [
            $field => $val,
        ];

        return $this;
    }

    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-terms-query.html
     *
     * @param string $field
     * @param string|array $val
     * @return array
     */
    public function terms(string $field, $val)
    {
        return [
            'terms' => [
                $field => $val,
            ]
        ];
    }

    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-range-query.html
     *
     * @param string $field
     * @param string|array $val
     * @return array
     */
    public function range(string $field, $val)
    {
        return [
            'range' => [
                $field => $val,
            ]
        ];
    }

    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-exists-query.html
     *
     * @param string $field
     * @return array
     */
    public function exists(string $field)
    {
        return [
            'exists' => [
                'field' => $field,
            ]
        ];
    }

    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-prefix-query.html
     *
     * @param string $field
     * @param string|array $val
     * @return array
     */
    public function prefix(string $field, $val)
    {
        return [
            'prefix' => [
                $field => $val,
            ]
        ];
    }

    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-wildcard-query.html
     *
     * @param string $field
     * @param string|array $val
     * @return array
     */
    public function wildcard(string $field, $val)
    {
        return [
            'wildcard' => [
                $field => $val,
            ],
        ];
    }

    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-regexp-query.html
     *
     * @param string $field
     * @param string|array $pattern
     * @return array
     */
    public function regexp(string $field, $pattern)
    {
        return [
            'regexp' => [
                $field => $pattern,
            ],
        ];
    }

    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-fuzzy-query.html
     *
     * @param string $field
     * @param string|array $val
     * @return array
     */
    public function fuzzy($field, $val)
    {
        return [
            'fuzzy' => [
                $field => $val,
            ],
        ];
    }

    /**
     * Find documents of the specified type.
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

    /*       COMPOUND - BOOL      */

    public function getBoolBuilder()
    {
        return new BoolBuilder();
    }

    /**
     * @param $isNone bool
     * @param array $extraParams
     * @return array
     */
    public function matchAll(bool $isNone, array $extraParams = [])
    {
        if (!$isNone) {
            return [
                'match_all' => $extraParams,
            ];
        }

        return [
            'match_none' => $extraParams,
        ];
    }

    /*       FULLTEXT      */

    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-match-query.html
     *
     * @param string $field
     * @param string|array $val
     * @return array
     */
    public function match(string $field, $val)
    {
        return [
            'match' => [
                $field => $val,
            ],
        ];
    }

    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-match-query-phrase.html
     *
     * @param string $field
     * @param string|array $val
     * @return array
     */
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

    /**
     * https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-multi-match-query.html
     *
     * @param $query
     * @param string $type
     * @param array $fields, avail: best_fields, most_fields, cross_fields, phrase, phrase_prefix
     * @param array $extraParams
     * @return array
     */
    public function multiMatch($query, $type = 'best_fields', array $fields = [], $extraParams = [])
    {
        $mainBody = [
            'query' => $query,
            'type' => $type,
            'fields' => $fields,
        ];
        $mainBody += $extraParams;

        return [
            'multi_match' => $mainBody,
        ];
    }

    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-common-terms-query.html
     *
     * @param array $body
     * @return array
     */
    public function commonTerm(array $body)
    {
        return [
            'common' => [
                'body' => $body,
            ]
        ];
    }

    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-query-string-query.html
     *
     * @param array $params
     * @return array
     */
    public function queryString(array $params)
    {
        return [
            'query_string' => $params,
        ];
    }

    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-simple-query-string-query.html
     *
     * @param $params
     * @return array
     */
    public function simpleQueryString(array $params)
    {
        return [
            'simple_query_string' => $params
        ];
    }
}
