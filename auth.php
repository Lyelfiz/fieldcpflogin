<?php
defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->libdir . '/authlib.php');

class auth_plugin_fieldcpflogin extends auth_plugin_base {

    public function loginpage_hook() {
        global $DB;

        // Só executa na tela de login
        if (empty($_POST['username']) || empty($_POST['password'])) {
            return;
        }

        $input = trim($_POST['username']);

        // Remove qualquer coisa que não seja número
        $cpf = preg_replace('/\D/', '', $input);

        // Só continua se tiver 11 dígitos
        if (strlen($cpf) !== 11) {
            return;
        }

        // Valida CPF real (evita tentativa aleatória)
        if (!$this->validate_cpf($cpf)) {
            return;
        }

        // Busca usuário pelo campo personalizado cpf
        $sql = "SELECT u.id, u.username
                  FROM {user} u
                  JOIN {user_info_data} uid ON uid.userid = u.id
                  JOIN {user_info_field} uif ON uif.id = uid.fieldid
                 WHERE uif.shortname = 'cpf'
                   AND REPLACE(REPLACE(REPLACE(uid.data,'.',''),'-',''),' ','') = ?
                   AND u.deleted = 0";

        $records = $DB->get_records_sql($sql, [$cpf]);

        // Só substitui se encontrar exatamente 1 usuário
        if (count($records) === 1) {
            $user = reset($records);
            $_POST['username'] = $user->username;
        }
    }

    /**
     * Validação oficial de CPF
     */
    private function validate_cpf($cpf) {

        if (preg_match('/^(\d)\1{10}$/', $cpf)) {
            return false;
        }

        // Primeiro dígito
        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma += intval($cpf[$i]) * (10 - $i);
        }
        $resto = $soma % 11;
        $dv1 = ($resto < 2) ? 0 : 11 - $resto;

        if (intval($cpf[9]) !== $dv1) {
            return false;
        }

        // Segundo dígito
        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += intval($cpf[$i]) * (11 - $i);
        }
        $resto = $soma % 11;
        $dv2 = ($resto < 2) ? 0 : 11 - $resto;

        return intval($cpf[10]) === $dv2;
    }
}