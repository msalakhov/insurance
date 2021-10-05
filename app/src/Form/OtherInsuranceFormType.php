<?php

namespace App\Form;

use App\Entity\ClientInsurance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OtherInsuranceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clientId', HiddenType::class)
            ->add('lineOfBusiness')
            ->add('limits')
            ->add('endorsements', TextType::class, ['label' => 'Endorsements if Any'])
            ->add('otherNotes')
            ->add('premium')
            ->add('renewalDate', DateType::class, ['label' => 'Policy Period'])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClientInsurance::class,
        ]);
    }
}
