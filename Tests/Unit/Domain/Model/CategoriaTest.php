<?php
namespace Unal\EstadisticaUnal\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Alexis Ortiz <eaortiz@unal.edu.co>
 */
class CategoriaTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Unal\EstadisticaUnal\Domain\Model\Categoria
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Unal\EstadisticaUnal\Domain\Model\Categoria();
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
    public function getEstadisticasReturnsInitialValueForEstadistica()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getEstadisticas()
        );
    }

    /**
     * @test
     */
    public function setEstadisticasForObjectStorageContainingEstadisticaSetsEstadisticas()
    {
        $estadistica = new \Unal\EstadisticaUnal\Domain\Model\Estadistica();
        $objectStorageHoldingExactlyOneEstadisticas = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneEstadisticas->attach($estadistica);
        $this->subject->setEstadisticas($objectStorageHoldingExactlyOneEstadisticas);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneEstadisticas,
            'estadisticas',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addEstadisticaToObjectStorageHoldingEstadisticas()
    {
        $estadistica = new \Unal\EstadisticaUnal\Domain\Model\Estadistica();
        $estadisticasObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $estadisticasObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($estadistica));
        $this->inject($this->subject, 'estadisticas', $estadisticasObjectStorageMock);

        $this->subject->addEstadistica($estadistica);
    }

    /**
     * @test
     */
    public function removeEstadisticaFromObjectStorageHoldingEstadisticas()
    {
        $estadistica = new \Unal\EstadisticaUnal\Domain\Model\Estadistica();
        $estadisticasObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $estadisticasObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($estadistica));
        $this->inject($this->subject, 'estadisticas', $estadisticasObjectStorageMock);

        $this->subject->removeEstadistica($estadistica);
    }
}
