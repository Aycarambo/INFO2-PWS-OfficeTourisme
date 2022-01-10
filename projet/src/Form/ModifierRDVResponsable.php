<?php
namespace App\Form;

use App\Entity\Conseiller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModifierRDVResponsable extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $conseillers = $options['conseillers'];
        $conseiller = $options['conseiller'];
        $builder
            ->add('nouveauConseiller', ChoiceType::class, [
                'placeholder' => 'Choisissez un conseiller',
                'choices' => $conseillers,
                'choice_label' => function(Conseiller $cons, $key, $value) {
                    return $cons->getNom() . " " . $cons->getPrenom();
                },
                'choice_value' => function(Conseiller $cons = null) {
                    return $cons ? $cons->getId() : '';
                },
                'empty_data' => $conseiller,
                'required' => true,
                /*'preferred_choices' => [$conseiller],*/
            ])
            ->add('submit', SubmitType::class, ['label' => 'Sauvegarder'])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // ...,
            'conseillers' => [],
            'conseiller' => null,
        ]);

        // you can also define the allowed types, allowed values and
        // any other feature supported by the OptionsResolver component
        $resolver->setAllowedTypes('conseillers', 'array');
    }
}