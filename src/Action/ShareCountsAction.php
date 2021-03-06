<?php

declare(strict_types=1);

namespace Hofff\Contao\Shariff\Action;

use Hofff\Contao\Shariff\BackendFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\UriSigner;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/_hofff/contao-shariff/share-counts", methods="GET", name=ShareCountsAction::class)
 */
class ShareCountsAction
{
    public const KEY_PAGE = 'page';
    public const KEY_URL = 'url';

    /** @var BackendFactory */
    private $factory;

    /** @var UriSigner */
    private $uriSigner;

    public function __construct(BackendFactory $factory, UriSigner $uriSigner)
    {
        $this->factory = $factory;
        $this->uriSigner = $uriSigner;
    }

    public function __invoke(Request $request): JsonResponse
    {
        if(!$this->uriSigner->check($request->getUri())) {
            throw new BadRequestHttpException();
        }

        $pageId = (int) $request->query->get(self::KEY_PAGE);
        try {
            $backend = $this->factory->createBackend($pageId);
        } catch(\RuntimeException $e) {
            throw new BadRequestHttpException($e->getMessage(), $e->getCode(), $e);
        }

        $url = $request->query->get(self::KEY_URL);
        $counts = $backend->get($url);

        return new JsonResponse($counts);
    }
}
