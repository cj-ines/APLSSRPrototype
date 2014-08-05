<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/QuestionaireBuilder for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace QuestionaireBuilder\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BuilderController extends AbstractActionController
{
    public function indexAction()
    {
        return array();
    }
    
    public function buildAction()
    {
        return new ViewModel();
    }

    public function doneAction() {
        return new ViewModel();
    }
}
