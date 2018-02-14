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
 * CategoriaController
 */
class CategoriaController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * categoriaRepository
     *
     * @var \Unal\EstadisticaUnal\Domain\Repository\CategoriaRepository
     * @inject
     */
    protected $categoriaRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $categorias = $this->categoriaRepository->findAll();
        $this->view->assign('categorias', $categorias);
    }

    /**
     * action show
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Categoria $categoria
     * @return void
     */
    public function showAction(\Unal\EstadisticaUnal\Domain\Model\Categoria $categoria)
    {
        $this->view->assign('categoria', $categoria);
    }
}
