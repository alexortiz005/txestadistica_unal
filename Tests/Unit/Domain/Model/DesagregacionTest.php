<?php
namespace Unal\EstadisticaUnal\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Alexis Ortiz <eaortiz@unal.edu.co>
 */
class DesagregacionTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Unal\EstadisticaUnal\Domain\Model\Desagregacion
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Unal\EstadisticaUnal\Domain\Model\Desagregacion();
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
    public function getTipoReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getTipo()
        );
    }

    /**
     * @test
     */
    public function setTipoForIntSetsTipo()
    {
        $this->subject->setTipo(12);

        self::assertAttributeEquals(
            12,
            'tipo',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getArchivosReturnsInitialValueForArchivo()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getArchivos()
        );
    }

    /**
     * @test
     */
    public function setArchivosForObjectStorageContainingArchivoSetsArchivos()
    {
        $archivo = new \Unal\EstadisticaUnal\Domain\Model\Archivo();
        $objectStorageHoldingExactlyOneArchivos = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneArchivos->attach($archivo);
        $this->subject->setArchivos($objectStorageHoldingExactlyOneArchivos);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneArchivos,
            'archivos',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addArchivoToObjectStorageHoldingArchivos()
    {
        $archivo = new \Unal\EstadisticaUnal\Domain\Model\Archivo();
        $archivosObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $archivosObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($archivo));
        $this->inject($this->subject, 'archivos', $archivosObjectStorageMock);

        $this->subject->addArchivo($archivo);
    }

    /**
     * @test
     */
    public function removeArchivoFromObjectStorageHoldingArchivos()
    {
        $archivo = new \Unal\EstadisticaUnal\Domain\Model\Archivo();
        $archivosObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $archivosObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($archivo));
        $this->inject($this->subject, 'archivos', $archivosObjectStorageMock);

        $this->subject->removeArchivo($archivo);
    }

    /**
     * @test
     */
    public function getAtributosReturnsInitialValueForAtributoDesagregacion()
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
    public function setAtributosForObjectStorageContainingAtributoDesagregacionSetsAtributos()
    {
        $atributo = new \Unal\EstadisticaUnal\Domain\Model\AtributoDesagregacion();
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
        $atributo = new \Unal\EstadisticaUnal\Domain\Model\AtributoDesagregacion();
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
        $atributo = new \Unal\EstadisticaUnal\Domain\Model\AtributoDesagregacion();
        $atributosObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $atributosObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($atributo));
        $this->inject($this->subject, 'atributos', $atributosObjectStorageMock);

        $this->subject->removeAtributo($atributo);
    }
}
