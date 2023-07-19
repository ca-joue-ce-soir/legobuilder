<?php

namespace Legobuilder\Prestashop\Controller;

use Legobuilder\Framework\EngineInterface;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PrestaShopBundle\Security\Annotation\AdminSecurity;

final class BuilderController extends FrameworkBundleAdminController
{
    /**
     * @var EngineInterface
     */
    private $engine;

    public function __construct(EngineInterface $engine)
    {
        $this->engine = $engine;
    }

    /**
     * Handles the displaying of the builder client.
     * @AdminSecurity("is_granted('read', request.get('_legacy_controller'))", message="Access denied.")
     * 
     * @return Response
     */
    public function editorAction(): Response
    {
        return $this->render('@Modules/legobuilder/views/templates/admin/editor.html.twig', [
            'endpoint_link' => $this->generateUrl('legobuilder_endpoint')
        ]);
    }

    /**
     * Handles the endpoint for the editor.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function endpointAction(Request $request): JsonResponse
    {
        $query = $request->query->get('query');
        $variableValues = $request->query->get('variables');

        $builderEndpoint = $this->engine->getEndpoint();
        $endpointResult = $builderEndpoint->execute($query, $variableValues);

        return new JsonResponse($endpointResult);
    }
}