<?php

declare(strict_types=1);

namespace Gruppe1\Stylingcockpit\Controller;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

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


        // $this->view->assign('pageTsConfig', BackendUtility::getPagesTSconfig(1)['mod.']['web_layout.']);
        //$this->view->assign('rootLine', $rootlinePages);

        //? Do we need this?
        // $tests = $this->testRepository->findAll();
        $this->view->assign('tests', ['sdfaaaaaaaaaaaaaaa']);
        //?

        // //! ******************************************************
        // echo '<pre>';
        // var_dump(BackendUtility::getPagesTSconfig(1)["mod."]["web_layout."]["BackendLayouts."]);
        // echo '</pre>';

        $test = "homepage1";

        // ******************************************************

        $layouts = BackendUtility::getPagesTSconfig(1)["mod."]["web_layout."]["BackendLayouts."];


        foreach($layouts as $key => $value) {
            // echo ($value["config."]["backend_layout."]["rowCount."]);
            // echo explode(".", $key)[0]."<br>";

            $testLayout = "";
            $heightCounter = count($value["config."]["backend_layout."]["rows."]) -2;

            if (!str_contains($key, "homepage")) {
                $testLayout .= "<div style='height: 20%;width:100%; border: 1px solid black'>header</div>";
                $heightCounter += 2;
            }

            foreach ($value["config."]["backend_layout."]["rows."] as $layout) {
                $mar = explode("-", $key);
                $zahl = 1;
                
                

                foreach ($layout["columns."] as $sub) {
                    $a = (count($layout["columns."]) !== 1) ? 'display: inline-block;' : '';
                    $b = (count($mar) == 1) ? 1 : ((int)$mar[$zahl++]) / 100;
                    $c = (str_contains($key, "homepage")) ? 1 / count($layout["columns."]) : $b;


                    if (end(explode(".", $sub['name'])) == "header") {
                        $testLayout .= "<div style='height: 20%;width:100%; border: 1px solid black'>header</div>";
                    } else if (end(explode(".", $sub['name'])) == "footer") {
                        $testLayout .= "<div style='height: 20%;width:100%; border: 1px solid black'>footer</div>";
                    } else {
                        $testLayout .= "<div style='height:". 60 / $heightCounter."%;width:". 100 * $c ."%; border: 1px solid black;".$a."'>".end(explode(".", $sub['name']))."</div>";
                    }

                }

            }

            if (!str_contains($key, "homepage")) {
                $testLayout .= "<div style='height: 20%; width:100%; border: 1px solid black'>footer</div>";
            }
            $this->view->assign(explode(".", $key)[0], $testLayout);


        }
        echo "<pre>";
        print_r($gridArray);
        echo "</pre>";

        print_r($homepageArray);

        // ******************************************************

        return $this->htmlResponse();
    }

    public function doSomethingAction(ServerRequestInterface $request): ResponseInterface
    {
        $input = $request->getQueryParams()['input'] ?? null;
        if ($input === null) {
            throw new \InvalidArgumentException('Please provide a number', 1580585107);
        }

        $result = $input ** 2;
        return new Response(json_encode(['result' => $result]), 200, ['Content-Type' => 'application/json; charset=utf-8']);
    }


}
