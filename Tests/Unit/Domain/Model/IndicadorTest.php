<?php
namespace Unal\EstadisticaUnal\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Alexis Ortiz <eaortiz@unal.edu.co>
 */
class IndicadorTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Unal\EstadisticaUnal\Domain\Model\Indicador
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Unal\EstadisticaUnal\Domain\Model\Indicador();
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
    public function getSubtextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSubtext()
        );
    }

    /**
     * @test
     */
    public function setSubtextForStringSetsSubtext()
    {
        $this->subject->setSubtext('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'subtext',
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
}
