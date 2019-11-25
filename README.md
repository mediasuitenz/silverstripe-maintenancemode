<h1>agencecaza/silverstripe-maintenancemode</h1>

<p>Put the website into maintenance mode</p>

<h2>Requirements</h2>
<ul><li>SilverStripe ^4.2.x</li></ul>

<h2>Installation</h2>
<pre>composer require agencecaza/silverstripe-maintenancemode dev-master</pre>

<h2>Usage</h2>
<h3>Templates</h3>
<p>MaintenancePage.ss must be created in your project and customized with theme styles.</p>

<h3>Give temporary access to developers</h3>
<ul>
  <li>Step 1 : Create a group «Maintenance Mode» and set permission «Access to the website»</li>
  <li>Step 2 : Create a user `temp@domain.tld` is the maintenance group</li>
</ul>

<h3>Preview website</h3>
<p>You can see the website throught login</p>
<pre>http://domain.tld/Security/login?BackURL=website-homepage-link</pre>
