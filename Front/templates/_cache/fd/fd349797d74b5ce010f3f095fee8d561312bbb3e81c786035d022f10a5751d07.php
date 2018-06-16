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

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"docs\">
    <h1>Wellcome to .riha DOCS</h1>
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
", "page/notus-page-docs/page.content.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCoreWEB\\Front\\templates\\page\\notus-page-docs\\page.content.twig");
    }
}
