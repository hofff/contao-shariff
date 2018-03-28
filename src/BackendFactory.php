<?php

declare(strict_types=1);

namespace Hofff\Contao\Shariff;

use Contao\PageModel;
use Heise\Shariff\Backend;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Contao\CoreBundle\Framework\ContaoFrameworkInterface;
use Symfony\Component\Filesystem\Filesystem;

class BackendFactory
{
    /** @var string */
    private $cacheDir;

    /** @var ContaoFrameworkInterface */
    private $contao;

    /** @var LoggerInterface */
    private $logger;

    /** @var Filesystem */
    private $fs;

    public function __construct(string $cacheDir, ContaoFrameworkInterface $contao, ?LoggerInterface $logger = null)
    {
        $this->cacheDir = $cacheDir;
        $this->contao = $contao;
        $this->logger = $logger ?? new NullLogger();
        $this->fs = new Filesystem();
    }

    public function createBackend(int $pageId): Backend
    {
        $this->contao->initialize();

        $page = PageModel::findByPk($pageId);

        if($page->type !== 'root' || !$page->hofff_shariff_share_counts) {
            throw new \RuntimeException('No Shariff Backend configuration available.');
        }

        $cacheDir = $this->cacheDir.'/hofff/contao-shariff/'.$page->id;
        $this->fs->mkdir($cacheDir);

        $options = [
//             'domains' => null,
            'cache'	=> [
                'ttl'      => $page->hofff_shariff_cache_ttl ?? 6 * 60 * 60,
                'cacheDir' => $cacheDir,
            ],
            'services' => [
                'AddThis',
                'Facebook',
                'Flattr',
                'LinkedIn',
                'Pinterest',
                'Reddit',
                'StumbleUpon',
                'Vk',
                'Xing',
            ],
        ];

        if(strlen($page->hofff_shariff_facebook_app_id) && strlen($page->hofff_shariff_facebook_secret)) {
            $options['facebook']['app_id'] = $page->hofff_shariff_facebook_app_id;
            $options['facebook']['secret'] = $page->hofff_shariff_facebook_secret;
        }

        $backend = new Backend($options);
        $backend->setLogger($this->logger);

        return $backend;
	}
}
