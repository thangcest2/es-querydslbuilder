<?php

namespace Sky\EsQueryBuilder\Dsl\TraitLeaf;


trait FullTextTrait
{
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
