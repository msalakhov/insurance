<?php

namespace App\Form;

use App\Entity\ClientInsurance;
use App\Entity\InsuranceObjectsTypes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateClientInsuranceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clientId', HiddenType::class)
            ->add('name')
            ->add('insuranceObjectsTypesId', ChoiceType::class, [
                'label' => 'Insurance object type',
                'choices' => [
                    'Home' => 1,
                    'Auto' => 2,
                    'Collection' => 3,
                    'Umbrella' => 4
                ],
            ])
            ->add('year')
            ->add('address')
            ->add('dwellingLimit')
            ->add('otherStructuresLimit')
            ->add('personalPropertyLimit')
            ->add('deductible')
            ->add('premium')
            ->add('totalCars')
            ->add('totalDrivers')
            ->add('deductiblePremium')
            ->add('fineArt')
            ->add('jewelry')
            ->add('wine')
            ->add('etc')
            ->add('eachWithRLP')
            ->add('expressLimit')
            ->add('homesListed')
            ->add('llcs')
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClientInsurance::class,
        ]);
    }
}
