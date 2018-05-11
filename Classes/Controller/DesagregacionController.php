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
 * DesagregacionController
 */
class DesagregacionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $desagregacions = $this->desagregacionRepository->findAll();
        $this->view->assign('desagregacions', $desagregacions);
    }

    /**
     * action show
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Desagregacion $desagregacion
     * @return void
     */
    public function showAction(\Unal\EstadisticaUnal\Domain\Model\Desagregacion $desagregacion)
    {
        $this->view->assign('desagregacion', $desagregacion);
    }

    /**
     * action show
     *
     * @param \Unal\EstadisticaUnal\Domain\Model\Desagregacion $desagregacion
     * @return void
     */
    public function getArchivosAction(\Unal\EstadisticaUnal\Domain\Model\Desagregacion $desagregacion)
    {
        print_r();

        $archivos=$desagregacion->getArchivos();

        $archivos_as_array=[];


        foreach ($archivos as $key => $archivo) {
            foreach ((array)$archivo as $key => $value) {
                if(is_array($value))
                    $archivos_as_array[]=$value;                
            }
            
        }
       

        return  json_encode($archivos_as_array);
    }
}
