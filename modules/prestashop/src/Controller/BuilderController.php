<?php

namespace Legobuilder\Controller;

use Exception;
use Legobuilder\Endpoint\EndpointRequest;
use Legobuilder\Framework\EngineInterface;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PrestaShopBundle\Security\Annotation\AdminSecurity;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
        $viteDevelopmentPort = getenv('LEGOBUILDER_VITE');

        return $this->render('@Modules/legobuilder/views/templates/admin/editor.html.twig', [
            'endpoint_link' => $this->generateUrl('legobuilder_endpoint'),
            'vite_port' => $viteDevelopmentPort
        ]);
    }

    /**
     * Handles the endpoint for the editor.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function endpointAction(Request $request): Response
    {
        $input = json_decode($request->getContent(), true);

        $endpointRequest = (new EndpointRequest())
            ->setQuery($input['query'] ?? null)
            ->setVariables($input['variables'] ?? null)
        ;

        /** @var ValidatorInterface $validator */
        $validator = $this->get('validator');
        $errors = $validator->validate($endpointRequest);

        if (count($errors) > 0) {
            return new JsonResponse(['errors' => $errors, 'request' => $input]);
        }
        
        $builderEndpoint = $this->engine->getEndpoint();
        $endpointResult = $builderEndpoint->execute($endpointRequest->getQuery(), $endpointRequest->getVariables());

        return new JsonResponse($endpointResult);
    }
}