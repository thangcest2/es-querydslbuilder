<?php

namespace Sky\EsQueryBuilder;

use Elasticsearch\Client;
use Sky\EsQueryBuilder\Dsl\Aggregator;
use Sky\EsQueryBuilder\Dsl\Exceptions\NoIndexSelectedException;

abstract class AbstractBuilder implements BuilderInterface
{
    /**
     * @var array
     */
    protected $queryParams = [
        'index' => 'noindex',
        'type' => 'notype',
    ];

    protected $queryBody = [];

    protected $aggsBody = [];

    /**
     * @var Client
     */
    public $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function selectIndex($indexName)
    {
        $this->queryParams['index'] = $indexName;

        return $this;
    }

    public function selectType($typeName)
    {
        $this->queryParams['type'] = $typeName;

        return $this;
    }

    public function buildQuery()
    {
        if ($this->queryParams['index'] === 'noindex') {
            throw new NoIndexSelectedException('No index is selected to perform query');
        }
        if ($this->queryParams['index'] === 'notype') {
            throw new NoIndexSelectedException('No type is selected to perform query');
        }
        if (!isset($this->queryParams['body']['query'])) {
            $this->queryParams['body']['query'] = $this->queryBody;
        }

        return $this;
    }

    public function selectFields(array $selectedFields, array $excludeFields = [])
    {
        if ($selectedFields) {
            $this->queryParams['_source'] = $selectedFields;
        }
        if ($excludeFields) {
            $this->queryParams['_source']['excludes'] = $excludeFields;
        }

        return $this;
    }

    public function withAggregate(Aggregator $aggregator)
    {
        $this->queryParams['body']['aggs'] = $aggregator->toArray();

        return $this;
    }

    public function withSort()
    {
        $this->queryParams['body']['sort'] = [];

        return $this;
    }

    public function count()
    {
        $this->buildQuery();
        $countParams = [
            'index' => $this->queryParams['index'],
            'type' => $this->queryParams['type']
        ];
        if (isset($this->queryParams['body']['query'])) {
            $countParams['body']['query'] = $this->queryParams['body']['query'];
        }

        return $this->client->count($countParams);
    }

    public function run()
    {
        $this->buildQuery();

        return $this->client->search($this->queryParams);
    }

    public function exportParamAsJson()
    {
        $this->buildQuery();

        return json_encode($this->queryParams);
    }

    public function exportParamsAsArray()
    {
        $this->buildQuery();

        return $this->queryParams;
    }
}
