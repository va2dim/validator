<?php


namespace App\Validation;

define ('NS', __NAMESPACE__ . '\\');
/**
 * VALIDATION_RULES:
 * required
 * int
 * alpha
 * min:d
 * max:d
 * email
 * password
 */
abstract class AbstractsForm
{
    const
        VALIDATION_RULES_DELIMITER = '|',
        VALIDATION_RULES_SUBDELIMITER = ':';

    protected $__validationErrors;

    public function getShortClassName() {
        $array = explode('\\', get_called_class());
        return $array[count($array) - 1];
    }

    public function getValidationErrors() {
        return $this->__validationErrors;
    }

    public function getTemplate () {
        return __DIR__ . '/../Forms/' . $this->getShortClassName() . '.template.php';
    }

    public function validate($POST) {
        $this->__validationErrors = new MultiException();

        foreach ($POST as $fieldName => $fieldValue) {
            if (array_key_exists($fieldName, static::$validationRules)) {
                $validationRules = explode(static::VALIDATION_RULES_DELIMITER, static::$validationRules[$fieldName]);

                foreach ($validationRules as $rule) {
                    $ruleWithLimits = explode(static::VALIDATION_RULES_SUBDELIMITER, $rule);
                    if (count($ruleWithLimits) > 1) {
                        $rule = $ruleWithLimits[0];
                        $limit = $ruleWithLimits[1];
                    }

                    $validatorName = NS . ucfirst(strtolower($rule)) . 'Validator';

                    if (class_exists($validatorName)) {
                        $validator = new $validatorName;
                        try {
                            if (!empty($limit)) $validator->setLimit($limit);
                            $validator->validate($fieldValue, $fieldName);
                        } catch (\Exception $validationError) {
                            $this->__validationErrors->add($validationError);
                        }

                        unset($limit);
                    }
                }
            }
        }
    }
}