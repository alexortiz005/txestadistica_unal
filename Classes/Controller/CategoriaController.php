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
        $uri_pagina_protocolo = $this->settings['link_pagina_protocolo'];
        $exploded_uri_pagina_protocolo = explode('=', $uri_pagina_protocolo);
        $pagina_protocolo_pageuid = $exploded_uri_pagina_protocolo[1];
        $categorias = $this->categoriaRepository->findAll();
        $this->view->assignMultiple([
            'uri_pagina_protocolo' => $uri_pagina_protocolo,
            'pagina_protocolo_pageuid' => $pagina_protocolo_pageuid,
            'categoria' => $categoria,
            'categorias' => $categorias
        ]);
    }
}
