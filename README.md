<h1>agencecaza/silverstripe-maintenancemode</h1>

<p>Simple module to put the website into maintenance mode</p>

<h2>Requirements</h2>
<ul><li>SilverStripe ^4.2.x</li></ul>

<h2>Installation</h2>

First you need to update the `composer.json` file to point composer to the mediasuitenz fork. Do the following:

In the require section, add this:

<pre>
 "agencecaza/silverstripe-maintenancemode": "dev-fixup_language_and_permissions"
</pre>

Then add a new section (if it doesn’t already exist) to specify mediasutienz fork for composer to install:

<pre>
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/mediasuitenz/silverstripe-maintenancemode.git"
    }
],
</pre>

Once this is done, install by running:

<pre>composer require agencecaza/silverstripe-maintenancemode dev-fixup_language_and_permissions</pre>

<h2>Usage</h2>

You will need to create a MaintenancePage.ss template first, and style it.

If you have created a template and published it, then you now be able to toggle on and off maintenance mode in the site settings -> access tab.

Notes:
Leaving the maintenance page published is fine, it's not able to be navigated to unless toggled on.
When maintenance mode is toggle on, only site administrators can browse the site and access the CMS, all other users are redirected to the maintenance page.
