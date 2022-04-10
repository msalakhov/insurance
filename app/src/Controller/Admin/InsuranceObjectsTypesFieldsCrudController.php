<?php

namespace App\Controller\Admin;

use App\Entity\InsuranceObjectsTypesFields;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Integer;

class InsuranceObjectsTypesFieldsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InsuranceObjectsTypesFields::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('insuranceType'),
            TextField::new('name'),
            ChoiceField::new('type')->setChoices([
                'Text' => \Symfony\Component\Form\Extension\Core\Type\TextType::class,
                'Money' => \Symfony\Component\Form\Extension\Core\Type\MoneyType::class,
                'Number' => \Symfony\Component\Form\Extension\Core\Type\IntegerType::class,
                'Date'  => \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class,
            ]),
            TextField::new('label'),
            BooleanField::new('required'),
        ];
    }
}
