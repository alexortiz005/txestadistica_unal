<?php
namespace Unal\EstadisticaUnal\Domain\Model;

/***
 *
 * This file is part of the "Estadistica Unal" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Alexis Ortiz <eaortiz@unal.edu.co>, Unal
 *
 ***/

/**
 * AtributoEstadistica
 */
class AtributoEstadistica extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * @var string
     */
    protected $contenido = '';

    /**
     * tipo
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\TipoAtrEstadistica>
     */
    protected $tipo = null;

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

    /**
     * Returns the contenido
     *
     * @return string $contenido
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Sets the contenido
     *
     * @param string $contenido
     * @return void
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->tipo = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a TipoAtrEstadistica
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\TipoAtrEstadistica $tipo
     * @return void
     */
    public function addTipo(\Unal\EstadisticaUnal\Domain\Model\TipoAtrEstadistica $tipo)
    {
        $this->tipo->attach($tipo);
    }

    /**
     * Removes a TipoAtrEstadistica
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\TipoAtrEstadistica $tipoToRemove The TipoAtrEstadistica to be removed
     * @return void
     */
    public function removeTipo(\Unal\EstadisticaUnal\Domain\Model\TipoAtrEstadistica $tipoToRemove)
    {
        $this->tipo->detach($tipoToRemove);
    }

    /**
     * Returns the tipo
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\TipoAtrEstadistica> $tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Sets the tipo
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\TipoAtrEstadistica> $tipo
     * @return void
     */
    public function setTipo(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tipo)
    {
        $this->tipo = $tipo;
    }
}
