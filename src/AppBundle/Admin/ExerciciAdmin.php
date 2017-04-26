<?php

// src/AppBundle/Admin/ExerciciAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ExerciciAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('iIdExercici', 'integer');
        $formMapper->add('sNom', 'text');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('iIdExercici');
        $datagridMapper->add('sNom');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('iIdExercici');
        $listMapper->add('sNom', null, array('editable' => true));
    }
}
