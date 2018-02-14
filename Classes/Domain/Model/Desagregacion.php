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
 * Desagregacion
 */
class Desagregacion extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * tipo
     *
     * @var int
     */
    protected $tipo = 0;

    /**
     * archivos
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\Archivo>
     */
    protected $archivos = null;

    /**
     * atributos
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\Atributo>
     */
    protected $atributos = null;

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
        $this->archivos = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->atributos = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Adds a Archivo
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Archivo $archivo
     * @return void
     */
    public function addArchivo(\Unal\EstadisticaUnal\Domain\Model\Archivo $archivo)
    {
        $this->archivos->attach($archivo);
    }

    /**
     * Removes a Archivo
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Archivo $archivoToRemove The Archivo to be removed
     * @return void
     */
    public function removeArchivo(\Unal\EstadisticaUnal\Domain\Model\Archivo $archivoToRemove)
    {
        $this->archivos->detach($archivoToRemove);
    }

    /**
     * Returns the archivos
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\Archivo> $archivos
     */
    public function getArchivos()
    {
        return $this->archivos;
    }

    /**
     * Sets the archivos
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\Archivo> $archivos
     * @return void
     */
    public function setArchivos(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $archivos)
    {
        $this->archivos = $archivos;
    }

    /**
     * Adds a Atributo
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Atributo $atributo
     * @return void
     */
    public function addAtributo(\Unal\EstadisticaUnal\Domain\Model\Atributo $atributo)
    {
        $this->atributos->attach($atributo);
    }

    /**
     * Removes a Atributo
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Atributo $atributoToRemove The Atributo to be removed
     * @return void
     */
    public function removeAtributo(\Unal\EstadisticaUnal\Domain\Model\Atributo $atributoToRemove)
    {
        $this->atributos->detach($atributoToRemove);
    }

    /**
     * Returns the atributos
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\Atributo> $atributos
     */
    public function getAtributos()
    {
        return $this->atributos;
    }

    /**
     * Sets the atributos
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Unal\EstadisticaUnal\Domain\Model\Atributo> $atributos
     * @return void
     */
    public function setAtributos(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $atributos)
    {
        $this->atributos = $atributos;
    }
}
