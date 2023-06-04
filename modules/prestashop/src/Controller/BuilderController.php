<?php

namespace Legobuilder\Prestashop\Controller;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class BuilderController extends FrameworkBundleAdminController
{
    public function editorAction(): Response
    {
        return $this->render('@Modules/legobuilder/views/templates/admin/editor.html.twig', [
            'endpoint_link' => $this->generateUrl('legobuilder_endpoint')
        ]);
    }

    public function endpointAction(Request $request): JsonResponse
    {
        return new JsonResponse();
    }
}