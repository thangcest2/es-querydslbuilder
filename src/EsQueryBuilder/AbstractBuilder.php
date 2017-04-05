<?php

namespace Sky\EsQueryBuilder;

use Elasticsearch\Client;
use Sky\EsQueryBuilder\Dsl\Aggregator;
use Sky\EsQueryBuilder\Dsl\Grammars\Compound;

abstract class AbstractBuilder
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
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function buildQuery()
    {
        if (!isset($this->queryParams['body']['query'])) {
            $this->queryParams['body']['query'] = $this->queryBody;
        }

        return $this;
    }

    public function selectFields($fields, $excludeFields = [])
    {
        if ($fields) {
            $this->queryParams['_source'] = $fields;
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

    public function startSort()
    {
        $this->queryParams['body']['sort'] = [];

        return $this;
    }
    
    public function count()
    {
        $this->buildQuery();

        return $this->client->count($this->queryParams);
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
