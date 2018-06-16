<?php

/* _custom/block//notus-block-my-games/my-games-block.twig */
class __TwigTemplate_15e172ae4a39688817dc11caca7da78ca026c793edccbee01a2409cf010a517f extends Twig_Template
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
        echo "<div class=\"my-games\">
    <div class='header-title'>
        My Games [";
        // line 3
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "game_data", array())), "html", null, true);
        echo "]
    </div>
    <div class=\"games\">
        ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["block"] ?? null), "game_data", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["game"]) {
            // line 7
            echo "        <div class=\"game-hld  hover-info\">
            <input type=\"checkbox\">                        
            <div class='game'>
                <div class=\"icon\"></div>
                <div class=\"title\">";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["game"], "title", array()), "html", null, true);
            echo "</div>
            </div>
            <div class=\"actions\">
            ";
            // line 17
            echo "            </div>
            <div class=\"hover-info-content\">
                <div class=\"created\"><span>Created on:</span>";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["game"], "created", array()), "html", null, true);
            echo "</div>
                <div class=\"modified\"><span>Modified on:</span>";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["game"], "modified", array()), "html", null, true);
            echo "</div>                
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['game'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "_custom/block//notus-block-my-games/my-games-block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 24,  57 => 20,  53 => 19,  49 => 17,  43 => 11,  37 => 7,  33 => 6,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"my-games\">
    <div class='header-title'>
        My Games [{{block.game_data|length}}]
    </div>
    <div class=\"games\">
        {% for game in block.game_data %}
        <div class=\"game-hld  hover-info\">
            <input type=\"checkbox\">                        
            <div class='game'>
                <div class=\"icon\"></div>
                <div class=\"title\">{{game.title}}</div>
            </div>
            <div class=\"actions\">
            {#}
                <div class=\"download\">download</div>
                <div class=\"delete\">delete</div>#}
            </div>
            <div class=\"hover-info-content\">
                <div class=\"created\"><span>Created on:</span>{{game.created}}</div>
                <div class=\"modified\"><span>Modified on:</span>{{game.modified}}</div>                
            </div>
        </div>
        {% endfor %}
    </div>
</div>
", "_custom/block//notus-block-my-games/my-games-block.twig", "C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\NotusCoreWEB\\Front\\templates\\_custom\\block\\notus-block-my-games\\my-games-block.twig");
    }
}
