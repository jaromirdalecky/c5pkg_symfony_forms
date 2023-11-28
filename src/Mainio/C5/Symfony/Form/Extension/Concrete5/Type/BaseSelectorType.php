<?php
namespace Mainio\C5\Symfony\Form\Extension\Concrete5\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\NumberToLocalizedStringTransformer;

/**
 * This class provides some basic methods for the concrete5 selector types so
 * that we do not have to repeat them in all of the selector types.
 *
 * @author Antti Hukkanen <antti.hukkanen@mainiotech.fi>
 */
abstract class BaseSelectorType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Store number by default. If the extending class wants to provide
        // e.g. object storage, override this method in the extending class.
        $builder->addViewTransformer(new NumberToLocalizedStringTransformer(
            null,
            false,
            NumberToLocalizedStringTransformer::ROUND_FLOOR
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'compound' => false,
            'entity_manager' => null,
        ]);
    }

}
