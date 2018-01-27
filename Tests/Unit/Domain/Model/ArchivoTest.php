<?php
namespace Unal\EstadisticaUnal\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Alexis Ortiz <eaortiz@unal.edu.co>
 */
class ArchivoTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Unal\EstadisticaUnal\Domain\Model\Archivo
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Unal\EstadisticaUnal\Domain\Model\Archivo();
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
    public function getContenidoReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getContenido()
        );
    }

    /**
     * @test
     */
    public function setContenidoForFileReferenceSetsContenido()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setContenido($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'contenido',
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
    public function getExplicacionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getExplicacion()
        );
    }

    /**
     * @test
     */
    public function setExplicacionForStringSetsExplicacion()
    {
        $this->subject->setExplicacion('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'explicacion',
            $this->subject
        );
    }
}
