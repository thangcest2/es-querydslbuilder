<?php

namespace Sky\EsQueryBuilder;

interface BuilderInterface
{
    public function run();

    public function exportParamAsJson();

    public function exportParamsAsArray();
}
