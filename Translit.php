<?php
/**
 * Text translation from cyrillic in translit and inside out
 */
class Translit
{

	const LANGUAGE_EN = 'EN';
	const LANGUAGE_RU = 'RU';


	/**
	 * Get language dictionary
	 *
	 * @return array
	 */
	protected static function getDictionary($langauge = self::LANGUAGE_RU)
	{
		$dictionary = [
			self::LANGUAGE_EN => [
				"a" => "а", "b" => "б", "v" => "в", "g" => "г", "d" => "д", "e" => "е", "ye" => "е", "jo" => "ё",
				"yo" => "ё", "zh" => "ж", "z" => "з", "i" => "и", "j" => "й", "k" => "к", "l" => "л", "m" => "м",
				"n" => "н", "o" => "о", "p" => "п", "r" => "р", "s" => "с", "t" => "т", "u" => "у", "f" => "ф", "C" => "С",
				"h" => "х", "kh" => "х", "x" => "х", "c" => "с", "ch" => "ч", "ts" => "ц", "sh" => "ш", "shh" => "щ",
				"shсh" => "щ", "w" => "ш", "y" => "у", "'" => "ь", "je" => "э", "ui" => "ю", "ju" => "ю", "yu" => "ю",
				"ja" => "я", "ya" => "я", "q" => "кв", ".co" => ".ко", "c" => "с", "cl" => "кл", "cr" => "кр", "yO" => "Ё",
				"yi" => "ы", "A" => "А", "B" => "Б", "V" => "В", "G" => "Г", "D" => "Д", "E" => "Е", "ce" => "це", "Kh" => "Х",
				"Ye" => "Е", "YE" => "Е", "yE" => "Е", "Jo" => "Ё", "JO" => "Ё", "jO" => "Ё", "Yo" => "Ё", "YO" => "Ё",
				"Zh" => "Ж", "ZH" => "Ж", "zH" => "Ж", "Z" => "З", "I" => "И", "J" => "Й", "K" => "К", "L" => "Л", "M" => "М",
				"N" => "Н", "O" => "О", "P" => "П", "R" => "Р", "S" => "С", "T" => "Т", "U" => "У", "F" => "Ф", "H" => "Х",
				"KH" => "Х", "kH" => "Х", "X" => "Х", "C" => "С", "Ch" => "Ч", "Ts" => "Ц", "TS" => "Ц", "tS" => "Ц", "Sh" => "Ш",
				"Shh" => "Щ", "Shсh" => "Щ", "W" => "Ш", "Y" => "У", "Je" => "Э", "JE" => "Э", "jE" => "Э", "Ui" => "Ю", "UI" => "Ю",
				"uI" => "Ю", "Ju" => "Ю", "JU" => "Ю", "jU" => "Ю", "Yu" => "Ю", "YU" => "Ю", "yU" => "Ю", "Ja" => "Я", "JA" => "Я",
				"jA" => "Я", "Ya" => "Я", "YA" => "Я", "yA" => "Я", "Q" => "Кв", "Co" => "Ко", "CO" => "КО", "cO" => "кО",
				"Cl" => "Кл", "CL" => "КЛ", "cL" => "кЛ", "Cr" => "Кр", "CR" => "КР", "cR" => "кР", "Ce" => "Це", "CE" => "ЦЕ",
				"Yi" => "Ы", "yI" => "Ы", "YI" => "Ы", "їo" => "йо", "tsya" => "тся", "cE" => "цЕ", "www." => "ввв.",
			],
			self::LANGUAGE_RU => [
				"а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "е", "ё" => "yo", "ж" => "zh", "з" => "z", "и" => "i", "й" => "j",
				"к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t", "у" => "u", "ф" => "f",
				"х" => "h", "с" => "c", "ч" => "ch", "ц" => "ts", "ш" => "sh", "щ" => "shсh", "у" => "y", "ь" => "'","э" => "je", "ю" => "yu", "я" => "ya",
				"кв" => "q", "с" => "s", "це" => "ce", "ру" => "ru", "ы" => "yi", "А" => "A", "йо" => "їo", "тся" => "tsya", "Ру" => "Ru", "рУ" => "rU",
				"Б" => "B", "В" => "V", "Г" => "G", "Д" => "D", "Е" => "Е", "Ё" => "Yo", "Ж" => "Zh", "З" => "Z", "И" => "I", "Й" => "J", "К" => "K",
				"Л" => "L", "М" => "M", "Н" => "N", "О" => "O", "П" => "P", "Р" => "R", "С" => "S", "Т" => "T", "У" => "U", "Ф" => "F", "Х" => "H",
				"С" => "C", "Ч" => "Ch", "Ц" => "Ts", "Ш" => "Sh", "Щ" => "Shсh", "У" => "Y", "Э" => "Je", "Ю" => "Yu", "Я" => "Ya", "Кв" => "Q",
				"кВ" => "Q", "Ко" => "Кo", "кО" => "кO", "С" => "S", "Це" => "Ce", "цЕ" => "cE", "Ы" => "Yi", "ввв." => "www.", ".ко" => ".co",
			]
		];

		return $dictionary[$langauge];
	}


	/**
	 * Text translation from cyrillic in translit
	 *
	 * @param string $str text for translation
	 *
	 * @return string
	 */
	public static function encode($str)
	{
		return strtr($str, self::getDictionary(self::LANGUAGE_RU));
	}


	/**
	 * Text translation from translit in cyrillic
	 *
	 * @param string $str text for translation
	 *
	 * @return string
	 */
	public static function decode($str)
	{
		return strtr($str, self::getDictionary(self::LANGUAGE_EN));
	}


}