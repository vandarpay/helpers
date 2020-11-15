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

if (! function_exists('goddamn_account_owner')) {
    /**
     * Return a valid account owner based on the issue WE KNOW ABOUT.
     *
     * @param $accountOwner
     *
     * @return string
     */
    function goddamn_account_owner($accountOwner)
    {
        if (is_string($accountOwner)) {
            return json_decode($this->account_owners)[0]->firstName . ' ' . json_decode($this->account_owners)[0]->lastName;
        }
        else if (is_array($accountOwner)) {
            return $accountOwner[0]['firstName'] . ' ' . $accountOwner[0]['lastName'];
        } else {
            return 'Check it manually.';
        }
    }
}
