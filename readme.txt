=== BeachLiga Iframe ===
Tags: beachliga, sports, tournaments, trainings, reservations, iframe, embed, page, post, plugin
Requires at least: 1.3
Tested up to: 5.6
Requires PHP: 5.3
License: GPLv2
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Allows the insertion of code to display your tournament or trainings located in BeachLiga within an iframe.

== Description ==

BeachLiga Iframe is a plugin that will let you embed an iframe - an HTML tag that allows a webpage to be displayed inline with the current page - to display your tournament or trainings located in BeachLiga in a WordPress post.

== Installation ==

Install BeachLiga Iframe plugin as a regular WordPress plugin. Here is different ways to install BeachLiga Iframe plugin:

= INSTALL BY SEARCH PLUGIN =

* In your Admin, go to menu Plugins > Add New
* Search BeachLiga Iframe
* Click to install
* Activate the plugin
* BeachLiga Iframe will be available by using [beachliga src="path/to/your/training/or/tournament"] shortcode

= INSTALL BY UPLOAD PLUGIN =

* Download the latest version of [BeachLiga Iframe](http://downloads.wordpress.org/plugin/beachliga-iframe.zip) (.zip file)
* In your Admin, go to menu Plugins > Add New
* Select “Upload Plugin”
* Click on “Choose File”
* Select downloaded beachliga-iframe.zip & click on “Install Now” button
* Activate the plugin
* BeachLiga Iframe will be available by using [beachliga src="path/to/your/training/or/tournament"] shortcode

= INSTALL PLUGIN USING FTP =

* Download the latest version of [BeachLiga Iframe](http://downloads.wordpress.org/plugin/beachliga-iframe.zip) (.zip file)
* Upload unzipped beachliga-iframe folder inside the /wp-content/plugins/ directory
* Go to WordPress dashboard > Plugins & Activate the BeachLiga Iframe plugin
* BeachLiga Iframe will be available by using [beachliga src="path/to/your/training/or/tournament"] shortcode

Put [beachliga src="path/to/your/training/or/tournament"] shortcode where you need to show your BeachLiga tournament or training.

You can find full details of installing a plugin on the [plugin installation page](https://wordpress.org/support/article/managing-plugins/)

== Usage ==

Use following tag to insert another page in post using iframe

`[beachliga src="path/to/your/training/or/tournament"]`

= Parameters =
* **src:** path of your training or tournament [beachliga src="path/to/your/training/or/tournament"] (Always included https://beachliga.com/)
* **width:** width in pixels or in percents [beachliga width="100%" src="path/to/your/training/or/tournament"] or [beachliga width="640" src="path/to/your/training/or/tournament"] (by default width="100%");
* **height:** height in pixels [beachliga height="500" src="path/to/your/training/or/tournament"] (by default height="500");
* **scrolling:** parameter [beachliga scrolling="yes"] (by default scrolling="no");
* **frameborder:** parameter [beachliga frameborder="0"] (by default frameborder="0");
* **marginheight:** parameter [beachliga marginheight="0"] (removed by default);
* **marginwidth:** parameter [beachliga marginwidth="0"] (removed by default);
* **allowtransparency:** allows to set transparency of the iframe [beachliga allowtransparency="true"] (removed by default);
* **id:** allows to add the id of the iframe [beachliga id="my-custom-id"] (removed by default);
* **class:** allows to add the class of the iframe [beachliga class="my-custom-class"] (by default and always present class="beachliga-iframe");
* **style:** allows to add the css styles of the iframe [beachliga style="margin-left:-20px;"] (removed by default);
* **same_height_as:** allows to set the height of iframe same as target element [beachliga same_height_as="body"], [beachliga same_height_as="div.sidebar"], [beachliga same_height_as="div#content"]; (removed by default);
* **any_other_param:** allows to add new parameter of the iframe [beachliga any_other_param="any_value"];
* **any_other_empty_param:** allows to add new empty parameter of the iframe [beachliga any_other_empty_param=""];

== Frequently Asked Questions ==

== Changelog ==

= 1.0 =
* Initial release
