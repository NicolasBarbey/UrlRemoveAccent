<?php

namespace UrlRemoveAccent\Controller;

use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Tools\URL;
use UrlRemoveAccent\UrlRemoveAccent;

class ConfigurationController extends BaseAdminController
{
    public function sanitizeAllAction()
    {
        if (null !== $response = $this->checkAuth([AdminResources::MODULE], ["UrlRemoveAccent"], AccessManager::UPDATE)) {
            return $response;
        }

        UrlRemoveAccent::removeAccentInAllExistingUrls();

        return $this->generateRedirect(URL::getInstance()->absoluteUrl('/admin/module/UrlRemoveAccent', []));
    }
}
