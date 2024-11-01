=== Plugin Name ===

Contributors: Jankeesvwoezik
Tags: Retina, graphics
Requires at least: 3.3.1
Tested up to: 3.3.1
Stable tag: 1.1.1

== Description ==

WP Retina allows you to easily integrate (handmade) retina graphics into your Wordpress website

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `wp-retina` to the `/wp-content/plugins/` directory
1. Activate the plugin through the `Plugins` menu in WordPress
1. Create your images in the retina size (and add `-2x` to the image name)
1. Make sure you have rewrites activated (`wp-admin/options-permalink.php`)
1. (optional) Add width and height property to all images `<img>` and `css` (which is a recommended practice)
1. (optional) Change the `simulate_retina` boolean in the javascript to simulate retina mode to check all the images

== Frequently Asked Questions ==

= Meh, it doesn't work =

Did you activate the .htaccess rewrites? (Settings -> Permalinks)

= Will this generate more url requests for the user? =

No, the user only gets the images it needs

= Does this plugin generate images on the fly? =

No, you have to create the "2x" size artwork yourself

= Will this generate more work for the server =

Yes, every image request goes through a .htaccess rewrite to a php file which returns the image. This takes a little bit more work than just serving the image. 

== Changelog ==

= 1.0 =

* Initial release

= 1.1 =

* All images that didn't exist broke, but that's all fixed now!
* Small bug fixes
* Added a register_activation_hook to add the rewrite rule
* When you deactivate the plugin you still need to flush the rewrite rules yourself

= 1.1.1 =

* Added a step to the installation process!
* Added a question to the Q&A
* Updated the readme.txt