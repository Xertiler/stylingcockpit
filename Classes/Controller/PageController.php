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
    public function injectPageRepository(\Gruppe1\Stylingcockpit\Domain\Repository\PageRepository $pageRepository){
        $this->pageRepository = $pageRepository;
    }

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface{
        $PageTSconfig = \TYPO3\CMS\Backend\Utility\BackendUtility::getPagesTSconfig($this->pObj->id);
        $websiteID = $PageTSconfig['TSFE.']['constants.']['websiteConfig.'];

        foreach ($PageTSconfig['TSFE'] as $dogshit){
            echo $dogshit;
        }

        //$currentPid = $GLOBALS['TSFE']->id;
        //$this->view->assign('pageID', [$currentPid]);
        //echo 'this is a test' + $websiteID;
        //echo $this->request->getBaseUri();
        //echo 'PHP version: ' . phpversion();

        return $this->htmlResponse();
    }

    public function testAction(){
        //$PageTSconfig = \TYPO3\CMS\Backend\Utility\BackendUtility::getPagesTSconfig($this->pObj->id);
        //$websiteID = $PageTSconfig['TSFE.']['constants.']['websiteConfig.']['id'];
        echo 'test ausgabe';
    }

    public function anotherTestAction(){
        echo "test2 ausgabe";
        //http_redirect('http://www.google.com');
    }


    public function ajaxTest(){
        echo "hello world";
    }


}
