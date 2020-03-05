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
 * Categorias que separan los diferentes estadisticos
 */
class Categoria extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * estadisticas
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\Estadistica>
     */
    protected $estadisticas = null;

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
        $this->estadisticas = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Adds a Estadistica
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Estadistica $estadistica
     * @return void
     */
    public function addEstadistica(\Unal\EstadisticaUnal\Domain\Model\Estadistica $estadistica)
    {
        $this->estadisticas->attach($estadistica);
    }

    /**
     * Removes a Estadistica
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Estadistica $estadisticaToRemove The Estadistica to be removed
     * @return void
     */
    public function removeEstadistica(\Unal\EstadisticaUnal\Domain\Model\Estadistica $estadisticaToRemove)
    {
        $this->estadisticas->detach($estadisticaToRemove);
    }

    /**
     * Returns the estadisticas
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\Estadistica> $estadisticas
     */
    public function getEstadisticas()
    {
        return $this->estadisticas;
    }

    /**
     * Sets the estadisticas
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\Estadistica> $estadisticas
     * @return void
     */
    public function setEstadisticas(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $estadisticas)
    {
        $this->estadisticas = $estadisticas;
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
