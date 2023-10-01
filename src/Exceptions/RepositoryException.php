<?php
namespace P7\StructCore\Exceptions;

class RepositoryException 
{
    public function invalidModel() : string {
        return __('model.not_found');
    }
}