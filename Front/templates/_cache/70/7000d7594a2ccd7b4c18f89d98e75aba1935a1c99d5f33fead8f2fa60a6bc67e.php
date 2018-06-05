<?php

/* page/page.header.twig */
class __TwigTemplate_53b9799e33e43d60f1c2b12c0298a0d038f24fa308602609badc16b3e2ac0fa4 extends Twig_Template
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
