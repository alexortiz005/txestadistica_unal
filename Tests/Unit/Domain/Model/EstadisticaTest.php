<?php
namespace Unal\EstadisticaUnal\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Alexis Ortiz <eaortiz@unal.edu.co>
 */
class EstadisticaTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Unal\EstadisticaUnal\Domain\Model\Estadistica
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Unal\EstadisticaUnal\Domain\Model\Estadistica();
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
    public function getTextoProtocoloReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTextoProtocolo()
        );
    }

    /**
     * @test
     */
    public function setTextoProtocoloForStringSetsTextoProtocolo()
    {
        $this->subject->setTextoProtocolo('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'textoProtocolo',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBadgeReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getBadge()
        );
    }

    /**
     * @test
     */
    public function setBadgeForFileReferenceSetsBadge()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setBadge($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'badge',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAltBadgeReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getAltBadge()
        );
    }

    /**
     * @test
     */
    public function setAltBadgeForFileReferenceSetsAltBadge()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setAltBadge($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'altBadge',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLinkReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getLink()
        );
    }

    /**
     * @test
     */
    public function setLinkForStringSetsLink()
    {
        $this->subject->setLink('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'link',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDesagregacionesReturnsInitialValueForDesagregacion()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getDesagregaciones()
        );
    }

    /**
     * @test
     */
    public function setDesagregacionesForObjectStorageContainingDesagregacionSetsDesagregaciones()
    {
        $desagregacione = new \Unal\EstadisticaUnal\Domain\Model\Desagregacion();
        $objectStorageHoldingExactlyOneDesagregaciones = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneDesagregaciones->attach($desagregacione);
        $this->subject->setDesagregaciones($objectStorageHoldingExactlyOneDesagregaciones);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneDesagregaciones,
            'desagregaciones',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addDesagregacioneToObjectStorageHoldingDesagregaciones()
    {
        $desagregacione = new \Unal\EstadisticaUnal\Domain\Model\Desagregacion();
        $desagregacionesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $desagregacionesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($desagregacione));
        $this->inject($this->subject, 'desagregaciones', $desagregacionesObjectStorageMock);

        $this->subject->addDesagregacione($desagregacione);
    }

    /**
     * @test
     */
    public function removeDesagregacioneFromObjectStorageHoldingDesagregaciones()
    {
        $desagregacione = new \Unal\EstadisticaUnal\Domain\Model\Desagregacion();
        $desagregacionesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $desagregacionesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($desagregacione));
        $this->inject($this->subject, 'desagregaciones', $desagregacionesObjectStorageMock);

        $this->subject->removeDesagregacione($desagregacione);
    }

    /**
     * @test
     */
    public function getAtributosReturnsInitialValueForAtributoEstadistica()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getAtributos()
        );
    }

    /**
     * @test
     */
    public function setAtributosForObjectStorageContainingAtributoEstadisticaSetsAtributos()
    {
        $atributo = new \Unal\EstadisticaUnal\Domain\Model\AtributoEstadistica();
        $objectStorageHoldingExactlyOneAtributos = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneAtributos->attach($atributo);
        $this->subject->setAtributos($objectStorageHoldingExactlyOneAtributos);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneAtributos,
            'atributos',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addAtributoToObjectStorageHoldingAtributos()
    {
        $atributo = new \Unal\EstadisticaUnal\Domain\Model\AtributoEstadistica();
        $atributosObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $atributosObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($atributo));
        $this->inject($this->subject, 'atributos', $atributosObjectStorageMock);

        $this->subject->addAtributo($atributo);
    }

    /**
     * @test
     */
    public function removeAtributoFromObjectStorageHoldingAtributos()
    {
        $atributo = new \Unal\EstadisticaUnal\Domain\Model\AtributoEstadistica();
        $atributosObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $atributosObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($atributo));
        $this->inject($this->subject, 'atributos', $atributosObjectStorageMock);

        $this->subject->removeAtributo($atributo);
    }

    /**
     * @test
     */
    public function getTiposAtrDesagregacionesReturnsInitialValueForTipoAtrDesagregacion()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTiposAtrDesagregaciones()
        );
    }

    /**
     * @test
     */
    public function setTiposAtrDesagregacionesForObjectStorageContainingTipoAtrDesagregacionSetsTiposAtrDesagregaciones()
    {
        $tiposAtrDesagregacione = new \Unal\EstadisticaUnal\Domain\Model\TipoAtrDesagregacion();
        $objectStorageHoldingExactlyOneTiposAtrDesagregaciones = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTiposAtrDesagregaciones->attach($tiposAtrDesagregacione);
        $this->subject->setTiposAtrDesagregaciones($objectStorageHoldingExactlyOneTiposAtrDesagregaciones);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTiposAtrDesagregaciones,
            'tiposAtrDesagregaciones',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addTiposAtrDesagregacioneToObjectStorageHoldingTiposAtrDesagregaciones()
    {
        $tiposAtrDesagregacione = new \Unal\EstadisticaUnal\Domain\Model\TipoAtrDesagregacion();
        $tiposAtrDesagregacionesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tiposAtrDesagregacionesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($tiposAtrDesagregacione));
        $this->inject($this->subject, 'tiposAtrDesagregaciones', $tiposAtrDesagregacionesObjectStorageMock);

        $this->subject->addTiposAtrDesagregacione($tiposAtrDesagregacione);
    }

    /**
     * @test
     */
    public function removeTiposAtrDesagregacioneFromObjectStorageHoldingTiposAtrDesagregaciones()
    {
        $tiposAtrDesagregacione = new \Unal\EstadisticaUnal\Domain\Model\TipoAtrDesagregacion();
        $tiposAtrDesagregacionesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tiposAtrDesagregacionesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($tiposAtrDesagregacione));
        $this->inject($this->subject, 'tiposAtrDesagregaciones', $tiposAtrDesagregacionesObjectStorageMock);

        $this->subject->removeTiposAtrDesagregacione($tiposAtrDesagregacione);
    }

    /**
     * @test
     */
    public function getIndicadoresReturnsInitialValueForIndicador()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getIndicadores()
        );
    }

    /**
     * @test
     */
    public function setIndicadoresForObjectStorageContainingIndicadorSetsIndicadores()
    {
        $indicadore = new \Unal\EstadisticaUnal\Domain\Model\Indicador();
        $objectStorageHoldingExactlyOneIndicadores = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneIndicadores->attach($indicadore);
        $this->subject->setIndicadores($objectStorageHoldingExactlyOneIndicadores);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneIndicadores,
            'indicadores',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addIndicadoreToObjectStorageHoldingIndicadores()
    {
        $indicadore = new \Unal\EstadisticaUnal\Domain\Model\Indicador();
        $indicadoresObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $indicadoresObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($indicadore));
        $this->inject($this->subject, 'indicadores', $indicadoresObjectStorageMock);

        $this->subject->addIndicadore($indicadore);
    }

    /**
     * @test
     */
    public function removeIndicadoreFromObjectStorageHoldingIndicadores()
    {
        $indicadore = new \Unal\EstadisticaUnal\Domain\Model\Indicador();
        $indicadoresObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $indicadoresObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($indicadore));
        $this->inject($this->subject, 'indicadores', $indicadoresObjectStorageMock);

        $this->subject->removeIndicadore($indicadore);
    }
}
