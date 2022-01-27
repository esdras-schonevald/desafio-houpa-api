<?php

namespace Services;

use Adapters\HttpClient;

class AnalyserConnect extends HttpClient {
    public function __construct($url)
    {   parent::__construct($url);
    }
}