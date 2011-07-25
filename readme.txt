=== WindStyle MultiSite Nav Bar ===
Contributors: xiaoshatian
Donate link: 
Tags: MultiSite, Navigation, bar, Admin Bar
Requires at least: 3.2.0
Tested up to: 3.2.0
Stable tag: trunk,

MultiSite navigation bar for Wordpress 3.0+. 针对Wordpress 3.0+的多站点导航栏插件。

== Description ==

Wordpress 3.0+ integrates Multi-Site feature of Wordpress MU. We can easily create a lot of blogs, with only one deployment of Wordpress. 

WindStyle MultiSite Nav Bar can show a navigation bar on every blog of your Wordpress site. All of blogs will show in this navigation bar. And you can customize site logo.

WordPress从3.0版本开始兼并了Wordpress MU的多站点功能（MultiSite），凭借此功能，只需要部署一次Wordpress，就可以方便地创建出许多博客站点。当你在维护多个博客的时候，可能并不希望让这些博客看起来各自独立，如果你希望能通过类似导航栏的方式把多个博客连接起来，但又不想要使用臃肿的BuddyPress插件，那就尝试一下MultiSite Nav Bar吧。

MultiSite Nav Bar只需要在顶级网站中激活并配置，激活之后，它会在博客中添加一个导航栏，用以显示当前Wordpress站点的名称、Logo以及所有博客的链接。



== Installation ==

1. Upload plugin files( WindStyle-MultiSite-Nav-Bar.php and related directories) to '/wp-content/plugins/' directory.
2. Login as Network Admin.
3. Click 'Howdy, Your name' in the right top corner, then select 'Network Admin'.
4. Activate WindStyle MultiSite Nav Bar from 'Plugins' page( every blog need do this).
5. Configure plugin at 'MultiSite Nav Bar' page under 'Settings'.
6. Enjoy!

1. 将插件（WindStyle-MultiSite-Nav-Bar.php及相关文件、文件夹）上传到“/wp-content/plugins/”目录；
2. 以顶级管理员身份登录；
3. 点击右上角的“您好，用户”菜单，然后选择“管理站点”；
4. 在“插件”栏目中激活WindStyle MultiSite Nav Bar。
5. 在“设置”下方的“多站点导航栏”栏目中配置插件。
6. Enjoy！

== Screenshots ==

1. Preview. 预览。

2. Top Site Option page. 配置界面。
                   
== Changelog ==

= 2.1.0 =
* Upgraded to global plugin, please activate it in Network Admin Dashboard, sub-sites don't need to activate this plugin.
* 插件升级为网络全局插件，请顶级管理员在“管理网络”控制板的“插件”栏目中启用插件，子站点无需单独启用。
* Option page was moved to Settings in Network Admin Dashboard.
* 更改选项入口，新的入口在“管理网络”的“设置”中。

= 2.0.0 =
* Using Wordpress built-in Admin Bar to render navigation content.
* 使用Wordpress内置的管理员工具栏来呈现导航内容。
* Remove theme feature, using default theme of Wordpress Admin Bar.
* 去除主题功能，使用Wordpress管理员工具栏默认主题。

= 1.5.0 =
* Using JavaScript to render navigation bar to avoid conflicts with other plugins.
* 使用JavaScript来呈现导航栏，以避免和其他插件冲突。

= 1.4.0 =
* Support display links in specified category of main blog. You can configure link category in global option page;
* 支持显示主博客指定链接分类下的所有链接，可以在全局选项页面配置链接分类；
* Code optimization.
* 优化代码。

= 1.3.0 =
* This version has a lot of changes. If you upgrade to this version, you need to re-configure plugin;
* 此版本变动较大，升级至此版本需要重新配置插件；
* Add global option page under 'Super Admin' page;
* 增加全局配置，位于“超级管理”栏目下；
* Move site logo url option to global option;
* 将当前站点Logo配置移入全局配置中；
* Code optimization.
* 优化代码。

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