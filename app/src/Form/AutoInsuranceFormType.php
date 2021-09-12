<?php

namespace App\Form;

use App\Entity\ClientInsurance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AutoInsuranceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clientId', HiddenType::class)
            ->add('name')
            ->add('year')
            ->add('totalDrivers')
            ->add('vehicles')
            ->add('pip')
            ->add('medicalPayments')
            ->add('OTCDeductible', TextType::class, ['label' => 'OTC Deductible'])
            ->add('COLLDeductible', TextType::class, ['label' => 'COLL Deductible'])
            ->add('premium')
            ->add('renewalDate', DateType::class)
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
