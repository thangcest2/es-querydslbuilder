<?php
/**
 * User: thangcest2
 * Date: 10/2/17
 * Time: 11:10 AM
 */

namespace Sky\EsQueryBuilder\Dsl\Aggregations;


use Sky\EsQueryBuilder\Object;

abstract class BaseAgg extends Object
{
    protected $body = [];

    public function __construct($body = [])
    {
        $this->body = $body;
    }
}
