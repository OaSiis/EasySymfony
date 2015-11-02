<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace AppBundle\Admin;

use AppBundle\Form\GenreType;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SeriesAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, [
                'attr' => [
                    'class' => 'custom-text',
                ]
            ])
            ->add('releasedAt', 'date', [
                'years' => range(1940, date('Y')+5),
                'data'  => new \DateTime(),
            ])
            ->add('summary')
            ->add('picture')
            ->add('genres'/*, 'collection', [
                'type' => new GenreType(),
                'allow_add'    => true,
                'allow_delete' => true,
            ]*/)
            ->add('country', 'country')

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('releasedAt')
            ->add('genres')
            ->add('country')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('releasedAt')
            ->add('genres')
            ->add('country')
            ->add('_action', 'actions', [
                'actions' => [
                    'show'   => [],
                    'edit'   => [],
                    'delete' => [],
                ],
            ])
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        // Fields to be shown on show action
        $showMapper
            ->add('id')
            ->add('name')
            ->add('releasedAt')
            ->add('summary')
            ->add('picture')
            ->add('genres')
            ->add('country')
        ;
    }
}