<?php

namespace Pineapple\middleware;

interface Middlewarable
{
    public function processRequest($request);
}
