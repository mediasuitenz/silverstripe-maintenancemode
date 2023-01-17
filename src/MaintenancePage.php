<?php

use SilverStripe\Security\PermissionProvider;
use SilverStripe\Security\Permission;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\ErrorPage\ErrorPage;

class MaintenancePage extends ErrorPage {

	private static $allowed_children = array("none");
	private static $description = "Maintenance page";

	public function canCreate($member = null, $context = null) {
		return !MaintenancePage::get()->exists();
	}
}


class MaintenancePageController extends ContentController {

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
		return $this->renderWith(array('MaintenancePage', 'Page'));
	}
}
