<?php


use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Forms\HTMLEditor\HtmlEditorField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Security\Permission;
use SilverStripe\Security\PermissionProvider;
use SilverStripe\CMS\Controllers\ModelAsController;
use SilverStripe\Control\HTTP;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\HTTPResponse;
use SilverStripe\Core\Extension;

class MaintenanceModeControllerExtension extends Extension {

  	public function onBeforeInit() {

      $config = SiteConfig::current_site_config();
      $MaintenancePage = MaintenancePage::get()->first();

      if ($this->owner->URLSegment == "home" && $config->MaintenanceMode && !Permission::check('VIEW_SITE_MAINTENANCE_MODE') && !Permission::check('ADMIN') ) {
        $response = new HTTPResponse();
        $response->redirect($MaintenancePage->AbsoluteLink(), 302);
        $response->output();
        die();
      }

      if (!$config->MaintenanceMode) {
          return;
      }

      if (Permission::check('MAINTENANCE_PAGE_VIEW_SITE') || Permission::check('ADMIN')) {
          return;
      }

      if ($this->owner instanceof MaintenancePageController) {
          return;
      }

      if(strstr("/Security/login", $this->owner->RelativeLink())) {
        return;
      }
      if (!$MaintenancePage) {
        return;
      }

      $response = new HTTPResponse();
      $response->redirect($MaintenancePage->AbsoluteLink(), 302);
      HTTP::add_cache_headers($response);
      $response->output();
      die();


    }

}
