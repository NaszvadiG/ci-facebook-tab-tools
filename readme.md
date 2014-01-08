# CodeIgniter Helper: FB Page Tab Tools

**ci-facebook-page-tab-tools**

## About this helper

This CodeIgniter's helper have tools for Facebook Page Tabs.  
**Note:** the current method will only work if the platform is a Page Tab.

Its usage is recommended for CodeIgniter 2 or greater.

## Usage

```php
$this->load->helper('fb_page_tab');

/*****/

// Checks whether the user likes the page or not
if( like_status() ) { // returns TRUE or FALSE
    echo "The user likes the current Page.";
} else {
    echo "The user does not like the current Page.";
}

/*****/

// Returns the app_data parameter as an array
// &app_data=var1%3Dfoo1%26var2%3Dfoo2
$app_data = read_app_data();

/*****/

// Returns the user current country code (according to Facebook)
$country = fb_country();

/*****/

// Checks whether the user is the admin or not of the page
if( admin_status() ) { // returns TRUE or FALSE
    echo "The user is the admin of the current Page.";
} else {
    echo "The user is not the admin of the current Page.";
}

/*****/

// Returns the visiting User ID
$user_id = get_user_id();
```

![Ale Mohamad](http://alemohamad.com/github/logo2012am.png)