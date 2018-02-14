<?php
namespace Unal\EstadisticaUnal\Controller;

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
 * EstadisticaController
 */
class EstadisticaController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * estadisticaRepository
     *
     * @var \Unal\EstadisticaUnal\Domain\Repository\EstadisticaRepository
     * @inject
     */
    protected $estadisticaRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $estadisticas = $this->estadisticaRepository->findAll();
        $this->view->assign('estadisticas', $estadisticas);
    }

    /**
     * action show
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Estadistica $estadistica
     * @return void
     */
    public function showAction(\Unal\EstadisticaUnal\Domain\Model\Estadistica $estadistica)
    {
        $this->view->assign('estadistica', $estadistica);
    }
}
