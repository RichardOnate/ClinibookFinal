<?php

namespace App\Controllers;

use App\Models\RolModel;
use CodeIgniter\API\ResponseTrait;

class RolesController extends BaseController
{
    use ResponseTrait;

    public function listarRoles()
    {
        $rolesModel = new RolModel();

        $roles = $rolesModel->findAll();

        if (!empty($roles)) {
            return $this->response->setJSON($roles);
        } else {
            return $this->response->setStatusCode(204);
        }
    }
}
