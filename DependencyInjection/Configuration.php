<?php

namespace Skynettechnologies\AllinOneAccessibilityBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('all_in_one_accessibility_bundle');

        // Check compatibility with Symfony 4.4 and earlier versions
        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // For Symfony 4.4 and earlier, the root node is retrieved this way
            $rootNode = $treeBuilder->root('all_in_one_accessibility_bundle');
        }
        $rootNode
            ->children()
            ->scalarNode('option_name')
            ->defaultValue('default_value')
            ->info('This is a custom option for AllinOneAccessibilityBundle')
            ->end()
            ->arrayNode('some_array_option')
            ->scalarPrototype()->end()
            ->defaultValue(['default1', 'default2'])
            ->info('An array option for AllinOneAccessibilityBundle')
            ->end()
            ->end();
        return $treeBuilder;
    }
}
