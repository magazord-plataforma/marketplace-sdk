<?php

namespace MagaMarketplace;

/**
 * Description of Validator
 *
 * @author Maicon Sasse
 */
class Validator
{

    /**
     * @param \MagaMarketplace\Domain\AbstractModel $model
     * @param mixed $json
     * @return boolean|Domain\Error
     */
    static public function validate(Domain\AbstractModel $model, $json, $file = false)
    {
        if ($file === false) {
            $file = self::getJsonSchemaFile($model);
        }
        if (file_exists($file)) {
            $validator = new \JsonSchema\Validator();
            $validator->check($json, (object) array('$ref' => 'file://' . $file));
            if ($validator->isValid()) {
                return true;
            } else {
                $result = Domain\Error::newInstance('Dados invalidos (JSON)', 400);
                foreach ($validator->getErrors() as $error) {
                    $result->addDetail(self::getErrorDetail($error));
                }
                return $result;
            }
        }
        return null;
    }

    static private function getErrorDetail(array $error)
    {
        $message = $error['message'];
        if ($error['constraint'] == 'required' || $error['message'] == 'NULL value found, but an object is required') {
            $message = 'O atributo e obrigatorio';
        } else if ($error['constraint'] == 'minLength') {
            $message = 'O atributo deve conter no minimo ' . $error['minLength'] . ' caracteres';
        } else if ($error['constraint'] == 'pattern') {
            $message = 'O atributo deve atender o formato ' . $error['pattern'];
            if ($error['pattern'] == '^[a-zA-Z0-9\\-_\\.]*$') {
                $message = 'O atributo nao pode conter caracteres especiais. Sao aceitos letras, numeros, ponto(.), hifen(-) e underline(_).';
            }
        } else if ($error['constraint'] == 'format' && $error['format'] == 'uri') {
            $message = 'URL no formato invalido. Ela deve ser informada completa, incluindo http:// ou https://';
        } else if ($error['constraint'] == 'format' && $error['format'] == 'date-time') {
            $message = 'Data/hora no formato invalido. Formato esperado: YYYY-MM-DDThh:mm:ss+hh:mm';
        }
        if ($error['property']) {
            return sprintf("[%s] %s", $error['property'], $message);
        } else {
            return sprintf("%s", $message);
        }
    }

    static public function getJsonSchemaFile(Domain\AbstractModel $model)
    {
        $dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Validator' . DIRECTORY_SEPARATOR;
        $class = str_replace(__NAMESPACE__ . '\\Domain\\', '', get_class($model));
        if (DIRECTORY_SEPARATOR == '/') { // Linux
            $class = str_replace('\\', '/', $class);
        }
        return $dir . $class . '.json';
    }

}
