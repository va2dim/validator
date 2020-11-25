<?php


namespace App\Validation;

define ('NS', __NAMESPACE__ . '\\');

class Validator
{
    const
        VALIDATION_RULES_DELIMITER = '|',
        VALIDATION_RULES_SUBDELIMITER = ':';

    protected
        $__validationErrors,
        $__validationRules;


    public function __construct(array $validationRules)
    {
        $this->__validationRules = $validationRules;
    }

    public function getValidationErrors() {
        return $this->__validationErrors;
    }

    public function validate(array $nameValueList) {
        $this->__validationErrors = new MultiException();

        foreach ($nameValueList as $fieldName => $fieldValue) {
            if (array_key_exists($fieldName, $this->__validationRules)) {
                $rules = explode(self::VALIDATION_RULES_DELIMITER, $this->__validationRules[$fieldName]);

                foreach ($rules as $rule) {
                    $ruleWithLimits = explode(self::VALIDATION_RULES_SUBDELIMITER, $rule);
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