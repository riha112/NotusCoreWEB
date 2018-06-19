<?php

/* page/page.header.twig */
class __TwigTemplate_abde6d39810b76ce5b9b9887dd55b90b3b1a6d5a619348eaf6d4a08a21e3bb0a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<nav>
    ";
        // line 2
        echo ($context["menu"] ?? null);
        echo "
</nav>
";
    }

    public function getTemplateName()
    {
        return "page/page.header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<nav>
    {{ menu|raw }}
</nav>
", "page/page.header.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\page\\page.header.twig");
    }
}
