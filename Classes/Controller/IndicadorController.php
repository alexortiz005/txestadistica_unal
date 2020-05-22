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
 * IndicadorController
 */
class IndicadorController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * indicadorRepository
     *
     * @var \Unal\EstadisticaUnal\Domain\Repository\IndicadorRepository
     * @inject
     */
    protected $indicadorRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $indicadors = $this->indicadorRepository->findAll();
        $this->view->assign('indicadors', $indicadors);
    }

    /**
     * action preview
     *
     * @return void
     */
    public function previewAction()
    {
        $uri_badge_ver_mas = 'fileadmin/user_upload/' . $this->settings['badge_ver_mas'];
        $uri_altBadge_ver_mas = 'fileadmin/user_upload/' . $this->settings['altBadge_ver_mas'];
        $uri_link_boton_ver_mas = $this->settings['link_ver_mas'];
        $texto_boton_ver_mas = $this->settings['texto_ver_mas'];
        $subtexto_boton_ver_mas = $this->settings['subtexto_ver_mas'];
        $periodoTransicion = $this->settings['periodo'];
        //se obtienen las uids que el editor selecciono en el backend a traves de la variable settings
        $uids_indicadores_a_mostrar = explode(',', $this->settings['indicadores_a_mostrar']);
        //se crea un arreglo que contendra las indicadores que se van a mostrar en el preview
        $indicadores_a_mostrar = [];
        //se usa el repositorio para encontrar cada una de las indicadores y cargar el arreglo
        foreach ($uids_indicadores_a_mostrar as $uid) {
            $indicadores_a_mostrar[] = $this->indicadorRepository->findByUid($uid);
        }
        //se despacha el contenido a la vista
        $this->view->assignMultiple([
            'indicadores_a_mostrar' => $indicadores_a_mostrar,
            'uri_badge_ver_mas' => $uri_badge_ver_mas,
            'uri_altBadge_ver_mas' => $uri_altBadge_ver_mas,
            'uri_link_boton_ver_mas' => $uri_link_boton_ver_mas,
            'texto_boton_ver_mas' => $texto_boton_ver_mas,
            'periodoTransicion' => $periodoTransicion,
            'subtexto_boton_ver_mas' => $subtexto_boton_ver_mas
        ]);
    }
}
