<?php

namespace Sky\EsQueryBuilder;


class Object
{
    protected $body;
    
    public function toArray()
    {
        return $this->body;
    }
}
