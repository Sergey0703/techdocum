<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class DepartForm
 * @package AppBundle\Form
 */

class DepartForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('photoVote', ChoiceType::class, array(
                'choices' => array(
                    'Apartment photos completely the same as in reality' => 1,
                    'Apartment photos very likely as in reality' => 2,
                    'Apartment photos NOT likely as in reality' => 3,
                ),
                'expanded' => true,
             //   'disabled' => $options['is_edit'],
            ))
            ->add('staffVote', HiddenType::class, array(
                'constraints' => array(
                    new GreaterThan(array(
                        'value' => 0,
                    )),
                    new LessThanOrEqual(array(
                        'value' => 10,
                    ))
                ),
               // 'disabled' => $options['is_edit'],
                'attr' => array(
                    'data-name' => 'rating1-value',
                ),
            ))
            ->add('leaveReview', SubmitType::class, array(
                'label' => 'Leave Review',
               // 'disabled' => $options['is_edit'],
                'attr' => array(
                    'class' => 'bft',
                ),
            ));

    }

}