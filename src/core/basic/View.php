<?php

Namespace Basic;

Use Exception;

Abstract Class View
{
    private $template;

    /**
     * Shows the view
     *
     * @param array $data
     * @return void
     */
    public function display(array $data)
    {   print( $this->template );
    }



    /**
     * Get the used template
     *
     * @return string
     */
    public function getTemplate(): string
    {   return $this->template;
    }

    /**
     * Set template to view
     *
     * @param string $template
     * @return void
     */
    protected function setTemplate(string $template)
    {   $this->template = $template;
    }

    /**
     * Exibe uma página que estiver dentro da pasta de templates
     * @param   string  $filename       O nome da página sem a extensão
     * @param   array   $data           Todos os dados a serem exibidos na tela
     * @return  NULL
     */
    public function show (string $filename, array $data = NULL)
    {   $filepath   =   __DIR__ . "/../../" . __PATHS__['templates'] . '/' . $filename . "." . __SETTINGS__["template_extension"];
        if (!is_readable($filepath))
        {   throw new Exception('404 - Página não encontrada! ' . $filepath, 404);
        }

        if (is_array($data))
        {   extract ($data);
        }
        require $filepath;
    }

    public function toJson(array $data){
        header("Content-Type: Application/JSON");
        print(
            json_encode($data)
        );
    }
}