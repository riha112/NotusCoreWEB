<?php

/* page/page.content.twig */
class __TwigTemplate_c58baa200cdfd17d1a82344a90715ffbc51aa67063ee6bd38deaf454d7276b55 extends Twig_Template
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
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "before", array()))) {
            // line 2
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "before", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 3
                echo "        ";
                echo twig_get_attribute($this->env, $this->source, $context["element"], "content", array());
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 5
        echo "  
";
        // line 6
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "blocks", array()))) {
            // line 7
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "blocks", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["rect"]) {
                // line 8
                echo "        <div class='block-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rect"], "class", array()), "html", null, true);
                echo " block' ";
                echo twig_get_attribute($this->env, $this->source, $context["rect"], "attributes", array());
                echo ">
            ";
                // line 9
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["rect"], "body", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                    // line 10
                    echo "                ";
                    if ( !(null === twig_get_attribute($this->env, $this->source, $context["element"], "prefix", array()))) {
                        // line 11
                        echo "                    ";
                        echo twig_get_attribute($this->env, $this->source, $context["element"], "prefix", array());
                        echo "
                ";
                    }
                    // line 13
                    echo "
                ";
                    // line 14
                    echo twig_get_attribute($this->env, $this->source, $context["element"], "content", array());
                    echo "
                
                ";
                    // line 16
                    if ( !(null === twig_get_attribute($this->env, $this->source, $context["element"], "sufix", array()))) {
                        // line 17
                        echo "                    ";
                        echo twig_get_attribute($this->env, $this->source, $context["element"], "sufix", array());
                        echo "
                ";
                    }
                    // line 19
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 20
                echo "        </div>
    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rect'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 22
        echo "   
";
        // line 23
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "after", array()))) {
            // line 24
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "after", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 25
                echo "        ";
                echo twig_get_attribute($this->env, $this->source, $context["element"], "content", array());
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 27
        echo "  
";
    }

    public function getTemplateName()
    {
        return "page/page.content.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 27,  133 => 25,  128 => 24,  126 => 23,  123 => 22,  107 => 20,  101 => 19,  95 => 17,  93 => 16,  88 => 14,  85 => 13,  79 => 11,  76 => 10,  72 => 9,  63 => 8,  45 => 7,  43 => 6,  40 => 5,  30 => 3,  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if content.before is not null %}
    {% for element in content.before %}
        {{element.content|raw}}
    {% endfor %}
{% endif %}  
{% if content.blocks is not null %}
    {% for rect in content.blocks %}
        <div class='block-{{loop.index}} {{rect.class}} block' {{rect.attributes|raw}}>
            {% for element in rect.body %}
                {% if element.prefix is not null %}
                    {{element.prefix|raw}}
                {% endif %}

                {{element.content|raw}}
                
                {% if element.sufix is not null %}
                    {{element.sufix|raw}}
                {% endif %}
            {% endfor %}
        </div>
    {% endfor %}
{% endif %}   
{% if content.after is not null %}
    {% for element in content.after %}
        {{element.content|raw}}
    {% endfor %}
{% endif %}  
", "page/page.content.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCore\\Front\\templates\\page\\page.content.twig");
    }
}
