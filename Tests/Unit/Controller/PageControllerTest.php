<?php

declare(strict_types=1);

namespace Gruppe1\Stylingcockpit\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 */
class PageControllerTest extends UnitTestCase
{
    /**
     * @var \Gruppe1\Stylingcockpit\Controller\PageController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Gruppe1\Stylingcockpit\Controller\PageController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllPagesFromRepositoryAndAssignsThemToView(): void
    {
        $allPages = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $pageRepository = $this->getMockBuilder(\Gruppe1\Stylingcockpit\Domain\Repository\PageRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $pageRepository->expects(self::once())->method('findAll')->will(self::returnValue($allPages));
        $this->subject->_set('pageRepository', $pageRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('pages', $allPages);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenPageToView(): void
    {
        $page = new \Gruppe1\Stylingcockpit\Domain\Model\Page();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('page', $page);

        $this->subject->showAction($page);
    }
}
