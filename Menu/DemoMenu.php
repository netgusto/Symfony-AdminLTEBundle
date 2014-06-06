<?php

namespace Netgusto\AdminLTEBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class DemoMenu extends ContainerAware {

    public function left(FactoryInterface $factory, array $options) {
        
        $menu = $factory->createItem('root', $options);
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());

        $menu->addChild('One', array('route' => 'netgusto_adminlte_homepage'))
            ->setAttribute('icon', 'plane');

        $menu->addChild('Settings', array('uri' => '#'))
            ->setAttribute('icon', 'car');

        $menu['Settings']->addChild('Subpage', array('uri' => '#'))
            ->setAttribute('icon', 'rocket');

        return $menu;
    }
}