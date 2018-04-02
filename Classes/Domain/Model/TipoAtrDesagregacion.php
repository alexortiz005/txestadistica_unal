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
 * TipoAtributo
 */
class TipoAtrDesagregacion extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
}
