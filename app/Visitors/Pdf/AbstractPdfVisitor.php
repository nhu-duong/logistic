<?php

namespace App\Visitors\Pdf;

use App\Visitors\AbstractVisitor;
use PDF;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class AbstractPdfVisitor extends AbstractVisitor 
{
    abstract public function getViewName();
    abstract public function getData($visitor);
    abstract public function getFileName($visitor);
    
    public function accept($visitor) 
    {
        $viewName = $this->getViewName();
        $data = $this->getData($visitor);
        $pdf   = PDF::loadView($viewName, $data);

        // Set encoding for pdf file
        $pdf->setOption('encoding', 'utf-8');
        $pdf->setOption('print-media-type', true);
        $pdf->setOption('footer-spacing', 2);
        $pdf->setOption('header-spacing', 2);
        return $pdf;
    }
}