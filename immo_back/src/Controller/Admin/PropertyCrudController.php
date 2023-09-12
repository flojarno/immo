<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PropertyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Property::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
          yield TextField::new('title');
          yield AssociationField::new('property_type');
          yield AssociationField::new('transaction_type');
          yield AssociationField::new('user');
          yield TextField::new('summary')->onlyOnForms();
          yield TextEditorField::new('description')->onlyOnForms();
          yield MoneyField::new('price')->setCurrency('EUR')->setNumDecimals(0);
          yield TextField::new('address')->onlyOnForms();
          yield TextField::new('additional_address')->onlyOnForms();
          yield TextField::new('postal_code')->onlyOnForms();
          yield TextField::new('city');
          yield TextField::new('place')->onlyOnForms();
          yield TextField::new('latitude')->onlyOnForms();
          yield TextField::new('longitude')->onlyOnForms();
          yield TextField::new('status')->onlyOnForms();
        //   yield CollectionField::new('photos');
    }
    
}
