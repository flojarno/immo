<?php

namespace App\Controller\Admin;

use App\Entity\TranscationType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TranscationTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TranscationType::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
