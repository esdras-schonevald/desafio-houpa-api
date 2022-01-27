<?php

namespace Adapters;

use Adapters\AdapterException;
use Adapters\HttpConnector;
use stdClass;

class HttpClient implements HttpConnector
{
    private stdClass $response;

    function __construct ( string    $url
                        ,           $parameters     = []
                        , array     $headers        = []
                        , string    $method         = "GET"
                        , bool      $sslVerifyHost  = false
                        , bool      $sslVerifyPeer  = false
    ){
        //Inicia o cURL
        $ch = curl_init($url);

        //Pede o que retorne o resultado como string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Envia cabeçalhos (Caso tenha)
        if(count($headers) > 0)
        {   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        //Envia post (Caso tenha)
        if($method == "POST")
        {   curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($parameters));
        }

        // Ignora Host
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $sslVerifyHost);

        //Ignora certificado SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $sslVerifyPeer);

        //Manda executar a requisição
        $resp   =   json_decode(curl_exec($ch));

        if (curl_errno($ch))
            throw new AdapterException (curl_error($ch), curl_errno($ch));

        if (!is_object($resp))
            throw new AdapterException ("No data!", 204);

        $this->response = $resp;
    }

    public function getResponse(): stdClass
    {   return $this->response;
    }
}