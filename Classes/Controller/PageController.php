<?php

declare(strict_types=1);

namespace Gruppe1\Stylingcockpit\Controller;


/**
 * This file is part of the "Styling Cockpit" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */


/**
 * PageController
 */
class PageController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * pageRepository
     *
     * @var \Gruppe1\Stylingcockpit\Domain\Repository\PageRepository
     */
    protected $pageRepository = null;

    /**
     * @param \Gruppe1\Stylingcockpit\Domain\Repository\PageRepository $pageRepository
     */
    public function injectPageRepository(\Gruppe1\Stylingcockpit\Domain\Repository\PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $pages = $this->pageRepository->findAll();
        $this->view->assign('pages', $pages);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Gruppe1\Stylingcockpit\Domain\Model\Page $page
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Gruppe1\Stylingcockpit\Domain\Model\Page $page): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('page', $page);
        return $this->htmlResponse();
    }
}
