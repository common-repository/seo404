=== Plugin Name ===
Contributors: larsstorm
Tags: 404, SEO, REDIRECT, 301
Requires at least: 3.2
Tested up to: 3.3
Stable tag: trunk

SEO404 redirects to the Blog front page with a 301. No more 404 errors on Google/Bing/etc.

== Description ==
Got an old domain? 404 errors all over? using WordPress?
Time to remove those 404 errors and recover your lost inbound links…

Using SEO404, a very lightweight plugin for WordPress, you can easily change all those 404 errors to 301 redirects for your blog frontpage.

* Since 0.3 define the 301 redirect destination url.

We’ve used this technique to force redirects to the frontpage before. Though usually just included it in a wordpress theme. But why not have this as a plugin? So here is SEO404 WordPress plugin, ready for use.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the 'SEO404' directory to the '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place '<?php do_action('plugin_name_hook'); ?>' in your templates


== Changelog ==

=0.4=
* Bug fixes
* Minor text changes

=0.3=
* Plugin configuration page added. 
* Now can redirect 404 errors to specific url (if defined on configuration page)

=0.2=
Removed namespace, to provide compatibility with older versions of PHP

=0.1=
Basic functionality - hooks into wordpress and redirects to front page.