<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Facebook Page Tab Tools
//
// This methods will only work if the platform is a Page Tab.

// This method checks whether the user likes or not the page
if (!function_exists('like_status')) {
    function like_status()
    {
        $like_status = FALSE;
        $signed_request = parsePageSignedRequest();
        if(count($signed_request) > 0) {
            if ($signed_request['page']['liked']) {
                $like_status = TRUE; // user likes the page
            }
        }
        return $like_status;
    }
}

// This method returns the app_data parameter as an array
if (!function_exists('read_app_data')) {
    function read_app_data()
    {
        $app_data = array();
        $signed_request = parsePageSignedRequest();
        $query = $signed_request['app_data'];

        foreach (explode('&', $query) as $chunk) {
            $param = explode("=", $chunk);
            if ($param) { $app_data[urldecode($param[0])] = urldecode($param[1]); }
        }

        return $app_data;
    }
}

// This method returns the current country code of the user, according to Facebook
if (!function_exists('fb_country')) {
    function fb_country()
    {
        $signed_request = parsePageSignedRequest();

		if(count($signed_request) > 0) {
            return $signed_request['user']['country']; // 'ar'
        } else {
            return 'xx';
        }
    }
}

// This method checks whether the user is the admin of the page
if (!function_exists('admin_status')) {
    function admin_status()
    {
        $admin_status = FALSE;
        $signed_request = parsePageSignedRequest();
        if(count($signed_request) > 0) {
            if ($signed_request['page']['admin']) {
                $admin_status = TRUE; // user is admin of the page
            }
        }
        return $admin_status;
    }
}

// This method returns the user id of the visiting user
if (!function_exists('get_user_id')) {
    function get_user_id()
    {
        $signed_request = parsePageSignedRequest();

		if(count($signed_request) > 0) {
            return $signed_request['user_id'];
        } else {
            return FALSE;
        }
    }
}

// This method reads the signed_request value from Facebook
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

/* End of file fb_page_tab_helper.php */
/* Location: ./application/helpers/fb_page_tab_helper.php */