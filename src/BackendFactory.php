<?php

declare(strict_types=1);

namespace Hofff\Contao\Shariff;

use Contao\PageModel;
use Heise\Shariff\Backend;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class BackendFactory
{
    /** @var string */
    private $cacheDir;

    /** @var LoggerInterface */
    private $logger;

    public function __construct(string $cacheDir, ?LoggerInterface $logger = null)
    {
        $this->cacheDir = $cacheDir;
        $this->logger = $logger ?? new NullLogger();
    }

    public function createBackend(int $pageId): Backend
    {
        $page = PageModel::findByPk($pageId);

        if($page->type !== 'root' || $page->hofff_shariff_share_counts) {
            throw new \RuntimeException();
        }

        $options = [
//             'domains' => null,
            'cache'	=> [
                'ttl'      => 6 * 60 * 60,
                'cacheDir' => $this->cacheDir.'/hofff/contao-shariff/'.$page->id,
            ],
            'services' => [
                'AddThis',
                'Facebook',
                'Flattr',
                'GooglePlus',
                'LinkedIn',
                'Pinterest',
                'Reddit',
                'StumbleUpon',
                'Xing',
            ],
        ];

        $backend = new Backend($options);
        $backend->setLogger($this->logger);

        return $backend;
	}
}
