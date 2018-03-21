<?php

require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder;
use Sky\EsQueryBuilder\Dsl\Builder;
use Sky\EsQueryBuilder\Dsl\Compound\BoolBuilder;
use Sky\EsQueryBuilder\Dsl\Aggregations\Bucket;

function bucket() {
    return new Bucket();
}

function boolBuilder() {
    return new BoolBuilder();
}

class Demo
{
    public static function run()
    {
        $client = ClientBuilder::create()
            ->setHosts(['http://localhost:9200'])
            ->setRetries(0)
            ->setSSLVerification(false)
            ->build();

        $boolBuilder = boolBuilder()->withBool(
            boolBuilder()
                ->withPrefix('category.name', 'messy', Builder::BOOL_SHOULD)
                ->withRegexp('category.name', '.*/.*', Builder::BOOL_MUST_NOT)
        )->withMatch('name', 'something', Builder::BOOL_SHOULD);

//        print_r($boolBuilder);die;

        $q = (new Builder($client));
        $q->selectIndex('catalog')
            ->selectType('product')
            ->boolWithBool($boolBuilder, Builder::BOOL_SHOULD)
            ->boolWithTerm('dob', 0)
            ->boolWithTerm('url', 'health', Builder::BOOL_MUST_NOT)
            ->boolWithMatch('name', 'Health', Builder::BOOL_FILTER);

//        $aggs = (new Aggregator())->metric(Aggregator::METRIC_TYPE_AVG, 'url', []);
//        $q->withAggregate($aggs);

        var_dump($q->exportParamsAsArray());
        die;
        $q->run();

        print_r($q);
        die;
    }

    public static function runAggs()
    {
        $client = ClientBuilder::create()
            ->setHosts(['http://localhost:9200'])
            ->setRetries(0)
            ->setSSLVerification(false)
            ->build();

        $aggs = bucket()->terms(
            'store.merchant_id',
            'groupedStore',
            ['size' => 100000],
            bucket()->terms('brand.url', 'brandCount', ['size' => 100000])
        );

        $q = (new Builder($client));
        $q->selectIndex('catalog')
            ->selectType('product')
            ->term('store.merchant_id', '');

        $q->aggs($aggs);

        $r = $q->run();

        var_dump($r);die;
    }
}

Demo::run();
Demo::runAggs();
