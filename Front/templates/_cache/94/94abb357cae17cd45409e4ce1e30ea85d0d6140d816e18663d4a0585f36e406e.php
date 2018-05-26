<?php

/* _custom/block//notus-block-cookie/cookie-block.twig */
class __TwigTemplate_f0e7a2dce4b8d26569760b40f00264a44102aa4eb2aa8102f1f95f369fde5402 extends Twig_Template
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
        echo "<div id=\"cookie\">

    <div class='cookie-content popup'>
        <div class='title popup-title'>
            ";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "title", array()), "html", null, true);
        echo "
        </div>
        <div class='body popup-info'>
            ";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "content", array()), "html", null, true);
        echo "    
        </div>
        <div class='list'>

    ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "cookie_list", array()));
        foreach ($context['_seq'] as $context["type"] => $context["item"]) {
            // line 13
            echo "        <div class='cookie-type'>";
            echo twig_escape_filter($this->env, $context["type"], "html", null, true);
            echo "</div>
        <div class='cookies ";
            // line 14
            echo twig_escape_filter($this->env, $context["type"], "html", null, true);
            echo "'>
        ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["item"]);
            foreach ($context['_seq'] as $context["name"] => $context["cookie"]) {
                // line 16
                echo "            <div class='cookie hover-list'>

                <div class='cookie-name hover-list-name hover-info' data-name='";
                // line 18
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "'>
                    ";
                // line 19
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "
                                <div class='hover-info-content'>
                ";
                // line 21
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cookie"], "description", array()), "html", null, true);
                echo "
            </div>
                </div>
                <div class='cookie-state'>
                    ";
                // line 25
                if (( !(null === twig_get_attribute($this->env, $this->source, $context["cookie"], "approved", array())) && (twig_get_attribute($this->env, $this->source, $context["cookie"], "approved", array()) == true))) {
                    // line 26
                    echo "                        &lt;enabled&gt;
                    ";
                } else {
                    // line 28
                    echo "                    &lt;disabled&gt;
                    ";
                }
                // line 30
                echo "                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['cookie'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "

        </div>
        <div class='actions popup-actions'>
            <div class='action accept-cookie'><span>accept</span></div>
            <div class='action decline-cookie'><span>decline</span></div>        
        </div>  
    </div>

</div>";
    }

    public function getTemplateName()
    {
        return "_custom/block//notus-block-cookie/cookie-block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 35,  97 => 33,  89 => 30,  85 => 28,  81 => 26,  79 => 25,  72 => 21,  67 => 19,  63 => 18,  59 => 16,  55 => 15,  51 => 14,  46 => 13,  42 => 12,  35 => 8,  29 => 5,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"cookie\">

    <div class='cookie-content popup'>
        <div class='title popup-title'>
            {{ block.title }}
        </div>
        <div class='body popup-info'>
            {{ block.content }}    
        </div>
        <div class='list'>

    {% for type, item in block.cookie_list %}
        <div class='cookie-type'>{{type}}</div>
        <div class='cookies {{type}}'>
        {% for name, cookie in item %}
            <div class='cookie hover-list'>

                <div class='cookie-name hover-list-name hover-info' data-name='{{name}}'>
                    {{name}}
                                <div class='hover-info-content'>
                {{cookie.description}}
            </div>
                </div>
                <div class='cookie-state'>
                    {% if cookie.approved is not null and cookie.approved == true %}
                        &lt;enabled&gt;
                    {% else %}
                    &lt;disabled&gt;
                    {% endif %}
                </div>
            </div>
        {% endfor %}
        </div>
    {% endfor %}


        </div>
        <div class='actions popup-actions'>
            <div class='action accept-cookie'><span>accept</span></div>
            <div class='action decline-cookie'><span>decline</span></div>        
        </div>  
    </div>

</div>", "_custom/block//notus-block-cookie/cookie-block.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCoreWEB\\Front\\templates\\_custom\\block\\notus-block-cookie\\cookie-block.twig");
    }
}
