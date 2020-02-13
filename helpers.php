<?php
if (!function_exists('getPost')) {
    /**
     * Function getPost
     *
     * @param string $id
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 2/13/20 54:48
     */
    function getPost($id = '')
    {
        if (isset($_GET[$id])) {
            return addslashes($_GET[$id]);
        }
        if (isset($_POST[$id])) {
            return addslashes($_POST[$id]);
        }

        return NULL;

    }
}
if (!function_exists('sendRequest')) {
    /**
     * Function sendRequest
     *
     * @param string $url
     * @param array  $data
     *
     * @return bool|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 2/13/20 54:52
     */
    function sendRequest($url = '', $data = array())
    {
        $endpoint = $url . '?' . http_build_query($data);
        $curl     = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => $endpoint,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => TRUE,
            CURLOPT_CUSTOMREQUEST  => "GET",
        ));
        $response = curl_exec($curl);
        $error    = curl_error($curl);
        curl_close($curl);
        if ($error) {
            return FALSE;
        }

        return $response;
    }
}
if (!function_exists('xmlRequest')) {
    /**
     * Function xmlRequest
     *
     * @param string $url
     * @param string $data
     *
     * @return bool|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 2/13/20 54:58
     */
    function xmlRequest($url = '', $data = '')
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => TRUE,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => $data,
            CURLOPT_HTTPHEADER     => array(
                "Accept: text/xml; charset=utf-8",
                "Content-type: text/xml; charset=utf-8"
            ),
        ));
        $response = curl_exec($curl);
        $error    = curl_error($curl);
        curl_close($curl);
        if ($error) {
            return 'CURL Error #: ' . $error;
        }

        return $response;
    }
}
if (!function_exists('xmlGetValue')) {
    /**
     * Function xmlGetValue
     *
     * @param string $xml
     * @param string $openTag
     * @param string $closeTag
     *
     * @return false|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 2/13/20 55:06
     */
    function xmlGetValue($xml = '', $openTag = '', $closeTag = '')
    {
        if (empty($xml) || empty($openTag) || empty($closeTag)) {
            return '';
        }
        $f = strpos($xml, $openTag) + strlen($openTag);
        $l = strpos($xml, $closeTag);

        return ($f <= $l) ? substr($xml, $f, $l - $f) : "";
    }
}
