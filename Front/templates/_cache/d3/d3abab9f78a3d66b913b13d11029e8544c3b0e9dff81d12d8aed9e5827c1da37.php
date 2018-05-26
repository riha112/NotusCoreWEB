<?php

/* page/page.html.twig */
class __TwigTemplate_c0b44ba9ee29f601d008020ebe446d948b8e4094ab566145ff82ddff4823ad09 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">

    ";
        // line 6
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["html"] ?? null), "page", array()), "title", array()))) {
            // line 7
            echo "        <title>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["html"] ?? null), "page", array()), "title", array()), "html", null, true);
            echo "</title>
    ";
        }
        // line 8
        echo "  

    <!--[if !IE]><!-->
    ";
        // line 11
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["html"] ?? null), "styles", array()))) {
            // line 12
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["html"] ?? null), "styles", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
                // line 13
                echo "            <link rel='stylesheet' href='";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["style"], "href", array()));
                echo ".css' type='text/css'>   
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "    ";
        }
        echo "    

    ";
        // line 17
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["html"] ?? null), "start_scripts", array()))) {
            // line 18
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["html"] ?? null), "start_scripts", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
                // line 19
                echo "            <script src='";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["script"], "src", array()));
                echo ".js' type='text/javascript'></script>   
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "    ";
        }
        echo "    
    <!--<![endif]-->    

    </head>

    <body id='";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["html"] ?? null), "page", array()), "id", array()), "html", null, true);
        echo "'>
        <!--[if !IE]><!-->
        ";
        // line 28
        if (( !(null === twig_get_attribute($this->env, $this->source, ($context["html"] ?? null), "cookie", array())) && (twig_get_attribute($this->env, $this->source, ($context["html"] ?? null), "cookie", array()) == true))) {
            // line 29
            echo "            <div class='cookie'>
                <span>
                    Jerky picanha hamburger tenderloin, shank short loin kevin tongue ball tip meatloaf capicola. 
                    <a href='https://google.lv'>More</a>
                </span>
                <button>Accept cookies</button>
            </div>
        ";
        }
        // line 37
        echo "        <div id='body-content'>
            ";
        // line 38
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["html"] ?? null), "page", array()), "content", array());
        echo "
        </div>
    </body>

    ";
        // line 42
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["html"] ?? null), "end_scripts", array()))) {
            // line 43
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["html"] ?? null), "end_scripts", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
                // line 44
                echo "            <script src='";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["script"], "src", array()));
                echo ".js' type='text/javascript'></script>      
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "    ";
        }
        // line 47
        echo "    <!--<![endif]-->    
</html>
";
    }

    public function getTemplateName()
    {
        return "page/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 47,  133 => 46,  124 => 44,  119 => 43,  117 => 42,  110 => 38,  107 => 37,  97 => 29,  95 => 28,  90 => 26,  81 => 21,  72 => 19,  67 => 18,  65 => 17,  59 => 15,  50 => 13,  45 => 12,  43 => 11,  38 => 8,  32 => 7,  30 => 6,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">

    {% if html.page.title is not null %}
        <title>{{ html.page.title }}</title>
    {% endif %}  

    <!--[if !IE]><!-->
    {% if html.styles is not null %}
        {% for style in html.styles %}
            <link rel='stylesheet' href='{{ style.href|e }}.css' type='text/css'>   
        {% endfor %}
    {% endif %}    

    {% if html.start_scripts is not null %}
        {% for script in html.start_scripts %}
            <script src='{{ script.src|e }}.js' type='text/javascript'></script>   
        {% endfor %}
    {% endif %}    
    <!--<![endif]-->    

    </head>

    <body id='{{html.page.id}}'>
        <!--[if !IE]><!-->
        {% if (html.cookie is not null) and (html.cookie == true) %}
            <div class='cookie'>
                <span>
                    Jerky picanha hamburger tenderloin, shank short loin kevin tongue ball tip meatloaf capicola. 
                    <a href='https://google.lv'>More</a>
                </span>
                <button>Accept cookies</button>
            </div>
        {% endif %}
        <div id='body-content'>
            {{ html.page.content|raw }}
        </div>
    </body>

    {% if html.end_scripts is not null %}
        {% for script in html.end_scripts %}
            <script src='{{ script.src|e }}.js' type='text/javascript'></script>      
        {% endfor %}
    {% endif %}
    <!--<![endif]-->    
</html>
", "page/page.html.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\page\\page.html.twig");
    }
}