<?php

namespace App\Form;

use App\Entity\ClientInsurance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UmbrellaInsuranceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clientId', HiddenType::class)
            ->add('name')
            ->add('year')
            ->add('excessLimit')
            ->add('uninsured')
            ->add('motorist')
            ->add('premium')
            ->add('renewalDate', DateType::class)
            ->add('min_home_liability_sub_limit', NumberType::class, ['label' => 'Minimum Home Liability Sub-Limit'])
            ->add('min_auto_liability_sub_limit', NumberType::class, ['label' => 'Minimum Auto Liability Sub-Limit'])
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
