<?php
namespace App\Form;

use App\Entity\Conseiller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModifierRDVResponsable extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $conseillers = $options['conseillers'];
        $conseiller = $options['conseiller'];
        for($i=0; $i<count($conseillers); $i++) {
            if($conseillers[$i] == $conseiller) {
                \array_splice($conseillers, $i, 1);
            }
        }
        \array_unshift($conseillers, $conseiller);
        $builder
            ->add('nouveauConseiller', ChoiceType::class, [
                'placeholder' => false,
                'empty_data' => $conseiller,
                'choices' => $conseillers,
                'choice_label' => function(Conseiller $cons, $key, $value) {
                    return $cons->getNom() . " " . $cons->getPrenom();
                },
                'choice_value' => function(Conseiller $cons = null) {
                    return $cons ? $cons->getId() : '';
                },
                'required' => false,
                /*'preferred_choices' => [$conseiller],*/
                'row_attr' => ['onChange' => "changement()"]
            ])
            ->add('submit', SubmitType::class, ['label' => 'Sauvegarder'])
            ->add('newId', HiddenType::class, ['data' => 0])
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