<?php
class Request
{
    private $__rules = [], $__message = [];
    public $errors = [];
    const POST = 'post';

    function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    function isPost()
    {
        // if($this->getMethod() =='post')
        // {
        //     return true;
        // }
        // return false;
        return $this->getMethod() == Request::POST;
    }
    function isGet()
    {
        // if($this->getMethod() =='get')
        // {
        //     return true;
        // }
        // return false;
        return $this->getMethod() == 'get';
    }
    public function getFields()
    {
        if ($this->isGet()) {
            $dataFields = [];
            // xử lý lấy dữ liệu bằng bằng phương thức get
            if (!empty($_GET)) {
                foreach ($_GET as $key => $value) {
                    if (is_array($value)) {
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }

        if ($this->isPost()) {
            $dataFields = [];
            // xử lý lấy dữ liệu bằng bằng phương thức get
            if (!empty($_POST)) {
                foreach ($_POST as $key => $value) {
                    if (is_array($value)) {
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }
        return $dataFields;
    }
    public function rules($rules = [])
    {
        $this->__rules = $rules;
    }
    public function message($message = [])
    {
        $this->__message = $message;
    }
    public function validate()
    {
        $this->__rules = array_filter($this->__rules);
        $checkValidate = true;
        if (!empty($this->__rules)) {
            $dataFields = $this->getFields();
            foreach ($this->__rules as $fieldName => $ruleItem) {
                $ruleItemArr = explode('|', $ruleItem);
                foreach ($ruleItemArr as $rules) {
                    $ruleName = null;
                    $ruleValue = null;

                    $rulesArr = explode(':', $rules);
                    $ruleName = reset($rulesArr);
                    //chuyen sang switch case
                    //min, max,... ->const

                    if (count($rulesArr) > 1) {
                        $ruleValue = end($rulesArr);
                    }
                    switch ($ruleName) {
                        case 'required':
                            if (empty(trim($dataFields[$fieldName]))) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                            break;
                        case 'min':
                            if (strlen(trim($dataFields[$fieldName])) < $ruleValue) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                            break;
                        case 'max':
                            if (strlen(trim($dataFields[$fieldName])) > $ruleValue) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                            break;
                        case 'email':
                            if (!filter_var($dataFields[$fieldName], FILTER_VALIDATE_EMAIL)) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                            break;
                        case 'match':
                            if (trim($dataFields[$fieldName]) != trim($dataFields[$ruleValue])) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                            break;
                    }
                }
            }
        }
        return $checkValidate;
    }
    public function errors($fieldName = '')
    {
        if (!empty($this->errors)) {
            if (empty($fieldName)) {
                return $this->errors;
            }
            return reset($this->errors[$fieldName]);
        }
        return false;
    }
    public function setErrors($fieldName, $ruleName)
    {
        $this->errors[$fieldName][$ruleName] = $this->__message[$fieldName . '.' . $ruleName];
    }
}
