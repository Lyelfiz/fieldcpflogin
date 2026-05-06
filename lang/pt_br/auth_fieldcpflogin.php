<?php

/**
 * Language file.
 *
 * @package   auth_fieldcpflogin
 * @copyright 2026 Lyelfiz - LHCV - contact: https://github.com/Lyelfiz/cpfformat
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$enableformatlogin = '<a href="' . $CFG->wwwroot . '/admin/settings.php?section=manageauths" target="_blank">Administração do site → Plugins → Autenticação → Gerenciar Autenticação</a>';

$string['pluginname'] = 'Login para campo personalizado CPF';

$string['instructions'] = 'Instruções';
$string['settings_desc'] = 'Este plugin permite que os usuários façam login usando seu número de CPF, que é armazenado em um campo de perfil personalizado. Para usá-lo, basta digitar seu CPF (apenas números) no campo de nome de usuário na página de login. O plugin irá encontrar o nome de usuário associado e fazer o login como de costume.';

$string['enable_plugin'] = 'Ativar Login por CPF';
$string['enable_plugin_desc'] = 'Para ativar este plugin, vá para ' . $enableformatlogin . ' e ative o método "Login por CPF". <br><strong>Nota:</strong> Este plugin precisa ser ativado e configurado com prioridade maior que o registro automático baseado em e-mail para funcionar.';

$string['developer_info'] = 'Informações do Desenvolvedor';
$string['developer_info_desc'] = 'Desenvolvido por Lyelfiz - Luiz Henrique Carvalho Vacilio<br>Para atualizações e suporte, visite o repositório do GitHub: <a href="https://github.com/Lyelfiz/fieldcpflogin" target="_blank">https://github.com/Lyelfiz/fieldcpflogin</a>';
$string['developer_info_version'] = 'Versão: ';