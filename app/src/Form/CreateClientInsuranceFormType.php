<?php

namespace App\Form;

use App\Entity\ClientInsurance;
use App\Entity\InsuranceObjectsTypes;
use App\Entity\InsuranceObjectsTypesFields;
use App\Repository\InsuranceObjectsTypesFieldsRepository;
use App\Repository\InsuranceObjectsTypesRepository;
use ReflectionClass;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateClientInsuranceFormType extends AbstractType
{
    public function __construct(private InsuranceObjectsTypesFieldsRepository $insuranceTypesFieldsRepo)
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clientId', HiddenType::class)
            ->add('insuranceObjectsTypes', EntityType::class, [
                'class' => InsuranceObjectsTypes::class,
                'placeholder' => '',
            ])
        ;

        $formModifier = function(FormInterface $form, ?InsuranceObjectsTypes $insType) {
            if (is_null($insType)) {
                return;
            }

            $form->remove('submit');

            $insTypeFields = $this->insuranceTypesFieldsRepo->findByInsuranceType($insType);

            /**
             * @param InsuranceTypesFields $insTypeField
             */
            foreach ($insTypeFields as $insTypeField) {
                $form->add(
                    $insTypeField->getName(), 
                    $insTypeField->getType(), 
                    [
                        'label' => $insTypeField->getLabel(),
                        'required' => $insTypeField->getRequired(),
                    ]
                );
            }

            $form->add('submit', SubmitType::class);
        };

        $builder->get('insuranceObjectsTypes')->addEventListener(
            FormEvents::POST_SUBMIT, 
            function(FormEvent $event) use ($formModifier) {
                $form = $event->getForm();
                $data = $form->getData();

                $formModifier($form->getParent(), $data);
            }
        );

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA, 
            function(FormEvent $event) use ($formModifier) {
                $form = $event->getForm();
                $data = $event->getData();

                $formModifier($form, $data->getInsuranceObjectsTypes());
            }
        );

        $builder->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClientInsurance::class,
        ]);
    }
}
