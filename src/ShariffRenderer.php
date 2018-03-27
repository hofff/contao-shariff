<?php

declare(strict_types=1);

namespace Hofff\Contao\Shariff;

use Contao\FrontendTemplate;
use Hofff\Contao\Shariff\Action\ShareCountsAction;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\UriSigner;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ShariffRenderer
{
    /** @var RequestStack */
    private $requestStack;

    /** @var UrlGeneratorInterface */
    private $urlGenerator;

    /** @var UriSigner */
    private $uriSigner;

    public function __construct(RequestStack $requestStack, UrlGeneratorInterface $urlGenerator, UriSigner $uriSigner)
    {
        $this->requestStack = $requestStack;
        $this->urlGenerator = $urlGenerator;
        $this->uriSigner = $uriSigner;
    }

    public function render(array $params): string
    {
        $tpl = new FrontendTemplate('hofff_shariff');
        $tpl->setData($params);

        $tpl->backend_url = $params['share_count'] ? $this->generateShareCountsUrl() : null;
        $tpl->url = $this->generateShareUrl();
        $tpl->mail_subject = $this->replaceTokens($params['mail_subject']);
        $tpl->mail_body = $this->replaceTokens($params['mail_body']);

        return $tpl->parse();
    }

    private function replaceTokens(string $content, array $params): string
    {
        $tokens = [];
        $tokens['##url##'] = $this->generateShareUrl($params);

        $content = str_replace(array_keys($tokens), array_values($tokens), $content);

        return $content;
    }

    private function generateShareUrl(array $params): string
    {
        if(isset($params['url']) && strlen($params['url'])) {
            return $params['url'];
        }

        return $this->requestStack->getMasterRequest()->getUri();
    }

    private function generateShareCountsUrl(int $pageId, array $params): string
    {
        $url = $this->urlGenerator->generate(ShareCountsAction::class, [
            ShareCountsAction::KEY_PAGE => $pageId,
            ShareCountsAction::KEY_URL => $this->getShareUrl($params),
        ]);

        return $this->uriSigner->sign($url);
    }
}
