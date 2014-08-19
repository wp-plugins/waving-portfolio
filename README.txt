=== Waving Portfolio ===
Contributors: aelbuni
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=abdulrhman%2eelbuni%40gmail%2ecom&lc=CA&item_name=Waving%20Portfolio%20%2d%20Donation&item_number=20140790&currency_code=CAD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: portfolio, plugin, promote, nice, job, illustrate
Requires at least: 3.5.1
Tested up to: 3.9.1
Stable tag: 1.1.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is a free responsive plugin that gives the website owners the capability to elegantly represent their long job achievements in a unified portfolio grid.

== Description ==

<h4>Description</h4>

[Official website:](http://www.itechflare.com)
This is a free contemporary responsive plugin with very easy control and display flow that gives website owners the capability to professionally & elegantly promote & represent their long job achievements in a unified good looking portfolio grid.

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

* **showCat**: With showCat attribute you can choose whether you want to show the category selection menu or not (NEW)

* **tag**: Yes Finally! With this attribute you can select only those portfolio that you have tagged with specific tag name to be shown. And it does accept case insensitive strings as shown above in the example line(NEW)

* **clicking**: This attribute allows the admin to disable the clicking effect for portfolio items(NEW)

In the portfolio post section you can attach only one custom gallary that can consist of infinite number of images using the native wordpress media window, and once you add the shortcode of the gallary, make sure to place it inside a hidden div so it doesn't show inside the portfolio content as follow:
<pre>
&lt;div style="display: none;"&gt;
	[gallery ids="41,42,43,44,45"]
&lt;/div&gt;
</pre>

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

= How I can add gallary to a portfolio ? =

In the post section you can attach custom gallaries using the native wordpress media window, and once you add the shortcode of the gallary, make sure to place inside a hidden div so it doesn't show inside the portfolio content as follow:

<div style="display: none;">
	[gallery ids="41,42,43,44,45"]
</div>

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

* Force featured image to be listed in posts
	* add_theme_support( 'post-thumbnails' );
* Adding clicking attribute, to enable/disable clicking effect


== Arbitrary section ==

== Updates ==
