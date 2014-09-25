=== Plugin Name ===
Contributors: frasten
Donate link: http://polpoinodroidi.com/wordpress-plugins/wordpresscom-popular-posts/#donations
Tags: posts, widget, statistics, popular posts, popular, jetpack, stats, wordpress.com
Requires at least: 2.8.0
Tested up to: 3.3.1
Stable tag: 2.6.0

This plugin can show the most popular articles in your sidebar, using data collected by Jetpack or Wordpress.com Stats plugins.

== Description ==

**IMPORTANT: this plugin has been abandoned!**

If you are a developer and would like to fork, feel free to do so (under the
GPLv3 license). No need to contact me.


Wordpress.com Popular Posts lists the most popular posts on a WordPress powered site.
This list can be used in the sidebar to show an indication of which are the most visited pages.

For further info visit [plugin homepage](http://polpoinodroidi.com/wordpress-plugins/wordpresscom-popular-posts/).

**Requires one of these plugins installed:**

* [Jetpack](http://wordpress.org/extend/plugins/jetpack/) plugin
* [Wordpress.com Stats](http://wordpress.org/extend/plugins/stats/) plugin, at least v1.2

**From v2.0.0, it requires WordPress 2.8 or greater.**

**Features**

* Catch your visitors' eye with a list of your most interesting contents!
* It doesn't overload your site: all the stats are stored on WordPress.com
* Support for multiple (and different) widgets on a page
* Support for shortcodes to embed the list inside a page/post
* Choose how many links to show, the time period of the stats...
* Support for filters: by category, ID, authors, visits...
* The format of the link is completely customizable
* Support for displaying post thumbnails in the list
* Support for displaying post excerpt
* Support for displaying post visits
* Internal caching system, to be faster than light

You can follow the development on [Github](https://github.com/frasten/wordpresscom-popular-posts).

== Installation ==

Wordpress.com Popular Posts can be installed easily:

1. Download and install [Jetpack](http://wordpress.org/extend/plugins/jetpack/)
   or [Wordpress.com Stats](http://wordpress.org/extend/plugins/stats/) plugin.
1. Download Wordpress.com Popular Posts .zip archive
1. Extract the files in the .zip archive, and upload them (including subfolders) to your /wp-content/plugins/ directory.
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Inside the WordPress admin, go to Design > Widgets, and add the 'Popular Posts' widget where you want, then save the changes.
1. If you want, you can customize some settings for the widget, in that page.


== Frequently Asked Questions ==

= I added the widget, but nothing shows up =

Check whether the Wordpress.com Stats or Jetpack plugins are installed
and active.
If you use WP Stats, you need at least version 1.2.


= I chose to show 5 posts, but I only see 2/3... =

Try to raise the value of the Magic Number (under the widget options):
it will try to fetch more data from the server and should fix your issue.
Too bad, this could slow down the plugin, so it would be better to enable
the cache (in the options again).


= I'd like to display the most popular posts per category. =

Add some WPPP widgets, and then choose a different category in each one's
options.


= How can I integrate this plugin in my non-widget-ready theme? =

If your theme supports widgets, you can place the widget named 'Popular Posts' where you want.

If it doesn't, put this code inside the file sidebar.php, in your theme files:

`<?php if (function_exists('WPPP_show_popular_posts')) WPPP_show_popular_posts(); ?>`

Optionally you can add some parameters to the function, in this format:

`name=value&name=value etc.`

Possible names are:

* `title` (title of the widget, you can add tags (e.g. `<h3>Popular Posts</h3>`) default: Popular Posts)
* `number` (number of links shown, default: 5)
* `days` (length of the time frame of the stats, default 0, i.e. infinite)
* `show` (can be: both, posts, pages; default both)
* `format` (the format of the links shown, default: `<a href='%post_permalink%' title='%post_title%'>%post_title%</a>`)
* `time_format` (the format used with %post_time%, see [Formatting Date and Time](http://codex.wordpress.org/Formatting_Date_and_Time) )
* `thumbnail_size` (the width/height in pixels of the post's thumbnail image)
* `excerpt_length` (the length of the excerpt, if `%post_excerpt%` is used in the format)
* `title_length` (the length of the title links, default 0, i.e. unlimited)
* `exclude` (the list of post/page IDs to exclude, separated by commas. Read the following FAQ for instructions)
* `exclude_author` (the list of authors IDs to exclude, separated by commas)
* `cutoff` (don't show posts/pages with a view count under this number, default 0, i.e. unlimited)
* `list_tag` (can be: ul, ol, none, default ul)
* `category` (the ID of the category, see FAQ below for info. Default 0, i.e. all categories)
* `cachename` it is used to enable the cache. Please see the FAQ below.
* `cache_only_when_visitor` (if enabled, it doesn't serve a cached version of the popular posts to the users logged in, default 0)
* `magic_number` (set it to a number greater than 1 if you see less links than expected)

Example: if you want to show the widget without any title, the 3 most
viewed articles, in the last week, and in this format:
*My Article (123 views)* you will use this:

 `<?php WPPP_show_popular_posts( "title=&number=3&days=7&format=<a href='%post_permalink%' title='%post_title_attribute%'>%post_title% (%post_views% views)</a>" );?>`

You don't have to fill every field, you can insert only the values you
want to change from default values.

You can use these special markers in the `format` value:

* `%post_permalink%` the link to the post
* `%post_title%` the title the post
* `%post_title_attribute%` the title of the post; use this in attributes, e.g. `<a title='%post_title_attribute%'...`
* `%post_views%` number of views
* `%post_excerpt%` the first n characters of the content. Set n with *excerpt_length*.
* `%post_thumbnail` the thumbnail image of the post
* `%post_category%` the category of the post
* `%post_comments%` the number of comments a post has
* `%post_time%` the date/time of the post. You can set the format with *time_format*.
* `%post_author%` the author of the post.


= I want to show the list in a dedicated page/post! =

Just add a shortcode like the one below, in your page/post:

`[wp_popular_posts]`

Of course you can customize the list, following the instructions in the
previous question. Just add your customizations after `wp_popular_posts`,
each one separed by a space.

An example:

`[wp_popular_posts title='' number=10 list_tag=ol format='<a href="%post_permalink%" title="%post_title_attribute%">%post_title%</a> (%post_views% views)<p>%post_excerpt%</p>' excerpt_length=200 cachename=popular-posts-page]`

This example displays a nice top 10 list, complete with title, number of
views, excerpt, and it's cached for performance.

If you specify the `format` parameter, be SURE you paste this into the
WP page in HTML or the editor will screw up the HTML formatting in the `format= parameter`.


= How can I enable the thumbnail feature? =

You must add %post_thumbnail% to your format field, in the widget's settings.
For example, you could use this format:
`<a href='%post_permalink%' title='%post_title_attribute%'>%post_thumbnail%%post_title%</a>`

You can customize the image size in the settings.

Note that your theme should support Post Thumbnails, and your posts should
have an image set. If they don't, a default image will be displayed.
You can read a guide to set the posts' thumbnail
[here](http://codex.wordpress.org/Post_Thumbnails#Setting_a_Post_Thumbnail).

However you can do this automatically for you, please read the other FAQs
below.

Also note that probably the image will not look nice by default, please see
below.


= I added %post_thumbnail% in the format, but I don't see any image. =

The thumbnail function is only compatible with WordPress 2.9+, please check
your WP version. Furthermore, try to disable and re-enable the widget's cache
in its options.


= I added %post_thumbnail% in the format, the image are displayed but I don't like their style! =

This is very theme-dependent, but a good starting point could be adding this
CSS code to your `/wp-content/themes/YOURTHEME/style.css file (note that
creating a [Child Theme](http://codex.wordpress.org/Child_Themes) would be a
nicer choice):

`
  ul.wppp_list li {
    min-height: 65px;
    display: block;
    list-style: none outside none;
  }

  ul.wppp_list img {
    float: left;
    margin-right: 4px;
    border: 2px solid #ECEFF5;
  }
`


= I didn't set featured images for old posts. Do I have to set them by hand? =

Fortunately not, there are some nice plugins that can set the first image in
the posts as featured image.
One plugin could be: [Auto Post Thumbnail](http://wordpress.org/extend/plugins/auto-post-thumbnail/).


= How can I discover the ID of a post/page? =

Log into your admin page, go to **Posts** or **Pages**; go with your mouse
on your post's title, and in your status bar you should see something like
this: http://YOURSITE.com/wp-admin/post.php?action=edit&post=14
Then **14** is the number you are looking for.


= How can I enable the caching system when using WPPP_show_popular_posts()? =

When you're using `WPPP_show_popular_posts()`, the caching system is not
enabled.
However you can easily enable it adding a `cachename` parameter to your
settings string. You will have something like this:

 `<?php WPPP_show_popular_posts( "title=&number=3&cachename=topposts1" );?>`

where *topposts1* is a name you must choose for your list. This allows you
to have different lists with different caches.


= I want to change the time format! =

Just set the time format as you wish.
For example, if you set the time format to: `d/m/Y H:i:s`, you will get
something like this: *21/03/2008 22:52:36*.
See [Formatting Date and Time](http://codex.wordpress.org/Formatting_Date_and_Time)
for further help.

= I have some other issues. How can I get a debug log? =

1. Download [this zip file](http://polpoinodroidi.com/download/plugins/wppp_debug.zip)
1. extract it and overwrite the current `/wp-content/plugins/wordpresscom-popular-posts/wppp.php` file

Now, if you are using WPPP as a widget:

1. Log in to your admin page.
1. Go to Settings -> Popular Posts *DEBUG*
1. you’ll see a long text. Copy & mail it to: frasten AATT gmail DOOTT com

If you are instead using `WPPP_show_popular_posts()` function for non-widget-ready
themes:

1. edit your theme files, replacing your old `WPPP_show_popular_posts` with `WPPP_show_popular_posts_debug` .
1. you'll see the debug text in place of your usual top-posts list.
1. Copy & mail it to: frasten AATT gmail DOOTT com

**IMPORTANT**: Then, for both cases (widget and function) reinstall the
original version of wppp.php.


= I want to translate the plugin in my language! =

Now you can easily translate the plugin online here:
https://translations.launchpad.net/wordpresscom-popular-posts/trunk

I'll add your translations to the plugin!


== Changelog ==

= 2.6.0 =
* New feature: added %post_thumbnail% to show the post thumbnail! Please read
  the FAQ. Thanks to [Rocco Agostino](http://blog.roccoagostino.eu).
* Language: added romanian, thanks to [Web Geek Sciense](http://webhostinggeeks.com).
* Language: added vietnamese, thanks to Lê Hoàng Phương.
* Language: updated catalan, thanks to Ferran Rius.
* Language: updated italian, thanks to Edoardo Maria Elidoro.
* Language: updated serbian, thanks to Предраг Љубеновић.
* Language: updated spanish, thanks to Fitoschido, Fzamudio, Sergio Arriaga,
  hhlp, simon.
* Language: updated turkish, thanks to Hamit Selahattin Naiboğlu.

= 2.5.2 =
* Fixed a PHP notice.

= 2.5.1 =
* Fixed missing closing tag when there aren't any popular posts. Thanks
  to sebmeric.
* Strip HTML tags from the post titles. Please let me know if this
  breaks something for you.

= 2.5.0 =
* New feature: %post_author% tag, to show the post author. Thanks to
  Jean-Paul Horn, www.iphoneclub.nl
* New feature: added an option to exclude posts written by some specific
  authors. Thanks to Jean-Paul Horn, www.iphoneclub.nl
* Added Serbian translation, thanks to Саша Стефановић.
* Completed Turkish translation, thanks to Engin BAHADIR and cornetto.
* Added docs about new Wordpress.com Jetpack plugin.

= 2.4.2 =
* Added Catalan translation & updated Spanish translation, thanks to
  Octavi Ripollés i Querol.

= 2.4.1 =
* Added some check to make this plugin more robust with unexpected data.

= 2.4.0 =
* New Feature: added support for [wp_popular_posts] shortcode! Please read
  the FAQ. Thanks to Tim Nicholson for this.
* New Feature: added 'none' option to list tag, to improve customizability.

= 2.3.0 =
* New Feature: added support for subcategories. Now if you set a category,
  it will also show posts inside its subcategories.
* New feature: %post_time%, it allows to show the date/format.
* New Feature: added a new Magic Number option. If the plugin shows 
  less links than expected, try to raise this number. Please read docs.
* Added spanish translation. Many thanks to Fabio (Coco).
* Added (partly) turkish translation. Many thanks to zeugma.
* Improved compatibility with WordPress 2.9.
* Fixed an issue in the uninstall process.

= 2.2.0 =
* New Feature: added the new %post_comments% tag in the format to show
  how many comments a post has.
* New Feature: now you can choose to show the cached version only to the
  anonymous (not logged in) users.
* Some minor fixes.

= 2.1.0 =
* New Feature: implemented a cache system. This will improve the speed
  of the plugin. If you are using the function `WPPP_show_popular_posts()`
  for non-widget-ready themes, please read the FAQ.
* Fixed an issue with %post_category%. Thanks to Isaac | GoBlogger.
* Better compatibility with plugins like qTranslate. Thanks to Blutarsky
  for this.

= 2.0.2 =
* Regression: you couldn't set an empty title anymore.
* Regression: You couldn't add HTML tags to the widget title.
* Fix: more robust security checks.

= 2.0.1 =
* New feature: now you can use %post_category% in your format, to show
  the post's category.
* New feature: now you can show posts from a specific category.

= 2.0.0 =
* New complete rewrite, using WP 2.8 Widget API. Note: from now on, this
  plugin will require at least WP 2.8
* New feature: now you can add multiple widgets with their own different
  settings!
* New feature: now you can exclude specific posts/pages by IDs.
* New feature: don't show posts with a view count under x
* New feature: now you can choose between unordered (ul tag) or ordered
  (ol tag) list.
* Fix: now private posts are excluded from the list.
* Fix: now deleted posts shouldn't appear anymore.
* Fix: W3C Validation fix, thanks to Jonathan M. Hollin
* Fix: fixed an issue with titles containing special characters/quotes.
* Fix: removed the shortcodes from the excerpt, thanks to Peter.

= 1.3.5 =
* Added a workaround for a cache issue in stats plugin.

= 1.3.4 =
* Hopefully fixed a problem on some blogs, when displaying only posts or
  only pages.

= 1.3.3 =
* Updated compatibility with WP 2.6

= 1.3.2 =
* New option: now you can limit the length of the links.

= 1.3.1 =
* Fixed an incompatibily with PHP < 5.0.

= 1.3 =
* Now the titles & permalinks are taken from the database, so they should
  be updated.
* Arabic/Greek etc. language issues should be fixed now.

= 1.2 =
* New feature: Added multilanguage support.
* Added italian language
* New feature: now you can show the first *n* characters of the content
  of each post, through the %post_excerpt% parameter. Just add it to your
  format.

= 1.1.2 =
* Added a fix for a bug in WordPress Stats.

= 1.1.1 =
* Fixed some unclosed tags, which caused issues in IE7 configuration of
  the widget.
* Removed (actually it's only skipped, not fixed yet) a nasty MySQL error
  if there aren't any "top posts".

= 1.1 =
* New feature: now you can choose to show only posts, only pages, or both (default).

= 1.0.1 =
* Added CSS class "wppp_list", so that you can now customize the styling in your stylesheet.

= 1.0 =
* New feature: now you can customize the format of the links (see FAQ)
* New Feature: it's now possible to show the number of views of the post (see FAQ)
* Fix: fixed utf-8 encoding issue with WP >= 2.5
* Fix: now the widget should better integrate with your theme
* Change: **Note**: the way to call WPPP_show_popular_posts() to integrate
  the plugin in non-widget-ready themes has changed. See FAQ.

= 0.4.0 =
* Added arguments to the function WPPP_show_popular_posts(). Now you can
  customize several parameters even if your theme doesn't support widgets.

= 0.3.0 =
* New feature: now you can set the length (in days) of the desired time frame.
* Fixed a bug with titles containing foreign characters.

= 0.2.2 =
* Added support for non-widgets-ready themes.

= 0.2.1 =
* Fixed a bug with quotes.

= 0.2.0 =
* Added widget configuration.

= 0.1.0 =
* First working release with the widget.


== Upgrade Notice ==

= 2.6.0 =
Upgrade to add the capability to display post thumbnails.
