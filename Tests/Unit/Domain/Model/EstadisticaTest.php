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
    public function getDescripcionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescripcion()
        );
    }

    /**
     * @test
     */
    public function setDescripcionForStringSetsDescripcion()
    {
        $this->subject->setDescripcion('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'descripcion',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTotalReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getTotal()
        );
    }

    /**
     * @test
     */
    public function setTotalForIntSetsTotal()
    {
        $this->subject->setTotal(12);

        self::assertAttributeEquals(
            12,
            'total',
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
    public function getAtributosReturnsInitialValueForAtributo()
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
    public function setAtributosForObjectStorageContainingAtributoSetsAtributos()
    {
        $atributo = new \Unal\EstadisticaUnal\Domain\Model\Atributo();
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
        $atributo = new \Unal\EstadisticaUnal\Domain\Model\Atributo();
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
        $atributo = new \Unal\EstadisticaUnal\Domain\Model\Atributo();
        $atributosObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $atributosObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($atributo));
        $this->inject($this->subject, 'atributos', $atributosObjectStorageMock);

        $this->subject->removeAtributo($atributo);
    }
}
