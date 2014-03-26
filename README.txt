=== Waving Portfolio ===
Contributors: aelbuni
Donate link: http://www.itechflare.com/donate.php
Tags: portfolio, plugin, promote, nice, job
Requires at least: 3.5.1
Tested up to: 3.6
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is a free plugin that gives the website owners the capability to elegantly represent their long job achievements in a unified portfolio grid.

== Description ==

This is a free modern plugin with very easy control and display flow that gives website owners the capability to professionally & elegantly promote & represent their long job achievements in a unified good looking portfolio grid.

First, all you have to do is adding as much portfolio posts as you want in the new dashboard admin menu "Portfolio" along with giving a good looking featured image to each post, so it can be presented inside the portfolio grid as per your taste.

For placing your portfolio grid anywhere in your website, just use the following shortcode and you are done:
[waving width="xxx" /]

Where width is controlling each portfolio picture width for the whole grid elements, by default it will be set to 250px.

In the portfolio post section you can attach only one custom gallary that can consist of infinite number of images using the native wordpress media window, and once you add the shortcode of the gallary, make sure to place it inside a hidden div so it doesn't show inside the portfolio content as follow:

[div style="display: none;"]
	[gallery ids="41,42,43,44,45"]
[/div]

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

== Upgrade Notice ==

= 1.0.2 =
This version fixes a grid styling problem.

== Arbitrary section ==

== Updates ==
