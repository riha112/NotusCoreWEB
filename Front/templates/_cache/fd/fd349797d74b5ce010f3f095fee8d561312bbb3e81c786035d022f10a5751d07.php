<?php

/* page/notus-page-docs/page.content.twig */
class __TwigTemplate_43d6e6d94ecaea082ac844f96b976a60992aed789f1a1bd3558074b5ae10f609 extends Twig_Template
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
        echo "<div id=\"docs\">
    <h1>Wellcome to .riha DOCS</h1>

    <h2>Data types</h2>    
    ";
        // line 5
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "files", array()), "data_type", array());
        echo "

    <h2>Debuging</h2>    
    ";
        // line 8
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "files", array()), "debug", array());
        echo "
    
    <h2>Conditions</h2>    
    ";
        // line 11
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "files", array()), "conditions", array());
        echo "

    <h2>Scopes</h2>    
    <h3>Scope: check</h3>    
    ";
        // line 15
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "files", array()), "scope_check", array());
        echo "
    <h3>Scope: loop</h3>    
    ";
        // line 17
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "files", array()), "scope_loop", array());
        echo "

    <pre>
        Learn use repeat.

        #Data types
        To define a new variable use following pattern: set [name] as [data_type]: value
        Allowed data types: array, text, GLOBAL, number, boolean

        Numbers: Can contain float or integer values:
            set float as number: 10.4
            set integer as number: 10
        
        Text: set string as text: \"my text\"
        
        Arrays can contain any type of data type
        set my_array as array: [\"test\", 10, true]

        GLOBAL: currently supports:
            \"PLAYER\" - contains action for:
                * object placing: place: [building_name, location]
            \"WORLD\" - contains action for:
                * retrieving free tile: freeTile
        
        Debug: to output value use command: print: [data_type]

        Scopes: contains two types of scope:
            condition: requires boolean
            loop: requires number

            to start scope type: scope [type]: [number]
            to end scope type: end scope


    </pre>
</div>
";
    }

    public function getTemplateName()
    {
        return "page/notus-page-docs/page.content.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 17,  48 => 15,  41 => 11,  35 => 8,  29 => 5,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"docs\">
    <h1>Wellcome to .riha DOCS</h1>

    <h2>Data types</h2>    
    {{content.files.data_type|raw}}

    <h2>Debuging</h2>    
    {{content.files.debug|raw}}
    
    <h2>Conditions</h2>    
    {{content.files.conditions|raw}}

    <h2>Scopes</h2>    
    <h3>Scope: check</h3>    
    {{content.files.scope_check|raw}}
    <h3>Scope: loop</h3>    
    {{content.files.scope_loop|raw}}

    <pre>
        Learn use repeat.

        #Data types
        To define a new variable use following pattern: set [name] as [data_type]: value
        Allowed data types: array, text, GLOBAL, number, boolean

        Numbers: Can contain float or integer values:
            set float as number: 10.4
            set integer as number: 10
        
        Text: set string as text: \"my text\"
        
        Arrays can contain any type of data type
        set my_array as array: [\"test\", 10, true]

        GLOBAL: currently supports:
            \"PLAYER\" - contains action for:
                * object placing: place: [building_name, location]
            \"WORLD\" - contains action for:
                * retrieving free tile: freeTile
        
        Debug: to output value use command: print: [data_type]

        Scopes: contains two types of scope:
            condition: requires boolean
            loop: requires number

            to start scope type: scope [type]: [number]
            to end scope type: end scope


    </pre>
</div>
", "page/notus-page-docs/page.content.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\page\\notus-page-docs\\page.content.twig");
    }
}
