<?php

require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder;
use Sky\EsQueryBuilder\Dsl\Builder;
use Sky\EsQueryBuilder\Dsl\Aggregator;

class Demo
{
    public static function run()
    {
        $client = ClientBuilder::create()
            ->setHosts(['localhost:9200'])
            ->setRetries(0)
            ->setSSLVerification(false)
            ->build();

        $q = (new Builder($client))
            ->selectIndex('product_my')
            ->selectType('product')
            ->boolWithTerm('draft.unpublished', 0)
            ->boolWithTerm('googleSearchVolume', 0)
            ->boolWithTerm('url', 'health', Builder::BOOL_MUST_NOT)
            ->boolWithMatch('name', 'Health', Builder::BOOL_FILTER);

        $aggs = (new Aggregator())->metric(Aggregator::METRIC_TYPE_AVG, 'url', []);
        $q->withAggregate($aggs);

        print_r($q->exportParamsAsArray());
        die;
        $q->run();

        print_r($q);
        die;
    }
}

Demo::run();
