<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/search_user/templates/user_list.html.twig */
class __TwigTemplate_1ca8b4cafff2a08462077f7ab6cbd89b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div id=\"user-list-container\">
  <!-- Formulario de búsqueda -->
  <form id=\"user-search-form\">
    <input type=\"text\" id=\"edit-name\" name=\"name\" placeholder=\"Nombre\" />
    <input type=\"text\" id=\"edit-surname\" name=\"surname\" placeholder=\"Apellido\" />
    <input type=\"text\" id=\"edit-email\" name=\"email\" placeholder=\"Correo electrónico\" />
    <button type=\"submit\">Buscar</button>
  </form>

  <!-- Lista de usuarios -->
  <div id=\"user-list\">
    <!-- Aquí se llenarán los usuarios por AJAX -->
  </div>

  <!-- Paginación -->
  <div class=\"pagination\">
    <button id=\"prev-page\">Anterior</button>
    <span id=\"current-page\">Página 1</span>
    <button id=\"next-page\">Siguiente</button>
  </div>
</div>

<style>
  #user-list table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  #user-list th, #user-list td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  #user-list th {
    background-color: #0074d9; /* Azul de Drupal */
    color: white;
  }

  #user-list tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  #user-list tr:hover {
    background-color: #ddd;
  }

  #user-list-container {
    font-family: Arial, sans-serif;
  }

  #user-search-form {
    margin-bottom: 20px;
  }

  #user-search-form input, #user-search-form button {
    margin-right: 10px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  #user-search-form button {
    background-color: #0074d9; /* Azul de Drupal */
    color: white;
    border: none;
    cursor: pointer;
  }

  #user-search-form button:hover {
    background-color: #005bb5; /* Azul más oscuro de Drupal */
  }

  .pagination {
    margin-top: 20px;
  }

  .pagination button {
    margin: 0 5px;
    padding: 8px 16px;
    border: 1px solid #0074d9; /* Azul de Drupal */
    background-color: white;
    color: #0074d9; /* Azul de Drupal */
    cursor: pointer;
  }

  .pagination button:hover {
    background-color: #0074d9; /* Azul de Drupal */
    color: white;
  }
</style>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/search_user/templates/user_list.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/search_user/templates/user_list.html.twig", "C:\\xampp\\htdocs\\prueba_drupal\\modules\\custom\\search_user\\templates\\user_list.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
