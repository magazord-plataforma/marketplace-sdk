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
    static public function validate(Domain\AbstractModel $model, $json)
    {
        $file = self::getJsonSchemaFile($model);
        if (file_exists($file)) {
            $validator = new \JsonSchema\Validator();
            $validator->check($json, (object) array('$ref' => 'file://' . $file));
            if ($validator->isValid()) {
                return true;
            } else {
                $result = Domain\Error::newInstance('Invalid JSON data', 400);
                foreach ($validator->getErrors() as $error) {
                    if ($error['property']) {
                        $result->addDetail(sprintf("[%s] %s", $error['property'], $error['message']));
                    } else {
                        $result->addDetail(sprintf("%s", $error['message']));
                    }
                }
                return $result;
            }
        }
        return null;
    }

    static public function getJsonSchemaFile(Domain\AbstractModel $model)
    {
        $dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Validator' . DIRECTORY_SEPARATOR;
        $class = str_replace(__NAMESPACE__ . '\\Domain\\', '', get_class($model));
        return $dir . $class . '.json';
    }

}
