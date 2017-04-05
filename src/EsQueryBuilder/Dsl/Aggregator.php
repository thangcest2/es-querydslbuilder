<?php

namespace Sky\EsQueryBuilder\Dsl;


use Sky\EsQueryBuilder\Object;

class Aggregator extends Object
{
    use TermLevelTrait;

    const METRIC_TYPE_AVG = 'avg';
    const METRIC_TYPE_CARDINALITY = 'cardinality';
    const METRIC_TYPE_EXTENDED_STATS = 'extended_stats';
    const METRIC_TYPE_GEO_BOUNDS = 'geo_bounds';
    const METRIC_TYPE_GEO_CENTROID = 'geo_centroid';
    const METRIC_TYPE_MAX = 'max';
    const METRIC_TYPE_MIN = 'min';
    const METRIC_TYPE_PERCENTILES = 'percentiles';
    const METRIC_TYPE_PERCENTILE_RANKS = 'percentile_ranks';
    const METRIC_TYPE_SCRIPTED_METRIC = 'scripted_metric';
    const METRIC_TYPE_GRADES_STATS = 'grades_stats';
    const METRIC_TYPE_SUM = 'sum';
    const METRIC_TYPE_TOP_HITS = 'top_hits';
    const METRIC_TYPE_VALUE_COUNT = 'value_count';

    public function metric($type, $field, $val)
    {
        
    }

    public function bucket()
    {

    }

    public function pipeline()
    {
        
    }

    public function matrix()
    {
        
    }
}
