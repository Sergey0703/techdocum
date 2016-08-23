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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * Class NomenclatureForm
 * @package AppBundle\Form
 */

class NomenclatureForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          //  ->add('id', HiddenType::class)
            ->add('nomenclname', TextType::class)
            ->add('nomencldescription', TextType::class)
          //  ->add('departid', TextType::class)
            ->add('Subm', SubmitType::class, array(
                'label' => 'Save'
               // 'disabled' => $options['is_edit'],
               // 'attr' => array(
               //     'class' => 'bft',
                )
            );

    }

}