=== WindStyle MultiSite Nav Bar ===
Contributors: xiaoshatian
Donate link: 
Tags: MultiSite, Navigation, bar
Requires at least: 3.0.0
Tested up to: 3.0.1
Stable tag: trunk,

MultiSite navigation bar for Wordpress 3.0+. 针对Wordpress 3.0+的多站点导航栏插件。

== Description ==

Wordpress 3.0+ integrates Multi-Site feature of Wordpress MU. We can easily create a lot of blogs, with only one deployment of Wordpress. 

WindStyle MultiSite Nav Bar can show a navigation bar on every blog of your Wordpress site. All of blogs will show in this navigation bar. You can customize site logo and every blog can customize theme of their navigation bar( If you like, you can design your own theme.)

WordPress从3.0版本开始兼并了Wordpress MU的多站点功能（MultiSite），凭借此功能，只需要部署一次Wordpress，就可以方便地创建出许多博客站点。当你在维护多个博客的时候，可能并不希望让这些博客看起来各自独立，如果你希望能通过类似导航栏的方式把多个博客连接起来，但又不想要使用臃肿的BuddyPress插件，那就尝试一下MultiSite Nav Bar吧。

MultiSite Nav Bar需要在每个博客单独激活并配置，激活之后，它会在博客中添加一个导航栏，用以显示当前Wordpress站点的名称、Logo以及所有博客的链接。

并且你可以在控制台选择MultiSite Nav Bar的显示样式，MultiSite Nav Bar内置了两种样式，如果不合心意，也可以自行为MultiSite Nav Bar编写主题。



== Installation ==

1. Upload plugin files( WindStyle-MultiSite-Nav-Bar.php and related directories) to '/wp-content/plugins/' directory.
2. Activate WindStyle MultiSite Nav Bar from 'Plugin' page( every blog need do this).
3. Configure plugin at 'MultiSite Nav Bar' page under 'General' and 'Super Admin' page.
4. Enjoy!

1. 将插件（WindStyle-MultiSite-Nav-Bar.php及相关文件、文件夹）上传到“/wp-content/plugins/”目录；
2. 在“插件”栏目中激活WindStyle MultiSite Nav Bar（每个博客都需要单独配置）。
3. 在“多站点导航栏”栏目中配置插件。
4. Enjoy！

== Screenshots ==

1. Option page. 配置界面。

== Changelog ==

= 1.3.0 =
* This version has a lot of changes. If you upgrade to this version, you need to re-configure plugin.
* 此版本变动较大，升级至此版本需要重新配置插件。
* Add global option page under 'Super Admin' page.
* 增加全局配置，位于“超级管理”栏目下。
* Move site logo url option to global option.
* 将当前站点Logo配置移入全局配置中。
* Code optimization.
* 优化代码

= 1.2.0 =
* Support multiple language, default includes English and Simplified Chinese.
* 增加多语言支持，默认支持英文和简体中文。

= 1.1.0 =
* Show all of blogs in navigation bar. 
* 导航栏中显示当前站点所有博客链接；
* Show logo or title of current site in navigation bar( configurable).
* 导航栏支持显示当前站点Logo（可配置）或标题；
* Support configure width of navigation bar.
* 支持配置导航栏宽度；
* Support configure theme of navigation bar.
* 支持选择导航栏样式。