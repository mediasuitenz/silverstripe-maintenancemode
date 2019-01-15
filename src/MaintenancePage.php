<?php

use SilverStripe\Security\PermissionProvider;
use SilverStripe\Security\Permission;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\ErrorPage\ErrorPage;
use SilverStripe\ErrorPage\ErrorPageController;

class MaintenancePage extends ErrorPage {

	private static $allowed_children = array("none");

	private static $description = 'Page maintenance';

	public function canCreate($member = null, $context = null)
	{
		return !MaintenancePage::get()->exists();
	}

}


class MaintenancePageController extends ContentController implements PermissionProvider {


	private static $allowed_actions = array();

	public function init() {
		parent::init();

	}

	public function providePermissions()
	{
			return array(
					'MAINTENANCE_PAGE_VIEW_SITE' => "Accès au site même s'il est en maintenance"
			);
	}

}
