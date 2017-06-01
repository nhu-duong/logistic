<?php

namespace App\Visitors;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class AbstractVisitor 
{
    abstract public function accept($visitor);
}