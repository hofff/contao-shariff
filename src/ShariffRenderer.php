<?php

declare(strict_types=1);

namespace Hofff\Contao\Shariff;

use Contao\FrontendTemplate;
use Hofff\Contao\Shariff\Action\ShareCountsAction;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\UriSigner;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Contao\PageModel;

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

    public function render(array $params, int $rootPageId): string
    {
        $tpl = new FrontendTemplate('hofff_shariff');
        $tpl->setData($params);

        $tpl->backend_url = $params['button_style'] !== 'icon' && PageModel::findByPk($rootPageId)->hofff_shariff_share_counts
            ? $this->generateShareCountsUrl($rootPageId, $params)
            : null;
        $tpl->url = $this->generateShareUrl($params);
        $tpl->mail_subject = $this->replaceTokens($params['mail_subject'], $params);
        $tpl->mail_body = $this->replaceTokens($params['mail_body'], $params);

        return $tpl->parse();
    }

    private function replaceTokens(?string $content, array $params): string
    {
        $tokens = [];
        $tokens['##url##'] = $this->generateShareUrl($params);

        $content = str_replace(array_keys($tokens), array_values($tokens), (string) $content);

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
            ShareCountsAction::KEY_URL => $this->generateShareUrl($params),
        ], UrlGeneratorInterface::ABSOLUTE_URL);

        return $this->uriSigner->sign($url);
    }
}
