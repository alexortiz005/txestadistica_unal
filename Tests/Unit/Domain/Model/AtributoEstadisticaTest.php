<?php
namespace Unal\EstadisticaUnal\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Alexis Ortiz <eaortiz@unal.edu.co>
 */
class AtributoEstadisticaTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Unal\EstadisticaUnal\Domain\Model\AtributoEstadistica
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Unal\EstadisticaUnal\Domain\Model\AtributoEstadistica();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNombreReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNombre()
        );
    }

    /**
     * @test
     */
    public function setNombreForStringSetsNombre()
    {
        $this->subject->setNombre('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nombre',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNombreDisplayReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNombreDisplay()
        );
    }

    /**
     * @test
     */
    public function setNombreDisplayForStringSetsNombreDisplay()
    {
        $this->subject->setNombreDisplay('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nombreDisplay',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getContenidoReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getContenido()
        );
    }

    /**
     * @test
     */
    public function setContenidoForStringSetsContenido()
    {
        $this->subject->setContenido('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'contenido',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTipoReturnsInitialValueForTipoAtrEstadistica()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTipo()
        );
    }

    /**
     * @test
     */
    public function setTipoForObjectStorageContainingTipoAtrEstadisticaSetsTipo()
    {
        $tipo = new \Unal\EstadisticaUnal\Domain\Model\TipoAtrEstadistica();
        $objectStorageHoldingExactlyOneTipo = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTipo->attach($tipo);
        $this->subject->setTipo($objectStorageHoldingExactlyOneTipo);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTipo,
            'tipo',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addTipoToObjectStorageHoldingTipo()
    {
        $tipo = new \Unal\EstadisticaUnal\Domain\Model\TipoAtrEstadistica();
        $tipoObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tipoObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($tipo));
        $this->inject($this->subject, 'tipo', $tipoObjectStorageMock);

        $this->subject->addTipo($tipo);
    }

    /**
     * @test
     */
    public function removeTipoFromObjectStorageHoldingTipo()
    {
        $tipo = new \Unal\EstadisticaUnal\Domain\Model\TipoAtrEstadistica();
        $tipoObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tipoObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($tipo));
        $this->inject($this->subject, 'tipo', $tipoObjectStorageMock);

        $this->subject->removeTipo($tipo);
    }
}
