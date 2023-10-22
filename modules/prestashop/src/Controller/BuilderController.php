<?php

namespace Legobuilder\Controller;

use Legobuilder\Endpoint\EndpointRequest;
use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Helper\Vite\Manifest;
use PrestaShop\PrestaShop\Adapter\Shop\Url\BaseUrlProvider;
use PrestaShop\PrestaShop\Core\Shop\Url\UrlProviderInterface;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PrestaShopBundle\Security\Annotation\AdminSecurity;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class BuilderController extends FrameworkBundleAdminController
{
    /**
     * @var UrlProviderInterface
     */
    private $baseUrlProvider;

    public function __construct(BaseUrlProvider $baseUrlProvider)
    {
        $this->baseUrlProvider = $baseUrlProvider;
    }

    /**
     * Handles the displaying of the builder client.
     * 
     * @AdminSecurity("is_granted('read', request.get('_legacy_controller'))", message="Access denied.")
     * 
     * @return Response
     */
    public function editorAction(): Response
    {
        $viteDevelopmentPort = getenv('LEGOBUILDER_VITE');
        $viteManifest = null;

        if (false == $viteDevelopmentPort) {
            $viteManifest = new Manifest('a', 'e');
        }
        
        return $this->render('@Modules/legobuilder/views/templates/admin/editor.html.twig', [
            'front_uri' => $this->baseUrlProvider->getUrl(),
            'endpoint_uri' => $this->generateUrl('legobuilder_endpoint'),
            'vite_port' => $viteDevelopmentPort,
            'vite_manifest' => $viteManifest
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
        
        /** @var EndpointInterface $builderEndpoint */
        $builderEndpoint = $this->get(EndpointInterface::class);
        $endpointResult = $builderEndpoint->execute($endpointRequest->getQuery(), $endpointRequest->getVariables());

        return new JsonResponse($endpointResult);
    }
}