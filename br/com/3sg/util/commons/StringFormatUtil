/**
 * StringFormatUtil
 * Esta classe foi desenvolvida baseada em funções/métodos encontrados na web
 * para facilicar o tratamento de strings
 * 
 * @category   StringFormatUtil
 * @package    StringFormatUtil
 * @copyright  Copyright (c) 2015 - 2016 StringFormatUtil (http://www.3sg.com.br/util/commons/StringFormatUtil)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.8, 2012-10-12
 */
class StringFormatUtil {

    /**
     * Método retorna cpf no formato ###.###.###-##
     * @param type $value
     * @return type
     */
    public static function toCpf($value) {
        return StringFormatUtil::mask($value, '###.###.###-##');
    }

    /**
     * Método retorna cnpj no formato ##.###.###/####-##
     * @param type $value
     * @return type
     */
    public static function toCnpj($value) {
        return StringFormatUtil::mask($value, '##.###.###/####-##');
    }

    /**
     * Método retorna cep no formato #####-###
     * @param type $value
     * @return type
     */
    public static function toCep($value) {
        return StringFormatUtil::mask($value, '#####-###');
    }

    /**
     * Método retorna valor alternativo se o primeiro valor for nulo ou vazío
     * @param type $str1
     * @param type $str2
     * @return type
     */
    public static function trataNulo($str1 = "", $str2 = "") {
        try {
            if ($str1 === null) {
                return $str2;
            }
            if (isset($str1) || $str1 !== "") {
                return $str1;
            }
            return $str2;
        } catch (Exception $err) {
            return $str2;
        }
    }

    /**
     * Método substituíra todos os valores nulo ou vazío pelo valor alternativo
     * @param type $array
     * @param type $replacement
     * @return type
     */
    public static function trataNuloArray($array = [], $replacement = "") {
        foreach ($array as $key => $value) {
            if (is_null($value)) {
                $array[$key] = $replacement;
            }
        }
        return $array;
    }

    /**
     * Método format o nome 
     * Exemplo1: FULANO DA SILVA ==> Fulano da Silva
     * Exemplo2: fulano da silva ==> Fulano da Silva
     * @param type $name
     * @return type
     */
    public static function formatNome($name) {
        return strtr(
                ucwords(strtolower($name)), [
            " Dos " => " dos ",
            " Dos " => " dos ",
            " Do " => " do ",
            " Das " => " das ",
            " Da " => " da ",
            " De " => " de ",
            " E " => " e ",
            " Em " => " em ",
            " As " => " as ",
            " A " => " a "
        ]);
    }

    /**
     * Método remove todos os characteres especiais de uma string
     * @param type $string
     * @return type
     */
    public static function removeSpecialCharacters($string) {
        return strtr(
                $string, [
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
            'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E',
            'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ð' => 'D', 'Ñ' => 'N',
            'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O',
            'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Ŕ' => 'R',
            'Þ' => 's', 'ß' => 'B', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
            'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
            'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
            'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y',
            'þ' => 'b', 'ÿ' => 'y', 'ŕ' => 'r'
                ]
        );
    }

    /**
     * Método retorna valor no formato informado
     * Exemplo: mask("000000000", "#####-#####") ==> 00000-0000 
     * @param type $value
     * @param type $format
     * @return type
     */
    public static function mask($value, $format) {

        $length = count(explode('#', $format)) - 1;

        $string = str_pad($value, $length, '0', STR_PAD_LEFT);

        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($format) - 1; $i++) {
            if ($format[$i] == '#') {
                if (isset($string[$k])) {
                    $maskared .= $string[$k++];
                }
            } else {
                if (isset($format[$i])) {
                    $maskared .= $format[$i];
                }
            }
        }
        return $maskared;
    }

}
