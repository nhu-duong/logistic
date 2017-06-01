<?php

namespace App\Visitors\Pdf;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Order2ArrivalNotice extends AbstractPdfVisitor 
{
    
    public function getData($visitor) 
    {
        return ['order' => $visitor, 'name' => 'Nhu', 'test' => 0, 'fileName' => $this->getFileName($visitor)];
    }

    public function getViewName() 
    {
        return 'pdf.arrivalnotice';
    }

    public function getFileName($visitor)
    {
        return 'arrivalnotice_' . $visitor->id . '.pdf';
    }

}