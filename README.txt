=== Waving Portfolio ===
Contributors: aelbuni
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=abdulrhman%2eelbuni%40gmail%2ecom&lc=CA&item_name=Waving%20Portfolio%20%2d%20Donation&item_number=20140790&currency_code=CAD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: gallary, picture, photo, portfolio, plugin, promote, nice, job, illustrate, photography
Requires at least: 3.8.1
Tested up to: 4.1
Stable tag: 1.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is a free multi-purpose responsive plugin that gives the website owners the capability to elegantly represent their long job achievements.

== Description ==

<h4>Description</h4>

[Official website:](http://www.itechflare.com)
This is a free contemporary multi-purpose responsive plugin with very easy control and display flow that gives website owners the capability to professionally & elegantly promote & represent their long job achievements in a unified good looking portfolio grid; yet you can use it asa flixable gallary plugin.

First, all you have to do is adding as much portfolio posts as you want in the new dashboard admin menu "Portfolio" along with giving a good looking featured image to each post, so it can be presented inside the portfolio grid as per your taste.

For placing your portfolio grid anywhere in your website, just use the following shortcode and you are done:
<pre>
Template:
[ waving {height="xxx" or width="xxx"} theme="[light|dark]" all="[false|true]" 
	showCat="[true|false]" tag="[string]" clicking="[false|true]" /]
</pre>
<pre>
Example: 
[waving width="200" theme="light" all="0" showCat="true" 
	tag="[city-center or City Center or cITY Center]" /]
	
Notice that if you remove width attribute, and use height, the whole images will be resized based on height instead of width.
</pre>
<h3>
Attribute Definitions:
</h3>
* **width** attribute: Is controlling each portfolio item's width for the whole grid elements, by default it will be set to 0. Notice that you don't need to write "px" after numbers.

* **height** attribute: Is controlling each portfolio item's height for the whole grid elements, by default it will be set to 250px. Notice that you don't need to write "px" after numbers. If you set both width and height attributes the width attribute will take-over, so please make sure to remove width attribute if you need your portfolio elements to be sorted based on height.

* **theme** attribute: With this you can define your theme to be either light or dark.

* **all** attribute: With this attribute you can disable "all" category from showing-up in Portfolio Category menu.

* **showCat**: With showCat attribute you can choose whether you want to show the category selection menu or not

* **tag**: Yes Finally! With this attribute you can select only those portfolio that you have tagged with specific tag name to be shown. And it does accept case insensitive strings as shown above in the example line(NEW)

* **clicking**: This attribute allows the admin to disable the clicking effect for portfolio items

(Version 1.2) For each individual portfolio item you can either select or upload your gallary using the meta boxes inside portfolio item's window, overall you can change all of this individual settings for any specific post:

* Native gallary upload and selection **(NEW)**
* Enable Title/Description for sliding panel **(NEW)**
* Change font size for sliding panel **(NEW)**
* Control description character length **(NEW)**
* Switch between hyperlink or modal window redirection whenever your click over a specific portfolio item **(NEW)**

<h4>Demo</h4>
Here is a demo link for this plugin: <a href="http://www.itechflare.com/main/demo/"><b>DEMO</b></a>

Enjoy! And don't forget to rate, and ask for support if you have faced any troubles.

Peace! 

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

= Using The WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Search for 'Waving Portfolio'
3. Click 'Install Now'
4. Activate the plugin on the Plugin dashboard

= Uploading in WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `waving-portfolio.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

= Using FTP =

1. Download `waving-portfolio.zip`
2. Extract the `waving-portfolio` directory to your computer
3. Upload the `waving-portfolio` directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard


== Frequently Asked Questions ==

= If you update to 1.2 from any previous version and lost your portfolio items, here is how to retrieve them =

"1.2 NOTICE: Total redesign of the plugin in (v1.2). If you want to upgrade, you have to recreate portfolio items from the scratch in a new simpler way."

This is been written as update notice.

Quick solution for your migration, is to execute these SQL query:

<ol>
<li>
UPDATE wp_posts SET post_type='itech_portfolio' WHERE post_type='portfolio';</li>
<li>
UPDATE wp_term_taxonomy SET taxonomy=’waving_portfolio_category’ WHERE taxonomy='portfolio_category';</li>
<li>
UPDATE wp_term_taxonomy SET taxonomy='waving_portfolio_tag' WHERE taxonomy='portfolio_tag';</li>
</ol>
And all should be sorted out.

A major enhancement and total redesign for the plugin has been done in version 1.2, note that you have to select your galleries again using the new selection feature for each portfolio item, for a short term changes this might be hectic, but for long term simplicity and manageability it is better to move to 1.2.

Thanks for your migration

= How I can create 2 and more portfolios ? =

It is a mix of using categories and tags, so if you need to seperate portfolios, just tag portfolio items with different tag names, for instance:

* Portfolio item#1 -> tag=City
* Portfolio item#2 -> tag=City
* Portfolio item#3 -> tag=Countries
* Portfolio item#4 -> tag=Countries
* Portfolio item#5 -> tag=Continent
* Portfolio item#6 -> tag=Continent

Now you can have three different portfolios using the following shortcodes:

* [waving width="200" theme="light" all="0" showCat="true" tag="city" /]
* [waving width="200" theme="light" all="0" showCat="true" tag="countries" /]
* [waving width="200" theme="light" all="0" showCat="true" tag="Continent" /]

And within each tag you can devide the list of portfolio using categories so it will become filterable through categories.

= How I can change the theme style ? =

There is 2 pre-defined themes that can be used starting from 1.0.3 release, you can either use "dark" or "light" style.

To apply your style just add attribute theme in your shortcode ass follow:

[waving width="200" theme="[light|dark]" /]
example: [waving width="200" theme="light" /]

Notice: By the default the dark theme is enabled.

== Screenshots ==

1. A portfolio page with four portfolios listed.
2. A swift modal window that includes description and gallary images will come-in fast once you click over any portfolio section.
3. Lightbox will be displayed as shown when you click over a gallary picture for any specific portfolio.
4. Backend management panel.
5. Waving Portfolio plugin logo.

== Changelog ==

= 1.0.1 =
* Implement a portfolio custom management posts, so the user can add their items easily
* Add modal effects for each portfolio
* Added gallary support feature that could be nested inside portfolios as described in FAQ

= 1.0.2 =

* Fixing the portfolio grid layout, and make it as inline-block which will adapt automatically inside of the wrapper corresponding to the wrappers width.
* Adding width attribute to the shortcode, so users can change the width according to their needs.

= 1.0.3 =

* Adding light and dark theme styles, that used can dynamically define inside the shortcode.
* Convert the plugin to be totally responsive, working on (iPhone, Android and iPad).

= 1.0.4 =

* Dim background
* Fix unlimited post issue

= 1.0.5 =

* Add category support for portfolio items, where you can tag portfolio with categories to be ordered later for your customers accordingly.

= 1.0.6 =

* Change the portfolio modal layout to be more readable and flixable.
* Changed close button style
* Fix firefox compatibility issues

= 1.1.2 =

* Now you can generate as many autonomous portfolio lists as you want with the help of the new (tag) attribute for the shortcode.
* Adding new capability to enable/disable categories menu.
* Category menus are selected according to the tag filter the admin has enabled, so only related categories will be shown inside the menu.

= 1.1.4 =

* Quality improvement
* Add height attribute option so admin can size the portfolio elements based on height.

= 1.2 =

* Flexible individual portfolio item settings
* Native gallary upload and selection
* Enable Title/Description for sliding panel
* Change font size for sliding panel
* Control description character length
* Switch between hyperlink or modal window redirection whenever your click over a specific portfolio item

= 1.2.1 =

* Fixed the upgrade issue of removing old post, to upgrade from 1.5.1 to >= 1.2.
* The gallary images still need to be manually updated though.

== Upgrade Notice ==

= 1.0.2 =
This version fixes a grid styling problem.

= 1.0.3 =
- This version has responsive capability.
- New theme has been added to the plugin.

= 1.0.4 =

* Dim background
* Fix unlimited post issue

= 1.0.5 =

* Add category support for portfolio items, where you can tag portfolio with categories to be ordered later for your customers accordingly.

= 1.0.6 =

* Change the portfolio modal layout to be more readable and flixable.
* Changed close button style
* Fix firefox compatibility issues

= 1.1.2 =

* Now you can generate as many autonomous portfolio lists as you want with the help of the new (tag) attribute for the shortcode.
* Adding new capability to enable/disable categories menu.
* Category menus are selected according to the tag filter the admin has enabled, so only related categories will be shown inside the menu.

= 1.1.4 =

* Quality improvement
* Add height attribute option so admin can size the portfolio elements based on height.

= 1.1.5 =

* Force featured image to be listed in posts. 
add_theme_support( 'post-thumbnails' );
* Adding clicking attribute, to enable/disable clicking effect

= 1.2 =

* NOTICE: Total redesign of the plugin. If you want to update to 1.2, you have to recreate portfolio items from the scratch in a new simpler way.
New Features:
* Flexible individual portfolio item settings
* Native gallary upload and selection
* Enable Title/Description for sliding panel
* Change font size for sliding panel
* Control description character length
* Switch between hyperlink or modal window redirection whenever your click over a specific portfolio item

= 1.2.1 =

* Fixed the upgrade issue of removing old post, to upgrade from 1.5.1 to >= 1.2.
* The gallary images still need to be manually updated though.

== Arbitrary section ==

== Updates ==

* NOTICE: Total redesign of the plugin in (v1.2). If you want to upgrade, you have to recreate portfolio items from the scratch in a new simpler way.