<?php

namespace Pineapple\http;

class BaseErrorHandler
{
    const PAGE_NOT_FOUND = 404;
    const INTERNAL_ERROR = 500;

    public function getResolvers()
    {
        return [
            self::PAGE_NOT_FOUND => 'handle404',
            self::INTERNAL_ERROR => 'handle500'
        ];
    }

    public function handle(\Exception $e, $code=null)
    {
        if (is_null($code)) {
            $code = $e->getCode();
        }
        $resolvers = $this->getResolvers();
        if (array_key_exists($code, $resolvers)) {
            $resolver = $resolvers[$code];
            if (!is_null($resolver)) {
                call_user_func_array(array($this, $resolver), [$e]);
            }
        }
        throw $e;
    }

    protected function handle404($e)
    {
        echo '404';
    }

    protected function handle500($e)
    {
        echo '500';
    }
}
