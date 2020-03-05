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
 * Estadistica
 */
class Estadistica extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * textoProtocolo
     *
     * @var string
     */
    protected $textoProtocolo = '';

    /**
     * badge
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $badge = null;

    /**
     * altBadge
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $altBadge = null;

    /**
     * link
     *
     * @var string
     */
    protected $link = '';

    /**
     * desagregaciones
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\Desagregacion>
     */
    protected $desagregaciones = null;

    /**
     * atributos
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\AtributoEstadistica>
     */
    protected $atributos = null;

    /**
     * tiposAtrDesagregaciones
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\TipoAtrDesagregacion>
     */
    protected $tiposAtrDesagregaciones = null;

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
        $this->desagregaciones = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->atributos = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->tiposAtrDesagregaciones = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

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
     * Returns the badge
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $badge
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * Sets the badge
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $badge
     * @return void
     */
    public function setBadge(\TYPO3\CMS\Extbase\Domain\Model\FileReference $badge)
    {
        $this->badge = $badge;
    }

    /**
     * Returns the altBadge
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $altBadge
     */
    public function getAltBadge()
    {
        return $this->altBadge;
    }

    /**
     * Sets the altBadge
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $altBadge
     * @return void
     */
    public function setAltBadge(\TYPO3\CMS\Extbase\Domain\Model\FileReference $altBadge)
    {
        $this->altBadge = $altBadge;
    }

    /**
     * Adds a Desagregacion
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Desagregacion $desagregacione
     * @return void
     */
    public function addDesagregacione(\Unal\EstadisticaUnal\Domain\Model\Desagregacion $desagregacione)
    {
        $this->desagregaciones->attach($desagregacione);
    }

    /**
     * Removes a Desagregacion
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Desagregacion $desagregacioneToRemove The Desagregacion to be removed
     * @return void
     */
    public function removeDesagregacione(\Unal\EstadisticaUnal\Domain\Model\Desagregacion $desagregacioneToRemove)
    {
        $this->desagregaciones->detach($desagregacioneToRemove);
    }

    /**
     * Returns the desagregaciones
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\Desagregacion> $desagregaciones
     */
    public function getDesagregaciones()
    {
        return $this->desagregaciones;
    }

    /**
     * Sets the desagregaciones
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\Desagregacion> $desagregaciones
     * @return void
     */
    public function setDesagregaciones(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $desagregaciones)
    {
        $this->desagregaciones = $desagregaciones;
    }

    /**
     * Returns the textoProtocolo
     *
     * @return string $textoProtocolo
     */
    public function getTextoProtocolo()
    {
        return $this->textoProtocolo;
    }

    /**
     * Sets the textoProtocolo
     *
     * @param string $textoProtocolo
     * @return void
     */
    public function setTextoProtocolo($textoProtocolo)
    {
        $this->textoProtocolo = $textoProtocolo;
    }

    /**
     * Adds a Atributo
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\AtributoEstadistica $atributo
     * @return void
     */
    public function addAtributo(\Unal\EstadisticaUnal\Domain\Model\AtributoEstadistica $atributo)
    {
        $this->atributos->attach($atributo);
    }

    /**
     * Removes a Atributo
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\AtributoEstadistica $atributoToRemove The AtributoEstadistica to be removed
     * @return void
     */
    public function removeAtributo(\Unal\EstadisticaUnal\Domain\Model\AtributoEstadistica $atributoToRemove)
    {
        $this->atributos->detach($atributoToRemove);
    }

    /**
     * Returns the atributos
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\AtributoEstadistica> atributos
     */
    public function getAtributos()
    {
        return $this->atributos;
    }

    /**
     * Sets the atributos
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\AtributoEstadistica> $atributos
     * @return void
     */
    public function setAtributos(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $atributos)
    {
        $this->atributos = $atributos;
    }

    /**
     * Adds a TipoAtrDesagregacion
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\TipoAtrDesagregacion $tiposAtrDesagregacione
     * @return void
     */
    public function addTiposAtrDesagregacione(\Unal\EstadisticaUnal\Domain\Model\TipoAtrDesagregacion $tiposAtrDesagregacione)
    {
        $this->tiposAtrDesagregaciones->attach($tiposAtrDesagregacione);
    }

    /**
     * Removes a TipoAtrDesagregacion
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\TipoAtrDesagregacion $tiposAtrDesagregacioneToRemove The TipoAtrDesagregacion to be removed
     * @return void
     */
    public function removeTiposAtrDesagregacione(\Unal\EstadisticaUnal\Domain\Model\TipoAtrDesagregacion $tiposAtrDesagregacioneToRemove)
    {
        $this->tiposAtrDesagregaciones->detach($tiposAtrDesagregacioneToRemove);
    }

    /**
     * Returns the tiposAtrDesagregaciones
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\TipoAtrDesagregacion> $tiposAtrDesagregaciones
     */
    public function getTiposAtrDesagregaciones()
    {
        return $this->tiposAtrDesagregaciones;
    }

    /**
     * Sets the tiposAtrDesagregaciones
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\TipoAtrDesagregacion> $tiposAtrDesagregaciones
     * @return void
     */
    public function setTiposAtrDesagregaciones(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tiposAtrDesagregaciones)
    {
        $this->tiposAtrDesagregaciones = $tiposAtrDesagregaciones;
    }

    /**
     * Returns the link
     *
     * @return string $link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the link
     *
     * @param string $link
     * @return void
     */
    public function setLink($link)
    {
        $this->link = $link;
    }
}
