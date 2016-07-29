<?php

namespace Pineapple\event;

interface EventListener
{
    public function update($event, $context);
}
