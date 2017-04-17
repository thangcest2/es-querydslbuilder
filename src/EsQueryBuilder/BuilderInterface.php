<?php

namespace Sky\EsQueryBuilder;

interface BuilderInterface
{
    public function selectFields(array $selectedFields, array $excludedFields = []);
    
    public function count();
    
    public function run();

    public function exportParamAsJson();

    public function exportParamsAsArray();
}
