<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdType extends AbstractType

        /**
         * Permet d'avoir la configuration d'un champ
         *
         * @param string $label
         * @param string $placeholder
         * @return array
         */
    {
        private function getConfiguration($label, $placeholder) {
            return [
                'label' => $label,
                'attr' => [
                    'placeholder' => $placeholder
                ]
            ];

        }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, $this ->getConfiguration ("Titre", "Tapez un titre pour votre annonce"))
            ->add('slug', TextType::class, $this ->getConfiguration ("Adresse web", "Adresse web (automatique)"))
            ->add('coverImage', UrlType::class, $this ->getConfiguration ("URL de l'image principale", "Indiquez l'adresse d'une image"))
            ->add('introduction', TextType::class, $this->getConfiguration ("Introduction", "Donnez une description de l'annonce"))
            ->add('content', TextareaType::class, $this ->getConfiguration ("Description détaillée", "Tapez une description du bien"))
            ->add('rooms', IntegerType::class, $this->getConfiguration ("Nombre de chambres", "Indiquez le nombre de chambres disponibles"))
            ->add('price', MoneyType::class, $this->getConfiguration ("Prix par nuit", "Indiquez le prix pour une nuit"));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
