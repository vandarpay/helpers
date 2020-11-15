<?php

if (! function_exists('resolve_pagination_links')) {
    /**
     * Resolve pagination links.
     *
     * @param array $response
     * @return array
     */
    function resolve_pagination_links(array $response)
    {
        $response['links']['first'] = str_replace(strtok($response['links']['first'], '?'),
            request()->url(),
            $response['links']['first']);

        $response['links']['last'] = str_replace(strtok($response['links']['last'], '?'),
            request()->url(),
            $response['links']['last']);

        $response['links']['next'] = !empty(str_replace(strtok($response['links']['next'], '?'),
            request()->url(),
            $response['links']['next'])) ? str_replace(strtok($response['links']['next'], '?'),
            request()->url(),
            $response['links']['next']) : null;

        $response['links']['prev'] = !empty(str_replace(strtok($response['links']['prev'], '?'),
            request()->url(),
            $response['links']['prev'])) ? str_replace(strtok($response['links']['prev'], '?'),
            request()->url(),
            $response['links']['prev']) : null;

        $response['meta']['path'] = strtok($response['links']['first'], '?');

        return $response;
    }
}
