<?php
namespace Unal\EstadisticaUnal\Controller;

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
 * ArchivoController
 */
class ArchivoController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $archivos = $this->archivoRepository->findAll();
        $this->view->assign('archivos', $archivos);
    }

    /**
     * action show
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Archivo $archivo
     * @return void
     */
    public function showAction(\Unal\EstadisticaUnal\Domain\Model\Archivo $archivo)
    {
        $this->view->assign('archivo', $archivo);
    }
}
