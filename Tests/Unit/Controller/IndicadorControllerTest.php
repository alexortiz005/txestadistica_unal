<?php
namespace Unal\EstadisticaUnal\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Alexis Ortiz <eaortiz@unal.edu.co>
 */
class IndicadorControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Unal\EstadisticaUnal\Controller\IndicadorController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Unal\EstadisticaUnal\Controller\IndicadorController::class)
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
    public function listActionFetchesAllIndicadorsFromRepositoryAndAssignsThemToView()
    {

        $allIndicadors = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $indicadorRepository = $this->getMockBuilder(\Unal\EstadisticaUnal\Domain\Repository\IndicadorRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $indicadorRepository->expects(self::once())->method('findAll')->will(self::returnValue($allIndicadors));
        $this->inject($this->subject, 'indicadorRepository', $indicadorRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('indicadors', $allIndicadors);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
