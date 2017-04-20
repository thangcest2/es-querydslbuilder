<?php

require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder;
use Sky\EsQueryBuilder\Dsl\Builder;
use Sky\EsQueryBuilder\Dsl\Compound\BoolBuilder;
use Sky\EsQueryBuilder\Dsl\Aggregator;

class Demo
{
    public static function run()
    {
        $client = ClientBuilder::create()
            ->setHosts(['http://localhost:9200'])
            ->setRetries(0)
            ->setSSLVerification(false)
            ->build();

        $boolBuilder = (new BoolBuilder())->withBool(
            (new BoolBuilder())
                ->withPrefix('category.name', 'messy', Builder::BOOL_SHOULD)
                ->withRegexp('category.name', '.*/.*', Builder::BOOL_MUST_NOT)
        )->withMatch('name', 'xx', Builder::BOOL_SHOULD);

        $q = (new Builder($client))
            ->selectIndex('product_my')
            ->selectType('product')
            ->boolWithBool($boolBuilder, Builder::BOOL_SHOULD)
            ->boolWithTerm('draft.unpublished', 0, Builder::BOOL_SHOULD)
            ->boolWithTerm('googleSearchVolume', 0)
            ->boolWithTerm('url', 'health', Builder::BOOL_MUST_NOT)
            ->boolWithMatch('name', 'Health', Builder::BOOL_FILTER);

//        $aggs = (new Aggregator())->metric(Aggregator::METRIC_TYPE_AVG, 'url', []);
//        $q->withAggregate($aggs);

        print_r($q->exportParamsAsArray());
        die;
        $q->run();

        print_r($q);
        die;
    }
}

Demo::run();
