<?php

namespace App;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Controller
{
    private $log;

    public function __construct()
    {
        $this->log = new Logger('logger');
        $this->log->pushHandler(new StreamHandler('logs/general.log', Logger::INFO));
        session_start();
    }

    public function create()
    {
        return include_once 'views/create.php';
    }

    public function store()
    {
        try {
            $hasError = false;
            $fullName = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
            $phone = str_replace(' ', '', filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));

            $_SESSION['full_name'] = $fullName;
            $_SESSION['email'] = $email;
            $_SESSION['cpf'] = $cpf;
            $_SESSION['phone'] = $phone;

            if (empty($fullName)) {
                $_SESSION['error']['full_name'] = "Enter your full name, please.";
                $hasError = true;
            }
            if (!$this->validateEmail($email)) {
                $hasError = true;
            }
            if (!$this->validateCpf($cpf)) {
                $hasError = true;
            }

            if ($hasError) {
                return header('Location: /create');
            }

            $model = new Model($fullName, $email, $cpf, $phone);
            $model->save();
            $msg = 'New customer registration successful.';
            $this->log->info($msg);
            $_SESSION['success_msg'] = $msg;

        } catch (\Exception $ex) {
            $this->log->error($ex->getMessage(), ['Exception' => $ex]);
            $_SESSION['error_msg'] = $ex->getMessage();
        }
        return header('Location: /');
    }

    public function edit($id)
    {
        $model = new Model();
        $customer = $model->getById($id);

        if (empty($customer)) {
            return include_once 'views/404.php';
        }

        return include_once 'views/edit.php';
    }

    public function update()
    {
        try {
            $hasError = false;

            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $fullName = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
            $phone = str_replace(' ', '', filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));

            $_SESSION['full_name'] = $fullName;
            $_SESSION['email'] = $email;
            $_SESSION['cpf'] = $cpf;
            $_SESSION['phone'] = $phone;

            if (empty($fullName)) {
                $_SESSION['error']['full_name'] = "Enter your full name, please.";
                $hasError = true;
            }
            if (!$this->validateEmail($email, $id)) {
                $hasError = true;
            }
            if (!$this->validateCpf($cpf, $id)) {
                $hasError = true;
            }
            if ($hasError) {
                return header('Location: /edit/' . $id);
            }

            $model = new Model($fullName, $email, $cpf, $phone);
            $model->update($id);

            $msg = "Customer record updated successfully.";
            $this->log->info($msg);
            $_SESSION['success_msg'] = $msg;


        } catch (\Exception $ex) {
            $this->log->error($ex->getMessage(), ['Exception' => $ex]);
            $_SESSION['error_msg'] = $ex->getMessage();
        }
        return header('Location: /');
    }

    public function delete($id)
    {
        try {
            $model = new Model();
            $deleted = $model->delete($id);

            if ($deleted) {
                $msg = "Customer registration removed successfully.";
                $this->log->info($msg);
                $_SESSION['success_msg'] = $msg;
            }

        } catch (\Exception $ex) {
            $this->log->error($ex->getMessage(), ['Exception' => $ex]);
            $_SESSION['error_msg'] = $ex->getMessage();
        }

        return header('Location: /');
    }

    public function list()
    {
        try {
            $model = new Model();
            $customers = $model->getAll();

            if (empty($customers)) {
                $_SESSION['alert_msg'] = "There are no customer records yet.";
            }

        } catch (\Exception $ex) {
            $this->log->error($ex->getMessage(), ['Exception' => $ex]);
            $_SESSION['error_msg'] = $ex->getMessage();
        }

        return include_once 'views/list.php';
    }

    public function validateEmail($email, $id = null)
    {
        if (empty($email)) {
            $_SESSION['error']['email'] = "Enter an email address, please.";
            return false;
        } else {
            if (!(filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email))) {
                $_SESSION['error']['email'] = "The email address entered does not appear to be valid.";
                return false;
            }
        }
        $model = new Model();
        $customer = $model->getByEmail($email, $id);
        if (!empty($customer)) {
            $_SESSION['error']['email'] = "The email address you entered is already registered.";
            return false;
        }
        return true;
    }

    public function validateCpf($cpf, $id = null)
    {
        if (empty($cpf)) {
            $_SESSION['error']['cpf'] = "Please provide a CPF number, please.";
            return false;
        } else {

            $test = preg_replace('/[^0-9]/is', '', $cpf);
            if (strlen($test) != 11) {
                $_SESSION['error']['cpf'] = "The CPF must consist of 11 numbers.";
                return false;
            }

            if (preg_match('/(\d)\1{10}/', $cpf)) {
                $_SESSION['error']['cpf'] = "The CPF informed does not appear to be valid.";
                return false;
            }

            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $test[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($test[$c] != $d) {
                    $_SESSION['error']['cpf'] = "The CPF informed does not appear to be valid.";
                    return false;
                }
            }
        }
        $model = new Model();
        $customer = $model->getByCPF($cpf, $id);
        if (!empty($customer)) {
            $_SESSION['error']['cpf'] = "The CPF informed is already registered.";
            return false;
        }
        return true;
    }
}
