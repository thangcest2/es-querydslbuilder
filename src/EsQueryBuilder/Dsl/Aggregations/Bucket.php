<?php

namespace Sky\EsQueryBuilder\Dsl\Aggregations;

class Bucket extends BaseAgg
{
    /**
     * @param string $aggregatorName
     * @param array $filters
     * @param BaseAgg|null $agg
     * @return $this
     */

    public function adjacencyMatrix(string $aggregatorName, array $filters, $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'adjacency_matrix' => [
                    'filters' => $filters,
                ],
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function children(string $aggregatorName, array $body, $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'children' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function dateHistogram(string $aggregatorName, array $body, $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'date_histogram' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function dateRange(string $aggregatorName, array $body, $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'date_range' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function diversifiedSampler(string $aggregatorName, array $body, $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'diversified_sampler' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function filter(string $aggregatorName, array $body, $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'filter' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param array $extraParams
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function filters(string $aggregatorName, array $body, array $extraParams, $agg = null)
    {
        $innerBody = [
            'filters' => [
                'filters' => $body,
            ],
        ];
        foreach ($extraParams as $key => $extraValue) {
            $innerBody['filters'][$key] = $extraValue;
        }

        $this->body = [
            $aggregatorName => $innerBody,
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function geoDistance(string $aggregatorName, array $body, $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'geo_distance' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function geohashGrid(string $aggregatorName, array $body, $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'geohash_grid' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function global(string $aggregatorName, array $body = [], $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'global' => $body,
            ]
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function histogram(string $aggregatorName, array $body, $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'histogram' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function ipRange(string $aggregatorName, array $body, $agg = null)
    {
        $this->body = [
            $aggregatorName => [
                'ip_range' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function missing(string $aggregatorName, array $body, $agg = null)
    {
        $this->body = [
            $aggregatorName => [
                'missing' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function nested(string $aggregatorName, array $body, $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'nested' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function rangeAgg(string $aggregatorName, array $body, $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'range' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function reverseNested(string $aggregatorName, array $body = [], $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'reverse_nested' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function sampler(string $aggregatorName, array $body = [], $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'sampler' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $body
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function significantTerms(string $aggregatorName, array $body = [], $agg = null)
    {
        $this->body['aggs'] = [
            $aggregatorName => [
                'significant_terms' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $field
     * @param string $aggregatorName
     * @param array $extraParams
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function terms(string $field, string $aggregatorName, array $extraParams = [], $agg = null)
    {
        $body = ['field' => $field] + $extraParams;

        $this->body = [
            $aggregatorName => [
                'terms' => $body,
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }

    /**
     * @param string $aggregatorName
     * @param array $scriptBody
     * @param BaseAgg|null $agg
     * @return $this
     */
    public function termsScript(string $aggregatorName, array $scriptBody, $agg = null)
    {
        $this->body = [
            $aggregatorName => [
                'terms' => [
                    'script' => $scriptBody,
                ],
            ],
        ];

        if ($agg !== null) {
            $this->body[$aggregatorName]['aggs'] = $agg->toArray();
        }

        return $this;
    }
}
