# Gravity Forms JavScript Dynamic Population

Some caching systems ignore query parameters, preventing Gravity Forms from dynamically populating field values.

This plugin bypasses that problem by filling Gravity Forms fields that have dynamic population enabled on the client side using JavaScript.

To use, install and activate this plugin and then configure Gravity Forms' built-in dynamic population setting for the desired form fields as you normally would. When values are passed for those form fields in the URL, the plugin will detect them and fill them in.

This plugin is available on Packagist for installation with Composer, and also supports installation and updates with [GitHub Updater](https://github.com/afragen/github-updater).
