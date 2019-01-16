<?php

use SilverStripe\Security\PermissionProvider;
use SilverStripe\Security\Permission;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\ErrorPage\ErrorPage;

class MaintenancePage extends ErrorPage {

	private static $allowed_children = array("none");

	private static $description = _t('MaintenancePage.DESCRIPTION',"Maintenance page");

	public function canCreate($member = null, $context = null) {
		return !MaintenancePage::get()->exists();
	}

}


class MaintenancePageController extends ContentController implements PermissionProvider {

	private static $url_handlers = array(
		'*' => 'index'
	);

	private static $allowed_actions = array();

	public function init() {
		parent::init();
	}

	public function index()
	{
		$config = $this->SiteConfig();

		if (!$config->MaintenanceMode && !Permission::check('ADMIN')) {
			return $this->redirect(BASE_URL); //redirect to home page
		}
		$this->response->setStatusCode($this->ErrorCode);
		if ($this->dataRecord->RenderingTemplate) {
			return $this->renderWith(array($this->dataRecord->RenderingTemplate));
		}
		return $this->renderWith(array('PageMaintenance', 'Page'));
	}




	public function providePermissions()
	{
		return array(
			'MAINTENANCE_PAGE_VIEW_SITE' => _t('MaintenancePage.PERMISSION_ADMIN',"Access to the website while maintenance")
		);
	}

}
