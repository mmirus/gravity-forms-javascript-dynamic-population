# Gravity Forms JavScript Dynamic Population

Some caching systems ignore query parameters, preventing Gravity Forms from dynamically populating field values.

This plugin bypasses that problem by filling Gravity Forms fields that have dynamic population enabled on the client side using JavaScript.

## Installation

There are three options for installing this plugin:

1. With composer from [Packagist](https://packagist.org/packages/mmirus/gravity-forms-javascript-dynamic-population): `composer require mmirus/gravity-forms-javascript-dynamic-population`
2. With [GitHub Updater](https://github.com/afragen/github-updater)
3. By downloading the latest release ZIP from this repository and installing it like any normal WordPress plugin

## Usage

Once you have the plugin installed and activated, just configure Gravity Forms' built-in dynamic population setting for the desired form fields as you normally would--no extra steps are needed. When values are passed for those form fields in the URL, the plugin's JavaScript will detect them and fill them in.
