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

class MaintenanceModeExtension extends DataExtension {

  private static $db = [
    'MaintenanceMode' => 'Boolean',
  ];

  public function updateCMSFields(FieldList $fields) {

    parent::updateCMSFields($fields);

    if ((MaintenancePage::get()->count()>0)) {

      $fields->addFieldToTab(
        'Root.Access',
        CheckboxField::create(
          'MaintenanceMode',
          'Mettre le site en maintenance'
        )
      );

    }

  	return $fields;

  }

}
