<?php
namespace Unal\EstadisticaUnal\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Alexis Ortiz <eaortiz@unal.edu.co>
 */
class DesagreagacionControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Unal\EstadisticaUnal\Controller\DesagreagacionController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Unal\EstadisticaUnal\Controller\DesagreagacionController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllDesagreagacionsFromRepositoryAndAssignsThemToView()
    {

        $allDesagreagacions = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $desagreagacionRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $desagreagacionRepository->expects(self::once())->method('findAll')->will(self::returnValue($allDesagreagacions));
        $this->inject($this->subject, 'desagreagacionRepository', $desagreagacionRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('desagreagacions', $allDesagreagacions);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenDesagreagacionToView()
    {
        $desagreagacion = new \Unal\EstadisticaUnal\Domain\Model\Desagreagacion();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('desagreagacion', $desagreagacion);

        $this->subject->showAction($desagreagacion);
    }
}
