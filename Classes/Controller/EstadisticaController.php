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

    /**
     * action show
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Estadistica $estadistica
     * @return void
     */
    public function modalAction(\Unal\EstadisticaUnal\Domain\Model\Estadistica $estadistica)
    {
        $this->view->assign('estadistica', $estadistica);
    }

    /**
     * @param \Unal\EstadisticaUnal\Domain\Model\Estadistica $estadistica
     */
    public function atributosAction(\Unal\EstadisticaUnal\Domain\Model\Estadistica $estadistica)
    {
        $this->view->assign('estadistica', $estadistica);
    }

    /**
     * action preview
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Estadistica $estadistica
     * @return void
     */
    public function previewAction()
    {
        $uri_badge_ver_mas = 'fileadmin/user_upload/' . $this->settings['badge_ver_mas'];
        $uri_altBadge_ver_mas = 'fileadmin/user_upload/' . $this->settings['altBadge_ver_mas'];
        $uri_link_boton_ver_mas = $this->settings['link_ver_mas'];
        $texto_boton_ver_mas = $this->settings['texto_ver_mas'];
        $subtexto_boton_ver_mas = $this->settings['subtexto_ver_mas'];
        //se obtienen las uids que el editor selecciono en el backend a traves de la variable settings
        $uids_estadisticas_a_mostrar = explode(',', $this->settings['estadisticas_a_mostrar']);
        //se crea un arreglo que contenera las estadisticas que se van a mostrar en el preview
        $estadisticas_a_mostrar = [];
        //se usa el repositorio para encontrar cada una de las estadisticas y cargar el arreglo
        foreach ($uids_estadisticas_a_mostrar as $uid) {
            $estadisticas_a_mostrar[] = $this->estadisticaRepository->findByUid($uid);
        }
        //se despacha el contenido a la vista
        $this->view->assignMultiple([
            'estadisticas_a_mostrar' => $estadisticas_a_mostrar,
            'uri_badge_ver_mas' => $uri_badge_ver_mas,
            'uri_altBadge_ver_mas' => $uri_altBadge_ver_mas,
            'uri_link_boton_ver_mas' => $uri_link_boton_ver_mas,
            'texto_boton_ver_mas' => $texto_boton_ver_mas,
            'subtexto_boton_ver_mas' => $subtexto_boton_ver_mas
        ]);
    }

    /**
     * action handle
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Atributo $atributo
     * @return void
     */
    public function protocoloAction()
    {
        if ($this->request->hasArgument('estadistica')) {
            $uid = $this->request->getArgument('estadistica');
            $estadistica = $this->estadisticaRepository->findByUid($uid);
            $this->view->assign('estadistica', $estadistica);
        } else {
            $texto = $this->settings['texto_protocolos'];
            $categorias = $this->categoriaRepository->findAll();
            $this->view->assignMultiple([
                'texto' => $texto,
                'categorias' => $categorias
            ]);
        }
    }
}
