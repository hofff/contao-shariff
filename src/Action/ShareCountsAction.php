<?php

declare(strict_types=1);

namespace Hofff\Contao\Shariff\Action;

use Hofff\Contao\Shariff\BackendFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as FEB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\UriSigner;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * @FEB\Route("/_hofff/contao-shariff/share-counts", methods="GET", name=ShareCountsAction::class)
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
        $url = $request->query->get(self::KEY_URL);
        $counts = $this->factory->createBackend($pageId)->get($url);

        return new JsonResponse($counts);
    }
}
