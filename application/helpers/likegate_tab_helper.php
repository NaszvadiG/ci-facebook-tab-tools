<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Facebook Likegate Tab App
// 
// This method checks whether the user likes or not the fan page.
// This method will only work if the platform is a Page Tab.

if (!function_exists('like_status')) {
    function like_status()
    {
        $like_status = FALSE;
        $signed_request = parsePageSignedRequest();
        if(count($signed_request) > 0) {
            if ($signed_request['page']['liked']) {
                $like_status = TRUE; // user likes the fan page
            }
        }
        return $like_status;
    }
}

if (!function_exists('parsePageSignedRequest')) {
    function parsePageSignedRequest()
    {
        $data = array();
        $signed_request = '';
        if (isset($_REQUEST['signed_request'])) {
            $signed_request = $_REQUEST['signed_request'];
            list($encoded_sig, $payload) = explode('.', $signed_request, 2);
            $sig = base64_decode(strtr($encoded_sig, '-_', '+/'));
            $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
        }
        return $data;
    }
}

/* End of file likegate_tab_helper.php */
/* Location: ./application/helpers/likegate_tab_helper.php */