<?php
namespace Cris\StructCore\Exceptions;

class RepositoryException 
{
    public function invalidModel() : string {
        return __('model.not_found');
    }
}