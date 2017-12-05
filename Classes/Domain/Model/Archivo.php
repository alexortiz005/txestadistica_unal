<?php
namespace Unal\EstadisticaUnal\Domain\Model;

/***
 *
 * This file is part of the "Estadistica Unal" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Alexis Ortiz <eaortiz@unal.edu.co>, Unal
 *
 ***/

/**
 * Archivo
 */
class Archivo extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * nombre
     *
     * @var string
     */
    protected $nombre = '';

    /**
     * nombreDisplay
     *
     * @var string
     */
    protected $nombreDisplay = '';

    /**
     * contenido
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $contenido = null;

    /**
     * tipo
     *
     * @var int
     */
    protected $tipo = 0;

    /**
     * explicacion
     *
     * @var string
     */
    protected $explicacion = '';

    /**
     * Returns the nombre
     *
     * @return string $nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Sets the nombre
     *
     * @param string $nombre
     * @return void
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Returns the contenido
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $contenido
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Sets the contenido
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $contenido
     * @return void
     */
    public function setContenido(\TYPO3\CMS\Extbase\Domain\Model\FileReference $contenido)
    {
        $this->contenido = $contenido;
    }

    /**
     * Returns the tipo
     *
     * @return int $tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Sets the tipo
     *
     * @param int $tipo
     * @return void
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * Returns the explicacion
     *
     * @return string $explicacion
     */
    public function getExplicacion()
    {
        return $this->explicacion;
    }

    /**
     * Sets the explicacion
     *
     * @param string $explicacion
     * @return void
     */
    public function setExplicacion($explicacion)
    {
        $this->explicacion = $explicacion;
    }

    /**
     * Returns the nombreDisplay
     *
     * @return string $nombreDisplay
     */
    public function getNombreDisplay()
    {
        return $this->nombreDisplay;
    }

    /**
     * Sets the nombreDisplay
     *
     * @param string $nombreDisplay
     * @return void
     */
    public function setNombreDisplay($nombreDisplay)
    {
        $this->nombreDisplay = $nombreDisplay;
    }
}
