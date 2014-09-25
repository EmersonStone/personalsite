=== Custom Permalinks ===

Donate link: http://atastypixel.com/blog/wordpress/plugins/custom-permalinks/
Tags: permalink, url, link, address, custom, redirect
Requires at least: 2.6
Tested up to: 3.3.1
Stable tag: 0.7.19

Set custom permalinks on a per-post, per-tag or per-category basis.

== Description ==

Lay out your site the way *you* want it. Set the URL of any post, page, tag or category to anything you want.
Old permalinks will redirect properly to the new address.  Custom Permalinks gives you ultimate control
over your site structure.

Be warned: *This plugin is not a replacement for WordPress's built-in permalink system*. Check your WordPress
administration's "Permalinks" settings page first, to make sure that this doesn't already meet your needs.

This plugin is only useful for assigning custom permalinks for *individual* posts, pages, tags or categories. 
It will not apply whole permalink structures, or automatically apply a category's custom permalink to the posts 
within that category.

== Installation ==

1. Unzip the package, and upload `custom-permalinks` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Edit any post, page, tag or category to set a custom permalink.

== Changelog ==

= 0.7.19 =

  * WP 3.9 compatibility fix, thanks to Sowmedia

= 0.7.18 =

 * Patch to address 404 errors when displaying a page/post that shares a permalink with a trashed page/post, thanks to Tor Johnson

= 0.7.17 =

 * Patch to address SSL problems, thanks to Amin Mirzaee

= 0.7.16 =

 * Security and compatibility fixes by Hans-Michael Varbaek of Sense of Security

= 0.7.15 =

 * Permalinks are now case-insensitive (thanks to @ericmann)

= 0.7.14 =

 * Delete permalinks upon page/post deletion

= 0.7.13 =

 * Fixed issue with term permalinks not working properly on some installations

= 0.7.12 =

 * Fixed issue with feed URLs in non-webroot blog installations

= 0.7.11 =

 * Fixed issue with pending/draft posts with permalinks
 * Fixed infinite redirect issue with permalinks without trailing slash, on blogs not hosted in the webroot

= 0.7.10 =

 * Fix for 404 error on static front page with custom permalink set, by Eric TF Bat

= 0.7.9 =

 * Support for custom post types, by Balázs Németh

= 0.7.8 =

 * Support for non-ASCII characters in URLs
 * Fixed bug where adding a new tag when saving a post with a custom permalink attaches that permalink to the new tag
 * Some compatibility fixes for WP 3.2.1

= 0.7.7 =

 * Minor change to permalink saving routine to fix some possible issues
 * Fixed issue with %-encoded permalinks

= 0.7.6 =

 * Fixed permalink saving issue when not using ".../%postname%" or similar permalink structure

= 0.7.5 =

 * Fixed issue where changes to trailing "/" aren't saved

= 0.7.4 =

 * Added support for changing post/page slug only
 * Fixed incorrect admin edit link

= 0.7.3 =

 * Fix problem with /page/# URLs on WP 3.1.3

= 0.7.2 =

 * Don't clobber query parameters when redirecting to the custom permalink from the original URL

= 0.7.1 =

 * Compatiblity fix for last update

= 0.7 =

 * Added support for SSL sites, thanks to Dan from todaywasawesome.com

= 0.6.1 =

 * Fix bug causing incorrect link from "View Post"/"View Page" button in post/page editor

= 0.6 =

 * Fix infinite redirect for permalinks ending in a / (critical fix)
 * Moved post/page permalinks settings to top of edit form, replacing prior permalink display

= 0.5.3 =

 * Fix for invalid URL redirect (eg. http://domain.comfolder/file.html instead of http://domain.com/folder/file.html) when using permalinks without a trailing slash (like .../%postname%.html)

= 0.5.2 =

 * Bugfix for matching posts when there are multiple posts that match parts of the query

= 0.5.1 =

 * Compatibility fix for WP 2.7's tag/category pages

= 0.5 =

 * Support for Wordpress sites in subdirectories (i.e., not located at the webroot)

= 0.4.1 =

 * WP 2.7 compatability fixes; fix for bug encountered when publishing a draft, or reverting to draft status, and fix for placeholder permalink value for pages

= 0.4 =

 * Support for pages, and a fix for draft posts/pages

= 0.3.1 =

 * Discovered a typo that broke categories

= 0.3 =

 * Largely rewritten to provide more robust handling of trailing slashes, proper support for trailing URL components (eg. paging)

= 0.2.2 =

 * Fixed bug with not matching permalinks when / appended to the URL, and workaround for infinite redirect when another plugin is enforcing trailing /

= 0.2.1 =

 * Better handling of trailing slashes

= 0.2 =

 * Added 'Custom Permalinks' section under 'Manage' to show existing custom permalinks, and allow reverting to the defaults

= 0.1.1 =

 * Fixed bug with categories

== Upgrade Notice ==

= 0.6.1 =

 * This release fixes a bug causing incorrect link from the "View Post"/"View Page" button in the editor

= 0.6 =

In the process of fixing one issue, version 0.5.3 broke permalinks ending with a "/". Update now to fix this, and sorry for the inconvenience!

= 0.5.3 =

If you are having problems with Custom Permalinks causing an invalid URL redirect (eg. http://domain.comfolder/file.html instead of http://domain.com/folder/file.html),
upgrade: This has now been fixed.

