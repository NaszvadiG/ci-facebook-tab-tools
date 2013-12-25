# CodeIgniter Helper: Likegate FB Tab

**ci-likegate-tab**

## About this helper

This CodeIgniter's helper checks whether the user likes or not the Fan Page.  
*Note:* the current method will only work if the platform is a Page Tab.

Its usage is recommended for CodeIgniter 2 or greater.

## Usage

```php
$this->load->helper('likegate_tab');

if(like_status()) {
    echo "The user likes the current Fan Page.";
} else {
    echo "The user does not like the current Fan Page.";
}
```

![Ale Mohamad](http://alemohamad.com/github/logo2012am.png)