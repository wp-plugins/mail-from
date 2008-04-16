=== Mail From ===

Contributors: hami
Tags: email, mail, from, system, admin, wordpress
Donate link: http://code.andrewhamilton.net/donate/
Requires at least: 2.0
Tested up to: 2.5
Stable tag: 1.0

A WordPress plugin that allows you to change the default wordpress@yourdomain.tld email address that WordPress sends it's email from, and the name of the sender that the email is from.

== Description ==

*Mail From* is WordPress plugin that that allows you to change the default wordpress@yourdomain.tld email address that WordPress sends it's email from, and the name of the sender that the email is from. It's as simple as that.

== Installation ==

This section describes how to install the plugin and get it working.

1. Download the PHP File
2. Upload *mail-from.php* file into your *wp-content/plugins/* directory
3. In your *WordPress Administration Area*, go to the *Plugins* page and click *Activate* for *Mail From*

Once you have *Mail From* installed and activated you can change it's settings in *Options > Mail From*.

== Changes ==

**1.0**
*   Fixed a problem with Blog name not escaping single quote properly
*   Tidied up functions and added a setup default settings function
*   Fixed some admin page style issues with version previous to 2.5
*   Bumped version number to 1.0

**0.3.1**
*   *Actually* added the display of the final email address WordPress is using

**0.3**
*   Added the display of the final email address WordPress is using
*   Tweaked Settings Page to suit WordPress 2.5

**0.2**
*   Added the ability to change the sender's name the mail is coming from.
*   The plugin will now remove invalid characters from the user name and domain name and convert to lower case when the settings are updated.

**0.1**
*   Initial release.

== Settings ==

The settings for *Mail From* are very simple. You can specify the *sender name*, the *user name* part of the email address and the *domain* part of the email address, e.g:

	`username@yourdomain.tld`

The default settings are set to the name of your site for the sender name, and the default email address is *noreply@yourdomain.tld*, where *yourdomain.tld* is the domain or subdomain that your WordPress is installed at.

== Screenshots ==

1. Options for *Mail From*

== Known Issues ==

No known issues at this time. 

If you find any bugs or want to request some additional features for future releases, please log them the [projects tracker page](http://tracker.andrewhamilton.net/projects/show/mail-from)