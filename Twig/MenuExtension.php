<?php

namespace Netgusto\AdminLTEBundle\Twig;

use Knp\Menu\Twig\MenuExtension as TwigMenuExtension;
use Knp\Menu\ItemInterface;
use Knp\Menu\Renderer\RendererProviderInterface;
use Knp\Menu\Provider\MenuProviderInterface;

class MenuExtension extends TwigMenuExtension
{
    public function getFunctions()
    {
        return array(
            'adminlte_leftmenu_render' => new \Twig_Function_Method($this, 'adminlte_leftmenu_render', array('is_safe' => array('html'))),
        );
    }

    public function adminlte_leftmenu_render($menu, array $options = array(), $renderer = null)
    {
        $options['template'] = 'NetgustoAdminLTEBundle:LeftMenu:knp_menu.html.twig';
        return parent::render($menu, $options, $renderer);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adminlte_menu';
    }
}
