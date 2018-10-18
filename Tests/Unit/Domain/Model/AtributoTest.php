<?php
namespace Unal\EstadisticaUnal\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Alexis Ortiz <eaortiz@unal.edu.co>
 */
class AtributoTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Unal\EstadisticaUnal\Domain\Model\Atributo
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Unal\EstadisticaUnal\Domain\Model\Atributo();
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
}
