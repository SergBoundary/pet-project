<?php

namespace App\UserExperience\Dictionary;

/**
 * Description of Translit
 *
 * @author Se Bo
 */
class Transliter
{

    // !!ПЕРЕДЕЛАТЬ - Функция проверки наличия автора в базе данных
//    function addContentNewAuthorTest ($authors) {
//        for ($i = 0; $i < count($authors); $i++) {
//            $query = "INSERT INTO `content_authors` (`content_author_img`, `content_author_name`, `content_author_surname`, `content_author_born`, `content_author_death`, `content_author_annotation`, `content_author_biography`, `content_author_url`, `content_author_language`, `content_author_description`, `content_author_keywords`, `content_author_reg_date`";
//            // Фамилия автора
//            $authors_array[0][$i] = strstr(trim($author_list[$i], ' '), ' ', true) . ' Transliter.php';
//            // Имя автора
//            $authors_array[1][$i]  = strstr(trim($author_list[$i], ' '), ' ');
//            // URL автора
//            $authors_array[2][$i]  = addContentNewURL($_POST['content_new_authors'], $_POST['content_new_title'], $_POST['content_new_language']);
//        }
//        return $author_test;
//    }

    // Функция формирования названия файла контента
    public function addAuthorContentURL($author, $title, $language)
    {
//        for ($i = 0; $i < count($author); $i++) {
//            $surname = strstr(trim($author[0][$i], ' '), ' ', true) . ' Transliter.php';
//            $authors = $authors . ' ' . $surname;
//        }
        $str = $author . ' ' . $title . ' ' . $language;
        // Переводим в транслит
        $str = $this->getTranslit($str, $language);
        // Переводим в нижний регистр
        $str = strtolower($str);
        // Заменям ненужные символы на "_"
        $str = preg_replace('/[^-a-z0-9_]+/u', '_', $str);
        // Удаляем начальные и конечные '_'
        $str = trim($str, "_");
        return $str;
    }

    // Функция транслитерации с немецкого текста
    public function getTranslit($str, $language)
    {
        switch ($language) {
            case 'de':
                $lang = array('A', 'Ä', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'Ö', 'P', 'Q', 'R', 'S', 'ẞ', 'T', 'U', 'Ü', 'V', 'W', 'X', 'Y', 'Z', 'Ei', 'Eu', 'Äu', 'a', 'ä', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'ö', 'p', 'q', 'r', 's', 'ß', 't', 'u', 'ü', 'v', 'w', 'x', 'y', 'z', 'ei', 'eu', 'äu');
                $lat = array('A', 'E', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'Io', 'P', 'Q', 'R', 'S', 'S', 'T', 'U', 'Iu', 'V', 'W', 'X', 'Y', 'Z', 'Ai', 'Oi', 'Oi', 'a', 'e', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'io', 'p', 'q', 'r', 's', 's', 't', 'u', 'iu', 'v', 'w', 'x', 'y', 'z', 'ai', 'oi', 'oi');
                break;
            case 'fr':
                $lang = array('A', 'Â', 'À', 'Æ', 'B', 'C', 'Ç', 'D', 'E', 'É', 'Ê', 'È', 'Ë', 'F', 'G', 'H', 'I', 'Î', 'Ï', 'J', 'K', 'L', 'M', 'N', 'O', 'Ô', 'Œ', 'P', 'Q', 'R', 'S', 'T', 'U', 'Û', 'Ù', 'Ü', 'V', 'W', 'X', 'Y', 'Ÿ', 'Z', 'a', 'â', 'à', 'æ', 'b', 'c', 'ç', 'd', 'e', 'é', 'ê', 'è', 'ë', 'f', 'g', 'h', 'i', 'î', 'ï', 'j', 'k', 'l', 'm', 'n', 'o', 'ô', 'œ', 'p', 'q', 'r', 's', 'ß', 't', 'u', 'û', 'ù', 'ü', 'v', 'w', 'x', 'y', 'ÿ', 'z');
                $lat = array('A', 'A', 'A', 'A', 'B', 'C', 'S', 'D', 'E', 'E', 'E', 'E', 'E', 'F', 'G', 'H', 'I', 'I', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'O', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'U', 'U', 'U', 'V', 'W', 'X', 'Y', 'Y', 'Z', 'a', 'a', 'a', 'a', 'b', 'c', 's', 'd', 'e', 'e', 'e', 'e', 'e', 'f', 'g', 'h', 'i', 'i', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'o', 'o', 'p', 'q', 'r', 's', 'ß', 't', 'u', 'û', 'ù', 'ü', 'v', 'w', 'x', 'y', 'y', 'z');
                break;
            case 'it':
                $lang = array('A', 'À', 'Ạ', 'B', 'C', 'D', 'E', 'É', 'È', 'F', 'G', 'H', 'I', 'Í', 'Ì', 'Î', 'J', 'K', 'L', 'M', 'N', 'O', 'Ò', 'Ó', 'P', 'Q', 'R', 'S', 'T', 'U', 'Ù', 'Ú', 'V', 'W', 'X', 'Y', 'Z', 'a', 'à', 'ạ', 'b', 'c', 'd', 'e', 'é', 'è', 'f', 'g', 'h', 'i', 'í', 'ì', 'î', 'j', 'k', 'l', 'm', 'n', 'o', 'ò', 'ó', 'p', 'q', 'r', 's', 't', 'u', 'ù', 'ú', 'v', 'w', 'x', 'y', 'z');
                $lat = array('A', 'A', 'A', 'B', 'C', 'D', 'E', 'E', 'E', 'F', 'G', 'H', 'I', 'I', 'I', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'O', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'U', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'a', 'a', 'b', 'c', 'd', 'e', 'e', 'e', 'f', 'g', 'h', 'i', 'i', 'i', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'o', 'o', 'p', 'q', 'r', 's', 't', 'u', 'u', 'u', 'v', 'w', 'x', 'y', 'z');
                break;
            case 'pl':
                $lang = array('A', 'Ą', 'B', 'C', 'D', 'E', 'Ę', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'Ł', 'M', 'N', 'Ń', 'O', 'Ó', 'P', 'Q', 'R', 'S', 'Ś', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Ż', 'Ź', 'a', 'ą', 'b', 'c', 'd', 'e', 'ę', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'ł', 'm', 'n', 'ń', 'o', 'ó', 'p', 'q', 'r', 's', 'ś', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'ż', 'ź');
                $lat = array('A', 'O', 'B', 'C', 'D', 'E', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'L', 'M', 'N', 'N', 'O', 'U', 'P', 'Q', 'R', 'S', 'SH', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'ZH', 'ZH', 'a', 'o', 'b', 'c', 'd', 'e', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'l', 'm', 'n', 'n', 'o', 'u', 'p', 'q', 'r', 's', 'sh', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'zh', 'zh');
                break;
            case 'ru':
                $lang = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
                $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'Io', 'Zh', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'Kh', 'Ts', 'Ch', 'Sh', 'Shch', '', 'Y', '', 'E', 'Iu', 'Ia', 'a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'kh', 'ts', 'ch', 'sh', 'shch', '', 'y', '', 'e', 'iu', 'ia');
                break;
            case 'sp':
                $lang = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
                $lat = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
                break;
            case 'ua':
                $lang = array('А', 'Б', 'В', 'Г', 'Ґ', 'Д', 'Е', 'Є', 'Ж', 'З', 'И', 'І', 'Ї', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ь', 'Ю', 'Я', 'Зг', 'а', 'б', 'в', 'г', 'ґ', 'д', 'е', 'є', 'ж', 'з', 'и', 'і', 'ї', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ь', 'ю', 'я', 'зг');
                $lat = array('A', 'B', 'V', 'H', 'G', 'D', 'E', 'Ye', 'Zh', 'Z', 'Y', 'I', 'I', 'I', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'Kh', 'Ts', 'Ch', 'Sh', 'Shch', '', 'Yu', 'Ya', 'Zgh', 'a', 'b', 'v', 'h', 'g', 'd', 'e', 'ie', 'gh', 'z', 'y', 'i', 'i', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'kh', 'ts', 'ch', 'sh', 'shch', '', 'iu', 'ia', 'zgh');
                break;
            default:
                return false;
        }

        return str_replace($lang, $lat, $str);
    }

}
